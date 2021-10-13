<template>
<div>

    <v-container fluid class="multiContainer ma-0 pa-0">
        <v-row dense>
            <v-col dense>

              <v-list dense>
                <v-container fluid class="ma-0 pa-2">
                  <v-row no-gutters>

                    <v-col cols="10">
                      <v-subheader>Multiple choice responses</v-subheader>
                    </v-col>           
                      <v-col align-self="center">
                        <div>

                          <v-tooltip top>
                            <template v-slot:activator="{ on, attrs }">
                              
                              <v-icon
                                small
                                color="green darken-2"
                                v-bind="attrs"
                                v-on="on"
                                @click="toggleMenuState"
                              >
                                mdi-plus
                                
                              </v-icon>
                            </template>
                            <span>Create custom response</span>
                          </v-tooltip>                          
                        </div>
                      </v-col>
                                         
                  </v-row>
                </v-container>
                
                <v-list-item-group v-model="model">
                  <v-divider></v-divider>

                  <v-list-item :value="multipleChoiceResponse.id" @click="updateQuestion(multipleChoiceResponse.id, multipleChoiceResponse)" class="menuItem ma-0 pa-0" v-for="(multipleChoiceResponse, index) in multipleChoiceResponses" :key="multipleChoiceResponse.id">
                  <v-list-item-content class="ma-0 pa-0 pl-2">

                    <chip-container-component :multipleChoiceResponse="multipleChoiceResponse"></chip-container-component>
                   
                  </v-list-item-content>
                </v-list-item>

                <v-subheader>Other responses</v-subheader>

                <v-list-item :value="defaultResponseType.id" @click="updateQuestion(defaultResponseType.id, defaultResponseType)" class="ma-0 pa-0" v-for="(defaultResponseType, index) in defaultResponseTypes" :key="defaultResponseType.id">
                  <v-list-item-content class="ma-0 pa-0 pl-2">
                    <v-container class="ma-0 pa-0">
                      <v-icon> {{ defaultResponseType.icon }} </v-icon>        
                      {{ defaultResponseType.description }}                      
                    </v-container>
                  </v-list-item-content>
                </v-list-item>

                </v-list-item-group>
              </v-list>

            </v-col>
        </v-row>
    </v-container>

</div>

</template>

<script>


import MultiChoiceGroup from "@/components/MultiChoiceGroup"
import OtherResponseComponent from "@/components/OtherResponseComponent"
import ChipContainerComponent from "@/components/ChipContainerComponent"
import { EventBus } from '@/Eventbus/event-bus.js';

export default {
    props: ['question', 'isOverflow'],
    data() {
        return {
            modalState: false,
            oldQuestion: this.question,
            model: this.question.response_type.id,
            hiddenChipCount: 0
        }
    },
    components: {
        MultiChoiceGroup,
        OtherResponseComponent,
        ChipContainerComponent
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
      updateQuestion(id, responseType) {
     
        this.question.response_type = responseType
        this.$nextTick(() => { this.isOverflow() }) 
       
 
        if(id !== this.oldQuestion.response_type_id) {
          this.oldQuestion.response_type_id = id
          
            this.$inertia.put(`/templateQuestion/${this.question.id}`, 
            this.question,
            { preserveState: true, preserveScroll: true  } ) 

        }

      },
      toggleMenuState() {
        EventBus.$emit('toggleMenuState')
        
      } 
                   
    },
    computed: {
      multipleChoiceResponses() {
          return this.$page.props.template.multiple_choice_response_types
        },
        defaultResponseTypes() {
          return this.$page.props.template.default_response_types
        },
        selectedResponse() {
          return this.question.response_type.id
        }
    },
    mounted() {
      EventBus.$on('closeModal', this.closeModal);

    
      // this.$nextTick(() => { this.isOverflown() })  
    },
    
      

}
</script>

<style scoped>

.multiContainer {

  background-color: white;
  overflow: hidden;
}

.menuItem {
  width: 350px;
}
  

</style>