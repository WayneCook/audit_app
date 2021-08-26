<template>
    <v-container>
		<v-row>
			<v-col class="text-right">
				<v-btn @click="$inertia.visit('/audits/create')" link>new</v-btn>
			</v-col>
		</v-row>
        <v-row>
            <v-col :key="audit.id" v-for="audit in audits">
                <!-- <audit-card v-bind:audit="audit"></audit-card> -->
            </v-col>
			
        </v-row>
        <v-row class="tex">
            <draggable v-model="myArray" group="people" @start="drag=true" @end="updateList()">
                

                <v-card outlined v-for="(element, index) in myArray" :key="element.id">
                    <v-card-title>
                        {{element}}
                    </v-card-title>
                </v-card>
                
            </draggable>
        </v-row>
    </v-container>
</template>

<script>
import Layout from "@/Pages/Layout";
import Draggable from 'vuedraggable'
// import AuditCard from "@/Pages/Admin/Audits/Index";


export default {
    layout: Layout,
    data() {
        return {
            myArray: ['hello', 'is', 'Wayne', 'name', 'my']
        }
    },
    props: {
        audits: Array
    },
    components: {
        // auditCard: AuditCard
        Draggable
    },
    methods: {
        updateList(){
            console.log(this.myArray);
        }
    }
};
</script>
