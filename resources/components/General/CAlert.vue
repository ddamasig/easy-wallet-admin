<template>
  <v-snackbar
    v-model="show"
    :color="color"
    app
    class="mb-12"
    top
    right
  >
    {{ message }}
    <template #action="{ attrs }">
      <v-btn color="white" text v-bind="attrs" @click="show = false" icon>
        <v-icon>mdi-close</v-icon>
      </v-btn>
    </template>
  </v-snackbar>
</template>


<script>
export default {
  data() {
    return {
      show: false,
      message: "",
      color: ""
    };
  },
  created() {
    this.$store.subscribe((mutation, state) => {
      if (mutation.type === "alerts/showMessage") {
        this.message = state.alerts.content;
        this.color = state.alerts.color;
        this.show = true;
      }
    });
  }
};
</script>
