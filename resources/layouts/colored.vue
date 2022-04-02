<template>
  <v-app>

    <v-main>
      <c-navigation-drawer></c-navigation-drawer>
      <v-container>
        <v-row justify="center">
          <v-col
            cols="12"
            sm="4"
          >
            <Nuxt/>
          </v-col>
        </v-row>
      </v-container>
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
