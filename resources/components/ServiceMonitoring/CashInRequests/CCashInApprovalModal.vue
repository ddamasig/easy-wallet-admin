<template>
  <v-dialog
    v-model="dialog"
    width="500"
  >
    <template v-slot:activator="{ on, attrs }">
      <v-btn
        v-bind="attrs"
        v-on="on"
        block
        elevation="0"
        color="primary"
      >
        Approve
      </v-btn>
    </template>

    <v-card>
      <v-card-title>
        Approve Cash-in Request
      </v-card-title>

      <v-card-text>
        <v-form>
          <v-textarea
            v-model="model.remarks"
            label="Remarks"
            auto-grow
          >
          </v-textarea>
          <v-text-field type="password" label="Enter PIN" prepend-inner-icon="mdi-lock"></v-text-field>
          <p>
            By clicking Approve, you acknowledge that nunquam perdere assimilatio lorem ipsum set amet dolor.
          </p>
        </v-form>
      </v-card-text>

      <v-divider></v-divider>

      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn
          color="primary"
          @click="dialog = false"
          text
        >
          Cancel
        </v-btn>
        <v-btn
          color="primary"
          @click="dialog = false"
          elevation="0"
        >
          Submit
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  data: () => ({
    dialog: false,
    model: {
      remarks: null
    }
  })
}
</script>
