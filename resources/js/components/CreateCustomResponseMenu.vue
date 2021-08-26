<template>
  <v-navigation-drawer
    :value="menuState"
    absolute
    bottom
    right
    stateless
    temporary
  >
    <v-list nav dense>
      <v-list-item-group active-class="deep-purple--text text--accent-4">
        <v-list-item>
          <v-list-item-title>Foo</v-list-item-title>
        </v-list-item>

        <v-list-item>
          <v-list-item-title>Bar</v-list-item-title>
        </v-list-item>

        <v-list-item>
          <v-list-item-title>Fizz</v-list-item-title>
        </v-list-item>

        <v-list-item>
          <v-list-item-title>Buzz</v-list-item-title>
        </v-list-item>
      </v-list-item-group>
    </v-list>

    <v-btn @click="toggleMenuState">close</v-btn>
  </v-navigation-drawer>
</template>

<script>
import MultiChoiceGroup from "@/components/MultiChoiceGroup";
import { EventBus } from "@/Eventbus/event-bus";

export default {
  props: ["menuState"],

  data() {
    return {};
  },
  components: {
    MultiChoiceGroup
  },
  methods: {
    toggleMenuState() {
        EventBus.$emit("toggleMenuState");
    }
  },
  created() {}
};
</script>

<style scoped>
.menuContainer {
  background-color: white;
  overflow: hidden;
}
</style>
