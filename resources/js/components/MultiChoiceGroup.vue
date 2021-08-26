<template>
    
    <v-container fluid class="multiContainer ma-0 pa-0">
        <v-row dense>
            <v-col dense>

              <!-- <v-color-picker
                class="ma-2"
                :swatches="swatches"
                show-swatches
                hide-inputs="true"
                hide-canvas="true"
                hide-sliders="true"
              ></v-color-picker> -->

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

                  <v-list-item @click="setResponseType(group)" class="ma-0 pa-0" v-for="(group, index) in multiChoiceGroup" :key="group.title">
                  <v-list-item-content class="ma-0 pa-0">
                    <v-container>
                      <v-row>
                        <v-chip

                          small
                          v-for="response in group.responses"
                          :key="response.id"
                          class="ma-2"
                          :color="lightenDarkenColor(response.color, 20)"
                          :text-color="response.color"
                          input-value='false'
                        >
                          {{response.title}}
                        </v-chip>
                      </v-row>
                    </v-container>
                  </v-list-item-content>
                </v-list-item>

                <v-list-item @click="setResponseType(group)" class="ma-0 pa-0" v-for="(group, index) in defaultResponses" :key="group.id">
                  <v-list-item-content class="ma-0 pa-0">
                    <v-container>
                      <v-row>
                        <v-chip
                          small
                          v-for="response in group.responses"
                          :key="response.id"
                          class="ma-2"
                          :color="lightenDarkenColor(response.color, 20)"
                          :text-color="response.color"
                          input-value='false'
                        >
                          {{response.title}}
                        </v-chip>
                      </v-row>
                    </v-container>


                  </v-list-item-content>
                </v-list-item>
                
                </v-list-item-group>
              </v-list>


            </v-col>
        </v-row>
    </v-container>

</template>



<script>

import { EventBus } from '@/Eventbus/event-bus.js';

export default {

    data() {
        return {

          swatches: [
        ['#FF0000', '#AA0000', '#550000'],
        ['#FFFF00', '#AAAA00', '#555500'],
        ['#00FF00', '#00AA00', '#005500'],
        ['#00FFFF', '#00AAAA', '#005555'],
        ['#0000FF', '#0000AA', '#000055'],
      ],

        }
    },
    methods: {
      lightenDarkenColor(col, amt) {
          col = parseInt(col, 16);
          return (((col & 0x0000FF) + amt) | ((((col >> 8) & 0x00FF) + amt) << 8) | (((col >> 16) + amt) << 16)).toString(16);
      },
      setResponseType(group) {
        console.log(group);
        EventBus.$emit('closeModal')
      },
      toggleMenuState() {
        EventBus.$emit('toggleMenuState')
        
      }
        
    },
    computed: {
        multiChoiceGroup() {
          return this.$page.props.template.multiple_choice_response_groups
        },
        defaultResponses() {
          return this.$page.props.default_responses; 
        }
    },
    mounted() {
      
    }

}
</script>

<style scoped>

.menuContainer {
    background-color: white;
    overflow: hidden;
}

.multiContainer {
  min-width: 350px;
}
  

</style>