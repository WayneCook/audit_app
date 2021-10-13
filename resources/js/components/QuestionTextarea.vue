<template>

  <div class="text-area-wrapper mr-3 d-flex">

    <textarea-autosize
    placeholder="Type something here..."
    ref="myTextarea"
    v-model="textareaState.question"
    @keydown.enter.native.prevent
    autosize       
    rows="1"
    @change.native="updateQuestion" 
    class="myTextarea"
    />
  
  </div>
</template>

<script>

export default {
    props: ['question',],
    data() {
      return {
        textareaState: this.question,
        isActive: false,
        isFocus: false

      }
    },
    methods: {
 
      updateQuestion() {

        delete this.textareaState.response_type
        this.$inertia.put(`/templateQuestion/${this.question.id}`, 
          { question: this.textareaState.question },
          { preserveState: true, preserveScroll: true  } ) 
        
      },
      toggleActive() {
        this.isActive = !this.isActive
      },
      toggleFocus() {
        this.isFocus = !this.isFocus

      }
    },
    mounted() {

    }
}
</script>

<style scoped>

.text-area-wrapper {
  width: 100%;
}

  
.custom-text-area textarea {
  cursor: default;
  font-size: 14px;
  width: 100% !important;
}

textarea {
  width: 100% !important;
  border: 1px solid #8c8c8c;
  padding: 6px;
  border-radius: 4px;
  cursor: default;
  margin-right: 10px !important;
  color: #333333;
  font-size: 14px;
  overflow: hidden;

}

textarea:focus {
  background-color: white;
  cursor: text;
  outline-color: #0275d8 !important;
  overflow: hidden;
}

.custom-text-area textarea:focus {
  cursor: text;
}






</style>