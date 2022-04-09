<template>
  <v-app-bar
    app
    elevate-on-scroll
  >
    <v-app-bar-nav-icon
      @click="toggleNavigationBar"
    ></v-app-bar-nav-icon>

    <span class="font-weight-medium">
      EasyWallet Admin
    </span>

    <v-spacer></v-spacer>

    <c-notifications></c-notifications>
  </v-app-bar>
</template>


<script>
export default {
  methods: {
    toggleNavigationBar() {

      this.$root.$emit('toggle-navigation-drawer')
    }
  }
}
</script>



