<template>
  <v-container> 
    <v-row>
      <v-col>
        <template-section v-for="(section, index) in template.sections" :key="section.index" :section="section"></template-section>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import Layout from '@/Pages/Layout'
import TemplateSection from "@/components/TemplateSection"
import { EventBus } from '@/Eventbus/event-bus.js'

  export default {
    layout: Layout,
    components: {
        TemplateSection,
    },
    data () {
      return {
        menuState: false,
        panelState: false,
        show: false
        
      }
    },
    methods: {

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
      }
        
    },
    computed: {
        template() {
            return this.$page.props.template;
            
        }
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




</style>
