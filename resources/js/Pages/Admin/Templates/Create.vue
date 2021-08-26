<template>
  <v-container fluid> 
    <v-row>
      <v-col>
        <v-expansion-panels :value="panelState" class="mb-4"
         v-for="(section, index) in template.sections" :key='section.index'>
            <v-expansion-panel
            >

              <v-container fluid>
                <v-row no-gutters>
                  <v-col cols=11>
                    <h4 class="font-weight-light title">{{section.title}}</h4>
                  </v-col>
                  <v-col cols=1>
                    
                    <div class="d-flex justify-end">

                      <v-btn
                      @click="togglePanel"
                      elevation="2"
                      icon
                    ></v-btn>
                    </div>
                      
                    

                    <!-- <v-expansion-panel-header class="pa-2">
                      <v-container>
                        <v-row>
                            <v-col>
                                <h4 class="font-weight-light title">{{section.title}}</h4>
                            </v-col>
                        </v-row>
                      </v-container>
                    </v-expansion-panel-header> -->
                  
                  </v-col>
                </v-row>
              </v-container>
      
              <!-- <v-expansion-panel-header class="pa-2">
                <v-container>
                  <v-row>
                      <v-col>
                          <h4 class="font-weight-light title">{{section.title}}</h4>
                      </v-col>
                  </v-row>
                </v-container>
              </v-expansion-panel-header> -->

              <v-expansion-panel-content>        
                <v-simple-table>
                  <template v-slot:default>
                    <thead>
                      <tr>
                        <th class="text-left subtitle-1 light-green--text text--darken-1">Question</th>
                        <th class="d-sm-none d-md-table-cell text-left subtitle-1 light-green--text text--darken-1">Response type</th>
                      </tr>
                    </thead>
                    
                      <draggable   
                        @start="drag=true" 
                        @end="updateList" 
                        @change="arrayChanged(template.sections[index].questions, $event)"
                        :list="template.sections[index].questions"
                        draggable=".draggable-items"
                        tag="tbody"
                        :group="section.id"  
                      >

                     
                    <tr
                    v-for="question in section.questions"
                    :key="question.id"
                    class="draggable-items"
                    >
                      <td class="question_col text-left">
                        <question-textarea :question="question.question" :questionId="question.id" :sectionId="section.id"></question-textarea>

                        <v-container class="d-sm-block d-md-none"><p>Response</p></v-container>
                      </td>
                      
                      <td class="d-sm-none d-md-table-cell text-left">
                        <template-response-menu></template-response-menu>
                      </td>
                        

                    </tr> 

                    <span></span>
                    <br>
                  </draggable>                
                </template>
              </v-simple-table>
            </v-expansion-panel-content>
          </v-expansion-panel>
        </v-expansion-panels>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import Layout from '@/Pages/Layout'
import Draggable from 'vuedraggable'
import TemplateResponseMenu from '@/components/TemplateResponseMenu'
import CreateCustomResponseMenu from "@/components/CreateCustomResponseMenu"
import QuestionTextarea from "@/components/QuestionTextarea"
import { EventBus } from '@/Eventbus/event-bus.js'

  export default {
    layout: Layout,
    components: {
        Draggable,
        TemplateResponseMenu,
        CreateCustomResponseMenu,
        QuestionTextarea
        
    },
    data () {
      return {
        menuState: false,
        panelState: false
        
      }
    },
    methods: {
      onClick() {
        console.log('stopped');
      },
      togglePanel() {
        this.panelState = !this.panelState
      },
      menu() {
        this.$inertia.visit('/custom_response_group/create', {
          method: 'get',
          preserveState: true,
          preserveScroll: true,
        })

        console.log(this.$page.props);
      },
      toggleMenuState() {
        this.menuState = !this.menuState
      },
    
    updateList(event){
          // console.log(originalEvent);
          // this.$inertia.visit("/reorder", { preserveScroll: true, data: this.template });
        },
        arrayChanged(list, event) {
     

          const questionIds = list.map(question => {
              return question.id
          })

          this.$inertia.visit("/reorder", { preserveScroll: true, data: questionIds })

        },
    
        
    },
    computed: {
        template() {
            return this.$page.props.template;
            
        },
        btnToggle() {
         
          console.log('ok');
            return this.$page.props.menu.active
            
      
        } 
 
    },
    created() {
      // console.log(this.$page.props.template)
      this.$page.props.menu = false
    },
    mounted() {
      EventBus.$on('toggleMenuState', this.toggleMenuState);
      console.log(this.$page.props.template);
    }
    
  }
</script>

<style scoped>
.question_col {
  word-wrap: break-word;
  max-width: 200px;
  
}

.myTextArea {
  overflow: hidden;
}


/* textarea {
  resize: none;
  width: 100%;
  overflow: hidden;
  padding: 5px;
} */


</style>
