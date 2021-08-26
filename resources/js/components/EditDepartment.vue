<template>
    <div>
        <v-btn small @click="getDepartment()" color="blue-grey darken-1" dark
            >Edit</v-btn
        >
        <v-dialog
            v-model="dialog"
            width="500"
            persistent
            transition="dialog-bottom-transition"
        >
            <v-card>
                <v-card-title class="text-h5 grey lighten-2">
                    Edit Department
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
                                    @click="save"
                                    color="primary"
                                    small
                                >
                                    save
                                </v-btn>
                                <v-btn small @click="formReset">
                                    cancel
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-form>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
export default {
    data() {
        return {
            dialog: false,
            form: {
                name: ""
            }
        };
    },
    props: {
        department: Number
    },
    methods: {
        save() {
            this.$inertia.visit(`/departments/${this.department}`, {
                method: "put",
                data: this.form,
                replace: false,
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    this.dialog = false;
                    // this.formReset();
                }
            });
        },
        getDepartment() {
            this.$inertia.visit(`/departments/${this.department}`, {
                method: "get",
                only: ["department"],
                replace: false,
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    this.dialog = !this.dialog;
                    this.form.name = this.$page.props.department.name;
                }
            });
        },
        formReset() {
            this.dialog = !this.dialog;
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
