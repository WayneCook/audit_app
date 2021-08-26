<template>
    <div class="text-end">
        <v-btn @click="dialog = !dialog" color="primary" dark>new</v-btn>
        
            <v-card>
                <v-card-title class="text-h5 grey lighten-2">
                    Create New Department
                </v-card-title>

                <v-form ref="form">
                    <v-container>
                        <v-row>
                            <v-col>
                                <v-text-field
                                    v-model="form.name"
                                    label="Name"
                                    :error-messages="getErrors.name"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col>
                                <v-btn
                                    class="mr-4"
                                    @click="submit"
                                    color="primary"
                                >
                                    create
                                </v-btn>
                                <v-btn @click="formReset">
                                    cancel
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-form>
            </v-card>
    </div>
</template>

<script>

import Layout from '../Layout';

export default {
    layout: Layout, 
    data() {
        return {
            form: {
                name: ""
            }
        };
    },
    methods: {
        submit() {
            this.$inertia.visit("/audits/create", {
                method: "get",
                data: this.form,
                replace: false,
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    this.formReset();
                }
            });
        },
        formReset() {
        
            this.$refs.form.reset();
            this.$page.props.errors = {};
        }
    },
    computed: {
        getErrors() {
            return this.$page.props.errors;
        }
    }
};
</script>
