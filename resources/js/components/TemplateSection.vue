<template>
  <v-card flat outlined class="mb-5 pa-4">
    <v-container fluid class="pa-0">
      <v-row no-gutters>
        <v-col cols=11 class="pa-0"> 
          <h4 class="font-weight-light title">{{section.title}}</h4>
        </v-col>
        <v-col cols=1 class="text-right">
          <v-btn icon @click="panelState = !panelState">
          <v-icon>{{ panelState ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
          </v-btn>    
        </v-col> 
      </v-row>
    </v-container>
      
    <v-expand-transition>
      <div v-show="panelState">
        <v-container class="pa-6">
          <v-row no-gutters>
            <v-col cols="7" class="d-flex">
              <div class="align-self-end ml-6">
                <p class="text-left subtitle-1 light-green--text text--darken-1 mb-0">Question</p>
              </div>
            </v-col>
            <v-col cols="5" class="d-flex">
              <div class="align-self-end ml-2">
                <p class="d-none d-sm-table-cell text-left subtitle-1 light-green--text text--darken-1 mb-0">Response type</p>
              </div>
            </v-col>
          </v-row>
          <v-row>
            <v-col class="d-flex ma-0 pa-0">  
              
              <draggable 
              @start="drag=true"  
              @change="arrayChanged(questions)"
              :list="section.questions"
              draggable=".draggable-items"
              tag="v-container"
              handle=".drag-handle"
              class="ma-0 pa-0"
              :group="section.id"  
              animation=150 
              easing='ease-in-out'
              >    
              <v-sheet 
              v-for="(question, index) in questions" 
              :key="question.id"
              class="draggable-items mb-0"
              color="transparent"
              >

                <v-container class="ma-0 pa-0 custom-container">
                  <v-row no-gutters>
                    <v-col class="col-auto d-flex">
                          
                      <v-btn class="d-none d-sm-block align-self-center drag-handle ma-0 pa-0" icon color="gray">
                        <v-icon>mdi-drag-vertical</v-icon>
                      </v-btn>

                     
                    </v-col>

                    <v-col>
                      <question-component 
                      :question="question"  
                      :index="index"
                      :key="question.id"
                      class="question-component"                    
                      ></question-component>
                      
                    </v-col>
                    <v-col class="col-auto d-flex">
                      <v-btn class="d-none d-sm-block align-self-center ma-0 pa-0" icon color="gray">

                      <!-- Question menu -->
                        <div class="text-center">
                          <v-menu offset-y>
                            <template v-slot:activator="{ on, attrs }">
                              <v-icon v-bind="attrs" v-on="on">mdi-dots-vertical</v-icon>
                            </template>
                            <v-list dense>
                              <v-list-item-group>
                                <v-list-item @click="deleteQuestion(question.id, index)">
                                  <v-list-item-icon>
                                    <v-icon>mdi-delete</v-icon>
                                  </v-list-item-icon>
                                  <v-list-item-content>
                                    <v-list-item-title>Delete</v-list-item-title>
                                  </v-list-item-content>
                                </v-list-item>
                              </v-list-item-group>
                        </v-list>
                          </v-menu>
                        </div>

                        <!-- End Question menu -->
                        
                      </v-btn>
                    </v-col>
                 
                  </v-row>
                </v-container>
              
              </v-sheet>
                        
              </draggable>  
            </v-col>
          </v-row>
        </v-container>

        <v-card-actions>
          <v-tooltip top>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
              class="ma-2"
              outlined
              x-small
              fab
              color="success"
              v-bind="attrs"
              v-on="on"
              @mouseup="addNewQuestion"
              
            >
              <v-icon>mdi-plus</v-icon>
            </v-btn>
            
            </template>
            <span>Add new question</span>
          </v-tooltip>
        </v-card-actions>
      </div>
    </v-expand-transition>
  </v-card>            
</template>

<script>
import Draggable from 'vuedraggable'
import TemplateResponseMenu from './TemplateResponseMenu'
import CreateCustomResponseMenu from "./CreateCustomResponseMenu"
import QuestionTextarea from "./QuestionTextarea"
import ResponseType from "./ResponseType"
import QuestionComponent from "./QuestionComponent"
import TestQuestionComponent from "./TestQuestionComponent"
import QuestionMenuComponent from "./QuestionMenuComponent"


export default {
  props: ['section'],
  data() {
    return {
      panelState: true,
      tdHoverColor: 'lightgray',
      isActiveQuestion: false,
      isQuestionFocused: false,
      questions: this.section.questions
      
    }
  },
  components: {
    Draggable,
    TemplateResponseMenu,
    CreateCustomResponseMenu,
    QuestionTextarea,
    ResponseType,
    QuestionComponent,
    TestQuestionComponent,
    QuestionMenuComponent

  },
  methods: {
    arrayChanged(list) {
 
      const questionIds = list.map(question => { return question.id } )
      this.$inertia.visit("/reorder", { only: ['template'], preserveState: false, preserveScroll: true, data: questionIds })
   
    },
    addNewQuestion() {
      this.$inertia.post("/templateQuestion", { section_id: this.section.id }, { preserveScroll: true } )
    },
    deleteQuestion(id, index) {

      // this.questions.splice(index,1)

      this.$inertia.visit(`/templateQuestion/${id}`, {
          method: "delete",
          replace: false,
          preserveState: false,
          preserveScroll: true,
          onSuccess: () => {
              this.dialog = false;
              // this.formReset();
          }
      })
      
    }
  },
  computed: {
    // questions() {
    //   return this.section.questions
    // }
  },
  created() {

  },
  

}
</script>

<style scoped>

.custom-button {
  width: 15px;
}

.custom-container {
  margin-bottom: -1px!important;
}

.custom-container:hover >>> .question-component {
  background-color: whitesmoke !important;
}







</style>