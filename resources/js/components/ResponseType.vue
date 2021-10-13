<template>
  
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


</template>

<script>
export default {
  props:['question'],
  data() {
    return {
      hiddenChipCount: 0
    }
  },
  methods: {

    isOverflow() {

      
      let columnWidth = this.$refs.chipContainer.clientWidth - 25

      let chips = this.$refs.chips 
      // this.hiddenChipCount = 0
      let width = 0
        // chip.style.display = 'block'
      chips.forEach(chip => {


        if ((chip.clientWidth + width) >= columnWidth) {
          chip.style.display = 'none'
          this.hiddenChipCount++
        } 
          width += chip.clientWidth
      });

    }

    
  },

  computed: {
    isMultipleChoice() {
      return this.question.response_type.type === 'multiple_choice' ? true : false
    },
    
    responseType() {
      return this.question.response_type
    }
    
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



.counter {
  width: 20px;
}


</style>