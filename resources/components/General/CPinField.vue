<template>
  <v-text-field
    v-model="pin"
    label="Enter 4-digit PIN"
    prepend-inner-icon="mdi-lock"
    type="password"
    counter
  >
  </v-text-field>
</template>

<script>
export default {
  data: () => ({
    pin: ''
  }),
  watch: {
    pin(val) {
      if (val.length === 4) {
        this.$emit('input', val)
      }
    }
  }
}
</script>
