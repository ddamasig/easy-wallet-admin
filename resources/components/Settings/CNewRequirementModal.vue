<template>
  <v-dialog v-model="isVisible" persistent max-width="500">
    <v-card>
      <v-card-title>
        <span>New Requirement</span>
        <v-spacer></v-spacer>
        <v-btn icon @click="isVisible = false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </v-card-title>
      <v-card-subtitle>
        Require new members to upload a new attachment during registration.
      </v-card-subtitle>
      <v-card-text>
        <v-row dense>
          <v-col cols="12">
            <v-text-field
              label="Requirement Name"
            ></v-text-field>
          </v-col>
          <v-col cols="12">
            <v-select
              label="File Type"
              :items="fileTypes"
            ></v-select>
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
    fileTypes: [
      "Image",
      "Document",
      "Document/Image",
    ]
  }),
  watch: {
    show(val) {
      this.isVisible = val !== ''
    },
    isVisible(val) {
      if (!val) {
        this.$emit('close-image-viewer')
      }
    }
  }
}
</script>
