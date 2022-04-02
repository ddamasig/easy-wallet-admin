<template>
  <v-bottom-navigation
    :value="value"
    color="primary"
    class="d-flex d-sm-none"
    grow
    app
  >
    <v-btn to="/">
      <v-icon>mdi-home</v-icon>
    </v-btn>

    <v-btn to="/transaction-history">
      <v-icon>mdi-history</v-icon>
    </v-btn>

    <v-btn to="/dashboard">
      <v-icon>mdi-chart-box-plus-outline</v-icon>
    </v-btn>

    <v-btn to="/profile">
      <v-icon>mdi-account</v-icon>
    </v-btn>
  </v-bottom-navigation>
</template>


<script>
export default {
  data: () => ({ value: 1 }),
}
</script>
