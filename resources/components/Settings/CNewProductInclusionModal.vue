<template>
  <v-dialog v-model="isVisible" persistent max-width="500">
    <v-card>
      <v-card-title>
        <span>New Product Inclusion</span>
        <v-spacer></v-spacer>
        <v-btn icon @click="isVisible = false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </v-card-title>
      <v-card-subtitle>
        This product will be shown during member registration.
      </v-card-subtitle>
      <v-card-text>
        <v-row dense>
          <v-col cols="12">
            <v-text-field
              label="Name"
            ></v-text-field>
          </v-col>
          <v-col cols="12">
            <v-file-input
              label="Photo"
              prepend-icon=""
              prepend-inner-icon="mdi-image"
            ></v-file-input>
          </v-col>
          <v-col cols="12">
            <v-textarea
              label="Description"
              auto-grow
            ></v-textarea>
          </v-col>
        </v-row>
      </v-card-text>
      <v-card-actions class="pb-3">
        <v-btn
          color="primary"
          elevation="0"
        >
          Save
        </v-btn>

        <v-btn text>
          Close
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  props: {
    show: Boolean
  },
  data: () => ({
    isVisible: false,
  }),
  watch: {
    show(val) {
      this.isVisible = val !== ''
    },
    isVisible(val) {
      if (!val) {
        this.$emit('close-modal')
      }
    }
  }
}
</script>
