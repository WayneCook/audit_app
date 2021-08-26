<template>
    <v-card outlined>
        <v-container fluid>
            <v-row>
                <v-col>
                    <v-text-field
                        v-model="search"
                        append-icon="mdi-magnify"
                        label="Search"
                        single-line
                        hide-details
                    ></v-text-field>
                </v-col>
                <v-col class="text-right">
                    <new-department></new-department>
                </v-col>
            </v-row>
        </v-container>

        <v-data-table :headers="headers" :items="departments" :search="search">
            <template v-slot:item.actions="{ item }">
                <v-container>
                    <v-row>
                        <v-col class="d-flex flex-row">
                            <edit-department
                                :department="item.id"
                                class="mr-2"
                            ></edit-department>
                            <delete-department
                                :department="item"
                            ></delete-department>
                        </v-col>
                    </v-row>
                </v-container>
            </template>
        </v-data-table>
    </v-card>
</template>

<script>
import NewDepartment from "../components/NewDepartment";
import EditDepartment from "../components/EditDepartment";
import DeleteDepartment from "../components/DeleteDepartment";

export default {
    data() {
        return {
            search: "",
            headers: [
                { text: "Name", align: "left", sortable: true, value: "name" },
                {
                    text: "Created On",
                    align: "left",
                    sortable: true,
                    value: "created_at"
                },
                {
                    text: "Actions",
                    align: "left",
                    sortable: false,
                    value: "actions"
                }
            ],
            dialog: false
        };
    },
    components: {
        NewDepartment,
        EditDepartment,
        DeleteDepartment
    },
    methods: {
        edit(item) {
            this.$inertia.visit(`/departments/${item.id}`, {
                method: "get",
                only: ["department"],
                replace: false,
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    // this.dialog = false
                }
            });
        }
    },
    computed: {
        departments() {
            return this.$page.props.departments;
        }
    }
};
</script>
