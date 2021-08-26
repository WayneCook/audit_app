<template>

  <v-textarea
    @blur="updateQuestion"
    @keydown.enter.prevent
    solo                          
    no-resize
    rows="1"
    flat
    auto-grow
    name="input-7-4"
    hide-details
    placeholder="Enter question here.."
    v-model="textareaState"   
    class="myTextArea"                         
  ></v-textarea>
  
</template>

<script>
export default {
    props: ['sectionId', 'question', 'questionId'],
    data() {
      return {
        textareaState: this.question
      }
    },
    methods: {
 
      updateQuestion() {

        if(this.question !== this.textareaState) {  
        this.$inertia.put(`/question/${this.questionId}`, 
          { question: this.textareaState, question_id: this.questionId },
          { preserveState: true, preserveScroll: true  } ) 
        }
      }
    },
    computed: {
     
    },
    mounted() {
      console.log(this.questionId);
    }

}
</script>

<style>

</style>