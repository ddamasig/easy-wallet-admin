<template>
  <v-card
    flat
    class="py-2 px-0"
    :color="color"
  >
    <v-list-item>
      <v-list-item-avatar>
        <v-icon
          color="white"
          x-large
        >
          {{ icon }}
        </v-icon>
      </v-list-item-avatar>
      <v-list-item-content>
        <v-list-item-title
          class="font-weight-bold"
          :class="textColor"
          style="font-size: 1.25rem"
        >
          {{ value }}
        </v-list-item-title>
        <v-list-item-subtitle :class="textColor">
          {{ label }}
        </v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
  </v-card>
</template>

<script>
export default {
  props: {
    color: String,
    textColor: String,
    value: String,
    label: String,
    icon: String
  }
}
</script>
