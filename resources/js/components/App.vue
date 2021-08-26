<template>
    <v-app>
        <v-main>
            <v-container
            fluid
            >
                <v-layout>
                    <!-- <layout-component></layout-component> -->
                    
                </v-layout>
            </v-container>
        </v-main>

        <v-footer
        color="#2f4554"
        app
        >
            <span class="white--text">App</span>
        </v-footer>
    </v-app>
</template>

<script>
import LayoutComponent from './Layout';
export default {
    layout: LayoutComponent,
    components: {
        LayoutComponent
    },
    props: {
      user: Object,
    },
    
  }
</script>

<style scoped>
</style>