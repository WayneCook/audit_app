<template>
    <div>
        <v-card class="mx-auto"
        max-width="344"
        >
            <v-card-title>
            {{ capitalize(audit.title) }}
            </v-card-title>

            <v-card-actions>
                <v-btn
                text
                color="deep-purple accent-4"
                >
                    Learn More
                </v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
export default {
    props: ['audit'],
    methods: {
        capitalize(str) {
            const lower = str.toLowerCase();
            return str.charAt(0).toUpperCase() + lower.slice(1);
        }
    }

}
</script>

<style>

</style>