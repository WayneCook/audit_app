<template>
<div>

    <v-menu
      ref="menu"
      class="myMenu"
      allow-overflow
      left
      origin="center center"
      transition="scale-transition"
      :nudge-width="200"
      offset-x
      :value="modalState"
    
    >
      <template v-slot:activator="{ on }">
        <v-btn
          color="grey"
          dark
          icon    
          v-on="on"
          
        >
          <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>
  
      </template>


    <v-container fluid class="pa-0 ma-0 menuContainer">
        
        <multi-choice-group :question="question"></multi-choice-group>

    </v-container>

    </v-menu>

</div>

</template>

<script>


import MultiChoiceGroup from "@/components/MultiChoiceGroup"
import { EventBus } from '@/Eventbus/event-bus.js';




export default {
    props: ['question'],
    data() {
        return {
            modalState: false
        }
    },
    components: {
        MultiChoiceGroup
    },
    methods: {
        closeModal(){
            this.modalState = false
        },
        openModal(){
            this.modalState = true
        },
        toggleModal() {
          this.modalState = !this.modalState
        },
        drawerMenu() {

          this.$page.props.template.responseMenuDrawer.active = true;

          console.log(this.$page.props.template.responseMenuDrawer.active);
        },                  
    },
    computed: {
      getSelectedResponse() {

      }
    },
    mounted() {
      EventBus.$on('closeModal', this.closeModal);

    }
      

}
</script>

<style scoped>

.menuContainer {
    background-color: white;
    overflow: hidden;
}
  

</style>