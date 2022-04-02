<template>
  <v-card
    flat
    color="background lighten-1"
    height="100%"
    @click="onClickHandler()"
    :disabled="feature.disabled"
  >
    <v-card-text class="text-center pb-1">
      <v-avatar :color="feature.color">
        <v-icon color="white">{{ feature.icon }}</v-icon>
      </v-avatar>
      <p class="mt-4 mb-2 font-weight-bold">{{ feature.name }}</p>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  props: {
    feature: Object
  },
  methods: {
    onClickHandler() {
      this.$router.push(this.feature.to)
    }
  }
}
</script>
