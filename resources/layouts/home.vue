<template>
  <v-app>
    <c-navigation-drawer></c-navigation-drawer>
    <v-main>
      <v-container>
        <c-alert></c-alert>
        <Nuxt/>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import CAlert from "@/components/General/CAlert";

export default {
  name: 'HomeLayout',
  components: {CAlert},
  middleware: 'auth',
  data: () => ({})
}
</script>


<style>
#app {
  /*background-color: #eff7ff;*/
  /*background-color: rgba(247,106,110, 0.04);*/
  /*background-color: white;*/
  font-family: 'Quicksand' !important;
}
</style>
