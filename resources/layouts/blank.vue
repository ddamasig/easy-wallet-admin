<template>
  <v-app>

    <v-main>
      <v-container class="fill-height">
        <v-row justify="center" class="fill-height" align="center">
          <v-col cols="12" class="text-center">
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
