<template>
  <div>
    <c-simple-app-bar
      title="Update PIN"
      link="/profile"
    >
    </c-simple-app-bar>
    <v-row
      justify="center"
      align="center"
      dense
    >
      <v-col cols="12" md="6" lg="4" xl="3">
        <v-form v-model="isFormValid" ref="updatePinForm" @submit.prevent="onSubmit">
          <v-card outlined class="py-2 px-3">
            <v-card-title>
              Change PIN
            </v-card-title>
            <v-card-subtitle>
              Enter you current and new PIN below.
            </v-card-subtitle>
            <v-card-text>
              <v-row>
                <v-col cols="12">
                  <v-text-field
                    v-model="model.old_pin"
                    label="Old PIN"
                    class="pin"
                    type="password"
                    dense
                    outlined
                    :rules="pinRules"
                  />
                </v-col>
                <v-col cols="12">
                  <v-text-field
                    v-model="model.new_pin"
                    label="New PIN"
                    class="pin"
                    type="password"
                    dense
                    outlined
                    :rules="pinRules"
                  />
                </v-col>
                <v-col cols="12">
                  <v-text-field
                    v-model="model.new_pin_confirmation"
                    label="Confirm New PIN"
                    class="pin"
                    type="password"
                    dense
                    outlined
                    :rules="pinRules"
                  />
                </v-col>
              </v-row>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                text
                color="primary"
                @click="dialog = false"
              >
                Cancel
              </v-btn>
              <v-btn
                elevation="0"
                type="submit"
                color="primary"
                :disabled="!isFormValid"
              >
                Save
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-form>
      </v-col>

    </v-row>

  </div>
</template>

<script>
import CSimpleAppBar from "../../components/CSimpleAppBar";

export default {
  name: 'UpdatePINPage',
  components: {CSimpleAppBar},
  layout: 'home',
  data: () => ({
    dialog: false,
    isFormValid: false,
    isLoading: false,
    model: {
      old_pin: '',
      new_pin: '',
      new_pin_confirmation: '',
    },
    pinRules: [
      v => !!v || 'This field is required',
      v => /^\d+$/.test(v) || 'This field only accept numbers',
      v => (v && v.length === 4) || 'The PIN must be exactly 4 digits.',
    ],
  }),

  methods: {
    onSubmit() {
      const isInvalid = !this.$refs.updatePinForm.validate()
      if (isInvalid) {
        return
      }

      this.isLoading = true

      this.$axios.post('/api/profile', this.model)
        .then((res) => {
          console.log('Response:')
          console.log(res)
        })
        .catch((err) => {
          console.log('Error:')
          console.log(err)
        })
        .finally(() => {
          this.isLoading = false
        })
    }
  }
}
</script>
