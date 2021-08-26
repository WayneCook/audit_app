<template>
    <v-container fluid>
        <v-row>
            <v-col>
                <div
                    class="display-1 grey--text text--darken-3 font-weight-thin mt-4 mb-2"
                >
                    Department Index
                </div>
            </v-col>
        </v-row>

        <v-row>
            <v-col>
                <department-datatable></department-datatable>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import Layout from "@/Pages/Layout";
import DepartmentDatatable from "@/components/DepartmentDatatable";

export default {
    layout: Layout,
    data() {
        return {
            dialog: false
        };
    },
    components: {
        departmentDatatable: DepartmentDatatable
    },
    computed: {
        departments() {
            return this.$page.props.departments;
        }
    },
    methods: {
        updateDatatable() {
            this.$inertia.visit("/departments", { preserveScroll: true });
        }
    }
};
</script>

<style scoped>
.breadcrumbs {
    border-bottom: 1px solid #e7ecf1;
}
</style>
