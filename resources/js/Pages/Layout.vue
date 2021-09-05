<template>
    <v-app>
      <create-custom-response-menu absolute :menuState="menuState"></create-custom-response-menu>
        <v-main>
            <v-container fluid class="custom-container ma-0 pa-0">
                <v-navigation-drawer v-model="drawer" color="#364150" dark app>
                    <v-list-item>
                        <v-list-item-content>
                            <v-list-item-title class="title">
                                Admin
                            </v-list-item-title>
                            <v-list-item-subtitle>
                                Menu
                            </v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>

                    <v-divider></v-divider>

                    <v-list dense nav>
                        <v-list-item-group
                            mandatory
                            :value="currentController"
                            active-class="light-blue lighten-5 blue--text text--darken-4"
                        >
                            <v-list-item
                                link
                                @click="$inertia.visit('/dashboard')"
                                value="dashboard"
                            >
                                <v-list-item-icon>
                                    <v-icon>mdi-view-dashboard-outline</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-title
                                        >Dashboard</v-list-item-title
                                    >
                                </v-list-item-content>
                            </v-list-item>

                            <v-list-item
                                link
                                @click="$inertia.visit('/audits')"
                                value="/audits"
                            >
                                <v-list-item-icon>
                                    <v-icon>mdi-account-group-outline</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-title>
                                        Audits
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>

                            <v-list-item
                                link
                                @click="$inertia.visit('/departments')"
                                value="/departments"
                            >
                                <v-list-item-icon>
                                    <v-icon>mdi-view-dashboard-outline</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-title
                                        >Departments</v-list-item-title
                                    >
                                </v-list-item-content>
                            </v-list-item>

                            <v-list-item
                                link
                                @click="$inertia.visit('/templates')"
                                value="/templates"
                            >
                                <v-list-item-icon>
                                    <v-icon>mdi-view-dashboard-outline</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-title
                                        >Templates</v-list-item-title
                                    >
                                </v-list-item-content>
                            </v-list-item>
                            
                        </v-list-item-group>
                    </v-list>
                </v-navigation-drawer>

                <v-app-bar app color="#2b3643" dark dense>
                    <v-app-bar-nav-icon
                        @click.stop="drawer = !drawer"
                    ></v-app-bar-nav-icon>
                    <v-toolbar-title class="d-none d-sm-flex appTitle "
                        >Lenovo</v-toolbar-title
                    >
                    <v-spacer></v-spacer>

                    <v-icon class="d-none d-sm-flex mr-2"
                        >mdi-account-cir cle</v-icon
                    >

                    <span class="mr-4 d-none d-sm-flex">
                        {{ this.$page.props.user.name }}
                    </span>

                    <v-btn @click="logout()" small class="ma-2" text dark>
                        <v-icon dark small left>mdi-logout</v-icon>logout
                    </v-btn>
                </v-app-bar>

                <v-container fluid>

                <v-row>
                    <v-col class="ma-0 pa-0 mb-4 breadcrumbs">
                        <v-sheet height="55" width="100%" fluid></v-sheet>
                    </v-col>
                </v-row>
                </v-container>

                <slot />

                <v-footer app padless color="#2f4554">
                    <v-col class="text-center white--text">
                        {{ new Date().getFullYear() }} -
                        {{ this.$page.props.appName }}
                    </v-col>
                </v-footer>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
import CreateCustomResponseMenu from "@/components/CreateCustomResponseMenu"
import { EventBus } from '@/Eventbus/event-bus.js'

export default {
    data() {
        return {
            drawer: false,
            snackbar: false,
            menuState: false
        };
    },
    components: {
      CreateCustomResponseMenu
    },
    methods: {
        logout() {
            axios
                .post("/logout")
                .then(response => {
                    if (response.status === 302 || 401) {
                        this.$inertia.visit("login");
                    } else {
                        // throw error and go to catch block
                    }
                })
                .catch(error => {});
        },
        toggleMenuState() {
        this.menuState = !this.menuState
      },
        expandMenu(path) {
            return location.pathname.includes("/departments");
        }
    },
    computed: {
        currentController() {

            var link = document.location.href.split('/');
            return `/${link[3]}`;
            
            
        }
    },
    mounted() {
      EventBus.$on('toggleMenuState', this.toggleMenuState);
    }
};
</script>

<style>

/* * {
  cursor: default;
} */


.v-main {
    background-color: #eef1f5;
}


</style>
