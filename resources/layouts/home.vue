<template>
  <v-app>
    <c-navigation-drawer></c-navigation-drawer>
    <v-main>
      <v-container>
        <Nuxt/>
      </v-container>
      <c-bottom-navigation></c-bottom-navigation>
    </v-main>

  </v-app>
</template>

<script>
export default {
  name: 'HomeLayout',
  data: () => ({})
}
</script>


<style>
  #app {
    /*background-color: #eff7ff;*/
    /*background-color: rgba(247,106,110, 0.04)*/
    background-color: #f9f9f9
  }
</style>
