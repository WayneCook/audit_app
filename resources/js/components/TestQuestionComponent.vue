<template>
  <v-container @click="test" class="ma-0 pa-0 custom-container question-component">
                  <v-row no-gutters>
                    <v-col class="col-auto d-flex">
                          
                      <v-btn class="d-none d-sm-block align-self-center drag-handle ma-0 pa-0" icon color="gray">
                        <v-icon>mdi-drag-vertical</v-icon>
                      </v-btn>

                     
                    </v-col>

                    <v-col>



                      <v-sheet 
  @click="openOptions" 
  v-click-outside="closeOptions"
  @mouseover="isActiveSheet=true"
  @mouseleave="isActiveSheet=false"
  :ripple="false"
  outlined
  class="draggable-items custom-sheet" 
  color="transparent"
  >

  <v-row class="d-flex flex-wrap flex-sm-nowrap ma-0 pa-2">

    <v-col class="question_col text-left d-flex flex-nowrap pa-0 ma-0">   
      <question-textarea :question="currentQuestion"></question-textarea>
    </v-col>

    <v-divider vertical class="d-none d-sm-block mr-2"></v-divider>

      <v-menu
        ref="menu"
        class="myMenu"
        allow-overflow
        offset-y
        transition="scroll-y-reverse-transition"
        >

        <template v-slot:activator="{ on }">

          <v-col v-on="on" class="pa-0 ma-0 custom-col d-flex flex-grow-0">

            <v-container class="pa-0 align-self-center">
              <v-row no-gutters class="d-flex flex-grow-0 flex-nowrap">

                <v-col class="pa-0 "> 

                <!----------- Display response type ----------->


                  <div v-if="isMultipleChoice" ref="chipContainer" class="d-flex chip-container">
     
                    <div ref="chips" class="chips" v-for="response in question.response_type.multiple_choice_responses" :key="response.id">

                      <v-chip           
                      small              
                      class="mr-2 custom-chip"
                      :color="response.color"              
                      input-value='false'
                      outlined
                      >
                        {{response.title}}
                      </v-chip> 

                      
                    </div>

                    <div class="success--text counter align-self-center ml-auto mr-2" v-if="hiddenChipCount > 0">+{{ hiddenChipCount }}</div>
      
      

    <!-- </div> -->

      
      <!-- <div v-if="hiddenChipCount > 0">
        ...
      </div> -->

    <!-- <v-container v-else class="ma-0 pa-0">
      <v-row>
        <v-col class="d-flex flex-nowrap">

            <div>

              <v-icon>
                {{ responseType.icon }}
              </v-icon>
            </div>
            <div class="ml-2 align-self-center body-2 grey--text text--darken-1 text-no-wrap">
              {{ responseType.description }}
            </div>
          
        </v-col>
      </v-row>
    </v-container> -->

  </div>



                </v-col>

                <v-col class="myCol flex-grow-0 pa-0 d-flex">
                      <v-icon class="custom-icon align-self-center">mdi-chevron-down</v-icon>
                </v-col>

              </v-row>
            </v-container>

          </v-col>    
        </template>

        <!------------ Response type menu ------------>
        <v-container fluid class="multiContainer ma-0 pa-0">
          <v-row dense>
            <v-col dense>

              <v-list dense>
                <v-container fluid class="ma-0 pa-0">
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
                
                <v-list-item-group>
                  <v-divider></v-divider>

                  <v-list-item @click="updateQuestion(multipleChoiceResponse.id, multipleChoiceResponse)" class="ma-0 pa-0" v-for="(multipleChoiceResponse, index) in multipleChoiceResponses" :key="multipleChoiceResponse.id">
                  <v-list-item-content class="ma-0 pa-0">
                    <v-container>
                      <v-row>
                        <v-chip
                          small
                          outlined
                          v-for="response in multipleChoiceResponse.multiple_choice_responses"
                          :key="response.id"
                          class="ma-2"
                          :color="response.color"
                          :text-color="response.color"
                          input-value='false'
                        >
                          {{response.title}}
                        </v-chip>
                      </v-row>
                    </v-container>
                  </v-list-item-content>
                </v-list-item>

                <v-subheader>Other responses</v-subheader>

                <v-list-item @click="updateQuestion(defaultResponseType.id, defaultResponseType)" class="ma-0 pa-0" v-for="(defaultResponseType, index) in defaultResponseTypes" :key="defaultResponseType.id">
                  <v-list-item-content class="ma-0 pa-0">
                    <v-container class="ma-0 pa-0">
                      <v-icon> {{ defaultResponseType.icon }} </v-icon>        
                      {{ defaultResponseType.description }}                      
                    </v-container>
                  </v-list-item-content>
                </v-list-item>

                </v-list-item-group>
              </v-list>

              <!-- End response type menu -->

            </v-col>
        </v-row>
    </v-container>
          <!-- <template-response-menu :question="question" class="align-self-center"></template-response-menu> -->
   

      </v-menu>

  </v-row> 

  </v-sheet>



                      
                    </v-col>
                    <v-col class="col-auto d-flex">
                      <v-btn class="d-none d-sm-block align-self-center drag-handle ma-0 pa-0" icon color="gray">
                        <v-icon>mdi-dots-vertical</v-icon>
                      </v-btn>
                    </v-col>
                 
                  </v-row>
                </v-container>
</template>

<script>
export default {

  props: ['question', 'index']

}
</script>

<style>

</style>