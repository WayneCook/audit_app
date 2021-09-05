<template>

  <v-sheet 
  @click="openOptions" 
  v-click-outside="closeOptions"
  outlined
  :ripple="false"
  >

  <v-row>
    <v-col class="col-12 col-sm-6 col-md-8 question_col text-left d-flex">
      <v-btn class="d-none d-sm-block align-self-center drag-handle mr-2" icon color="gray">
        <v-icon>mdi-drag-vertical</v-icon>
      </v-btn>
      
      <question-textarea :question="question"></question-textarea>
    </v-col>
    <v-col>
      <div class="d-flex align-center justify-space-between col-xs-12">
        <response-type class="align-self-center" :question="question"></response-type>
        <div class="d-flex">

          <template-response-menu :question="question" class="align-self-right"></template-response-menu>

          <v-btn class="d-flex d-sm-none drag-handle ma-0 custom-button align-self-right" icon color="gray">
            <v-icon>mdi-drag-vertical</v-icon>
          </v-btn>
        </div>

      </div>
   
       
    </v-col>
    
    <v-expand-transition>
      <question-option-component v-if="options"></question-option-component>
    </v-expand-transition>
    
  </v-row> 
  </v-sheet>
</template>

<script>

import TemplateResponseMenu from './TemplateResponseMenu'
import CreateCustomResponseMenu from "./CreateCustomResponseMenu"
import QuestionTextarea from "./QuestionTextarea"
import QuestionOptionComponent from "./QuestionOptionComponent"
import ResponseType from "./ResponseType"
import { EventBus } from '@/Eventbus/event-bus.js'


export default {
  props: ['question'],
  data() {
    return {
      options: false,
      activeQuestion: false
    }
  },
  components: {
    TemplateResponseMenu,
    CreateCustomResponseMenu,
    QuestionTextarea,
    ResponseType,
    QuestionOptionComponent
  },
  methods: {

    openOptions() {
      this.openOptions();
  
    },
    openOptions() {
      this.options = true
    },
    closeOptions() {
      this.options = false
      this.activeQuestion = false
    }
  },
  created() {
   
  }

}
</script>

<style>

</style>