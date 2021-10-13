<template>

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
  <v-row no-gutters class="d-flex flex-wrap flex-sm-nowrap ma-0 pa-2">
    <v-col class="question_col text-left d-flex flex-nowrap pa-0 ma-0">   
      <question-textarea :question="question"></question-textarea>
    </v-col>

    <v-divider vertical class="d-none d-sm-block mr-2"></v-divider>

    <v-menu
    ref="menu"
    class="myMenu"
    allow-overflow
    offset-y
    transition="scroll-y-reverse-transition"
    :close-on-content-click="false"
    v-model="responseTypeMenuState"
    >
      <template v-slot:activator="{ on }">

        <v-col v-on="on" class="pa-0 ma-0 custom-col d-flex flex-grow-0">

          <v-container class="pa-0 align-self-center">
            <v-row no-gutters class="d-flex flex-grow-0 flex-nowrap">

              <v-col class="pa-0 "> 

              <!----------- Display response type ----------->
                <div v-if="isMultipleChoice" ref="chipContainer" class="d-flex chip-container">   
                  <div ref="chips" v-for="response in multipleChoiceResponses" :key="response.id">
                    <v-chip           
                    small              
                    class="mr-2"
                    :color="response.color"              
                    input-value='false'
                    outlined
                    >
                      {{response.title}}
                    </v-chip>                     
                  </div>
                  <div class="success--text counter align-self-center ml-auto mr-2" v-if="hiddenChipCount > 0">+{{ hiddenChipCount }}</div>     
                </div> 
                <v-container v-else class="ma-0 pa-0">
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
                </v-container>

                </v-col>

                <v-col class="myCol flex-grow-0 pa-0 d-flex">
                  <v-icon class="custom-icon align-self-center">mdi-chevron-down</v-icon>
                </v-col>

              </v-row>
            </v-container>

          </v-col>    
        </template>
        <!------------ Response type menu ------------>  
        <template-response-menu :isOverflow='isOverflow' :question='question'></template-response-menu>
      </v-menu>
    </v-row> 
  </v-sheet>

</template>

<script>

import TemplateResponseMenu from './TemplateResponseMenu'
import QuestionTextarea from "./QuestionTextarea"
import ResponseType from "./ResponseType"
import { EventBus } from '@/Eventbus/event-bus.js'

export default {
  props: ['question', 'index'],
  data() {
    return {
      isActiveSheet: false,
      hiddenChipCount: 0,
      responseTypeMenuState: false
    }
  },
  components: {
    TemplateResponseMenu,
    QuestionTextarea,
    ResponseType
  },
  methods: {

    openOptions() {
      this.openOptions()
    },
    toggleResponseTypeMenu() {
      this.menuState = !this.menuState
    },
    openOptions() {
      this.options = true
    },
    closeOptions() {
      this.options = false
    },
      
    isOverflow() {

      this.hiddenChipCount = 0
      let chips = this.$refs.chips 
      let width = 0
      chips.forEach(chip => {
        if ((chip.clientWidth + width) >= 275) {
          chip.style.display = 'none'
          this.hiddenChipCount++
        } 
          width += chip.clientWidth
      });
     
    }
  },
  computed: {
    multipleChoiceResponses() {
      return this.question.response_type.multiple_choice_responses
    },
    defaultResponseTypes() {
      return this.$page.props.template.default_response_types
    },
    isMultipleChoice() {
      return this.question.response_type.type === 'multiple_choice' ? true : false
    },
    templateResponseTypes() {
      return this.$page.props.template.multiple_choice_response_types 
    },
    
    responseType() {
      return this.question.response_type
    },
  
    },
  mounted() {

    this.$nextTick(() => { this.isOverflow() })   

    // window.addEventListener('resize', this.isOverflow) 

  },
  beforeDestroy() {

  // window.addEventListener('resize', this.isOverflow) 
}

}
</script>

<style scoped>

.custom-col {
  overflow: hidden;
  width: 320px !important;
  max-width: 320px !important;
  min-width: 320px !important;

}

.custom-icon {
 box-sizing: border-box; 
}

.myCol {
  width: 20px !important;
  max-width: 20px !important;
  min-width: 20px !important;
  overflow: hidden;

}

.responseSheet {
  overflow:hidden;
}

.responseContainer {
  width: 100%;
}

.custom-sheet {
  border: 1px solid lightgray !important;
}

.custom-container {
  margin-bottom: -1px!important;
}

.custom-container:hover >>> .question-component {
  background-color: whitesmoke !important;
}

/* .myMenu {
  width: 300px;
} */








</style>