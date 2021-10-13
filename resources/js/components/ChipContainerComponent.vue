<template>
  <v-container>
    <v-row  no-gutters>
      <v-col class="d-flex flex-grow-0 flex-nowrap">

        <div ref="chips" 
        v-for="response in multipleChoiceResponse.multiple_choice_responses"
        :key="response.id"
        >
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
      </v-col>
      <v-col v-if="hiddenChipCount > 0">
        <div class="success--text counter align-self-center ml-auto mr-2" >+{{ hiddenChipCount }}</div>     
      </v-col>
      <v-col class="col-1 ml-auto">
        <div>
          <v-btn icon>
            <v-icon small>mdi-pencil-outline</v-icon>
          </v-btn>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  props: ['multipleChoiceResponse'],
  data() {
    return {
      hiddenChipCount: 0
    }
  },
  methods: {
    isOverflow() {

      setTimeout(()=>{

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

        }, 50)
   
    }  
  },
  mounted() {
    this.$nextTick(() => { this.isOverflow() })
  }

}
</script>

<style>

</style>