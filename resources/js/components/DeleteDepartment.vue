<template>
    <div class="text-center">
        <v-btn @click="dialog = !dialog" small dark color="deep-orange accent-3"
            >delete</v-btn
        >
        <v-dialog
            transition="dialog-bottom-transition"
            v-model="dialog"
            persistent
            max-width="290"
        >
            <v-card>
                <v-card-title class="text-h5">
                    Delete Department
                </v-card-title>
                <v-card-text
                    >Are you sure you want to delete the
                    {{ department.name }} department?</v-card-text
                >
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn
                        @click="deleteDepartment()"
                        dark
                        small
                        color="deep-orange accent-3"
                        >delete</v-btn
                    >
                    <v-btn @click="cancelDeleteDepartment()" small
                        >cancel</v-btn
                    >
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
export default {
    data() {
        return {
            dialog: false
        };
    },
    props: {
        department: Object
    },
    methods: {
        deleteDepartment() {
            this.$inertia.visit(`/departments/${this.department.id}`, {
                method: "delete",
                replace: false,
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    this.dialog = false;
                    // this.formReset();
                }
            });
        },
        cancelDeleteDepartment() {
            this.dialog = false;
        }
    }
};
</script>
