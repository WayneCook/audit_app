<template>
    <v-container>
		<v-row>
			<v-col class="text-right">
				<v-btn class="primary" @click="$inertia.visit('/templates/create')" link>new template</v-btn>
			</v-col>
		</v-row>
      
        <v-row>


            <draggable 
                @start="drag=true" 
                @end="updateList()" 
                :list="templates"
                handle=".dragHandle"
            >

            <v-card
                class="mx-auto"                
                max-width="344"
                outlined
                v-for="(template, index) in templates" :key="template.id"
            >

            
                <v-icon class="dragHandle">mdi-drag</v-icon>
            

                <v-list-item three-line>
                <v-list-item-content>
                    <div class="text-overline mb-4">
                    TEMPLATE
                    </div>
                    <v-list-item-title class="text-h5 mb-1">
                    {{ template.title }}
                    </v-list-item-title>
                    <v-list-item-subtitle>{{ template.description }}</v-list-item-subtitle>
                </v-list-item-content>

                <v-list-item-avatar
                    tile
                    size="80"
                    color="grey"
                ></v-list-item-avatar>
                </v-list-item>

                <v-card-actions>
                <v-btn
                    
                    small
                    class="primary"
                >
                    edit
                </v-btn>
                </v-card-actions>
            </v-card>
            
            </draggable>
              
        </v-row>
    </v-container>
</template>

<script>
import Layout from "@/Pages/Layout";
import Draggable from 'vuedraggable'



export default {
    layout: Layout,
    data() {
        return {
            newOrder: Array
            
        }
    },
    props: {
        templates: Array
    },
    components: {

        Draggable
    },
    methods: {
        updateList(){
            console.log(this.templates);
        }
    },
    computed: {
        
    }
};
</script>
