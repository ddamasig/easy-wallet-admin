<template>
  <v-app-bar
    app
    elevate-on-scroll
  >
    <v-app-bar-nav-icon
      @click="toggleNavigationBar"
    ></v-app-bar-nav-icon>

    <v-avatar size="32" class="mr-2">
      <v-img src="/logos/ewallet.png"></v-img>
    </v-avatar>
    <span class="font-weight-medium">
      EasyWallet
    </span>

    <v-spacer></v-spacer>

    <c-notifications></c-notifications>
    <c-avatar-menu></c-avatar-menu>
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



