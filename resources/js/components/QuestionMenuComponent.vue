!<template>
  

  <div class="text-center">
      <v-menu offset-y>
        <template v-slot:activator="{ on, attrs }">

          <v-icon
          v-bind="attrs"
          v-on="on"
          >
          mdi-dots-vertical</v-icon>
      
        </template>
        <v-list dense>
          <!-- <v-subheader>REPORTS</v-subheader> -->
          <v-list-item-group>
            <v-list-item @click="deleteQuestion">
              <v-list-item-icon>
                <v-icon>mdi-delete</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>Delete</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>
    </v-list>
      </v-menu>
    </div>


</template>

<script>
export default {
  props: ['question'],
  methods: {
    deleteQuestion() {

    this.$inertia.visit(`/templateQuestion/${this.question.id}`, {
                method: "delete",
                replace: false,
                preserveState: false,
                preserveScroll: true,
                onSuccess: () => {
                    this.dialog = false;
                    // this.formReset();
                }
            })
          

    }

  }

}
</script>

<style>

</style>