<template>
  <v-app-bar
    flat
    color="transparent"
    class="mb-3"
  >
    <v-app-bar-nav-icon
      v-if="link"
      class="white"
      @click="$router.push(link)"
    >
      <v-icon>
        mdi-arrow-left
      </v-icon>
    </v-app-bar-nav-icon>
    <v-app-bar-title>
      {{ title }}
    </v-app-bar-title>
    <v-spacer></v-spacer>
  </v-app-bar>
</template>

<script>
export default {
  props: {
    link: String,
    title: String
  }
}
</script>
