<template>
  <v-card flat outlined class="mb-5 pa-3">
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
        <v-container>
          <v-row>
            <v-col cols="8">
              <p class="text-left subtitle-1 light-green--text text--darken-1">Question</p>
            </v-col>
            <v-col cols="4">
              <p class="d-none d-sm-table-cell text-left subtitle-1 light-green--text text--darken-1">Response type</p>
            </v-col>
          </v-row>
          <v-row>
            <v-col>  
              
              <draggable 
              @start="drag=true"  
              @change="arrayChanged(section.questions, $event)"
              :list="section.questions"
              draggable=".draggable-items"
              tag="v-container"
              handle=".drag-handle"
              class="ma-0 pa-0"
              :group="section.id"  
              :options="{ animation:150, easing: 'ease-in-out' }"
              >    
             
                <question-component 
                v-for="question in section.questions" 
                :question="question" 
                class="draggable-items custom-table-row rounded mb-4 pa-4" 
                :key="question.id">
              
                </question-component>
              
          
              
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
              @click="addNewQuestion"
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

import { EventBus } from '@/Eventbus/event-bus.js'

export default {
  props: ['section'],
  data() {
    return {
      panelState: true,
      tdHoverColor: 'lightgray'
    }
  },
  components: {
    Draggable,
    TemplateResponseMenu,
    CreateCustomResponseMenu,
    QuestionTextarea,
    ResponseType,
    QuestionComponent

  },
  methods: {
    arrayChanged(list, event) {
      const questionIds = list.map(question => { return question.id } )
      this.$inertia.visit("/reorder", { preserveScroll: true, data: questionIds })
    },
    addNewQuestion() {
      this.$inertia.post("/question", { section_id: this.section.id }, { preserveScroll: true } )
    },
    test(el) {
      console.log(el);
    }
  }

}
</script>

<style scoped>

.custom-button {
  width: 15px;
}

</style>