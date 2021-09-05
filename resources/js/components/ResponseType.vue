<template>
  

  <div>
    <v-container v-if="isMultipleChoice">
      <v-row>
        <v-chip
          small
          v-for="response in responseType.multiple_choice_responses"
          :key="response.id"
          class="mr-1"
          :color="lightenDarkenColor(response.color, 20)"
          :text-color="response.color"
          input-value='false'
        >
          {{response.title}}
        </v-chip>
      </v-row>
    </v-container>


  </div>


</template>

<script>
export default {
  props:['question'],
  methods: {
    lightenDarkenColor(col, amt) {
          col = parseInt(col, 16);
          return (((col & 0x0000FF) + amt) | ((((col >> 8) & 0x00FF) + amt) << 8) | (((col >> 16) + amt) << 16)).toString(16);
      },
  },

  computed: {
    isMultipleChoice() {
      return this.question.response_type.type === 'multiple_choice' ? true : false
    },
    responseType() {
      return this.question.response_type
    }
  }

}
</script>

<style>

</style>