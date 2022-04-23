<template>
  <v-app>
    <c-navigation-drawer></c-navigation-drawer>
    <v-main>
      <v-container>
        <Nuxt/>
      </v-container>
    </v-main>

  </v-app>
</template>

<script>
export default {
  name: 'HomeLayout',
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
