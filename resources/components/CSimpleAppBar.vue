<template>
  <v-app-bar
    app
    dense
    flat
    elevate-on-scroll
  >
    <v-app-bar-nav-icon v-if="link" @click="$router.push(link)">
      <v-icon>
        mdi-arrow-left
      </v-icon>
    </v-app-bar-nav-icon>
    <v-app-bar-title>
      <small>{{ title }}</small>
    </v-app-bar-title>
    <v-spacer></v-spacer>
  </v-app-bar>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      default: ''
    },
    link: {
      type: String,
      default: ''
    },
  }
}
</script>
