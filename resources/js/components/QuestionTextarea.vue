<template>

  <div class="text-area-wrapper">

  <v-textarea
    @change="updateQuestion"
    @blur="toggleFocus"
    @mouseover="toggleActive"
    @mouseout="toggleActive"
    @keydown.enter.prevent
    @focus="toggleFocus"
    solo   
    dense 
    flat          
    no-resize
    rows="1"
    auto-grow
    :background-color="isFocus ? 'yellow lighten-4' : 'none' "
    hide-details
    placeholder="Enter question here..."
    v-model="textareaState.question"   
    class="custom-text-area" 
    v-bind:class="{active: isActive, focused: isFocus}"                
  ></v-textarea>
  
  </div>
</template>

<script>

  import { EventBus } from '@/Eventbus/event-bus.js'

export default {
    props: ['question', 'options'],
    data() {
      return {
        textareaState: this.question,
        isActive: false,
        isFocus: false,
        hasOptions: this.options

      }
    },
    methods: {
 
      updateQuestion() {

        delete this.textareaState.response_type
        this.$inertia.put(`/question/${this.question.id}`, 
          { question: this.textareaState },
          { preserveState: true, preserveScroll: true  } ) 
        
      },
      toggleActive() {
        this.isActive = !this.isActive
      },
      toggleFocus() {
        this.isFocus = !this.isFocus
        // this.$parent.$emit('toggleOptions')

      }
    },
    mounted() {
      this.hasOptions = false
    }
}
</script>

<style>

.text-area-wrapper {
  width: 100%;
}

.active {
  border: 1px solid #7cb342;
  box-shadow: 0 0 0 1px #7cb342;
  transition: all .10s ease-in-out;
}

.focused {
  border: 1px solid #7cb342;
  box-shadow: 0 0 0 1px #7cb342;
  transition: all .10s ease-in-out;
}

.custom-text-area {
  border: 1px solid lightgray;
  transition: all .10s ease-in-out;
}
  
.custom-text-area textarea {
  cursor: default;
  font-size: 14px;
}

.custom-text-area textarea:focus {
  cursor: text;
  /* color: white; */

}


</style>