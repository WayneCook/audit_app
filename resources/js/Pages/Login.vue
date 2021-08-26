<template>
<v-app>
<v-container fluid class="pa-0">
    <v-row class="mt-10">

        <v-row>
            <v-col class="pa-4">
                <v-card
                class="mx-auto mt-6 contact-card login-card"
                :elevation="13"
                max-width="550"
                tile
                >
                <div class="icon-container email-icon">
                </div>
                    <v-form v-model="valid">
                        <v-container class="my-8">
                        <v-row>
                            <v-col
                            cols="12"
                            >
                            <v-text-field
                                v-model="name"
                                :error-messages="errors.name"
                                label="Username"
                                color="primary"
                            ></v-text-field>
                            </v-col>
                        </v-row>
                            <v-row>
                                <v-col
                                cols="12">
                                    <v-text-field
                                        v-model="password"
                                        label="Password"
                                        color="primary"
                                        :error-messages="errors.password"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                   
                        </v-container>
                        </v-form>
                        <div>
                            <v-btn @click="login()" tile :block="$vuetify.breakpoint.xsOnly" class=" ma-0 contact-btn" large color="primary">Login</v-btn>
                        </div>
                    </v-card>
                </v-col>
            </v-row>
    </v-row>
</v-container>
</v-app>
</template>

<script>
export default {
    data() {
        return {
            valid: true,
            name: '',
            password: '',
            errors: ''
        }
    },
    methods: {
        login() {

            const params = { name: this.name, password:this.password };

            axios.post( '/login', params).then((response) => {
                this.$inertia.visit('dashboard');
            })

        .catch((error) => {

            if (error.response) {
                this.errors = error.response.data.errors
            }
    
        });
         
        }
    }
}
</script>

<style>

.login-card {
    padding: 20px;
    padding-top: 50px;
    margin: 15px;
}
</style>