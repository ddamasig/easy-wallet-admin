<template>
  <div>
    <v-card outlined rounded class="pa-3">
      <v-card-title>Referral Settings</v-card-title>
      <v-card-subtitle>
        Any changes made will not affect referral links generated prior to the update.
      </v-card-subtitle>
      <v-card-text>
        <v-form ref="durationForm" v-model="isDurationFormValid" @submit.prevent="onSubmitDurationForm">
          <v-row class="align-center">
            <v-col cols="12" sm="1" class="d-none d-sm-block text-center">
              <v-icon>mdi-timer-sand-complete</v-icon>
            </v-col>
            <v-col cols="12" sm="7">
              <v-list-item-title>Referral Link Validity Duration</v-list-item-title>
              <v-list-item-subtitle>
                Generated referral links will expire after a certain amount of time.
              </v-list-item-subtitle>
            </v-col>
            <v-col cols="12" sm="4">
              <v-text-field
                v-model="model.duration"
                outlined
                dense
                type="number"
                hide-details
                class="my-auto"
                suffix="days"
              />
            </v-col>
          </v-row>

          <v-divider class="mb-2 mt-6"/>

          <v-row dense>
            <v-col cols="12" class="my-4">
              <span class="d-block black--text title">Service Inclusions</span>
              <span class="d-block subtitle">These are the services that the members can access.</span>
            </v-col>
            <v-col cols="12">
              <!-- Money Transfer Switch -->
              <v-list-item color="primary">
                <v-list-item-avatar>
                  <v-avatar>
                    <v-icon>mdi-credit-card-fast</v-icon>
                  </v-avatar>
                </v-list-item-avatar>
                <v-list-item-content>
                  <v-list-item-title>Money Transfer</v-list-item-title>
                  <v-list-item-subtitle>Allow members to transfer funds to other channels.</v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action>
                  <v-switch v-model="model.is_transfer_enabled"></v-switch>
                </v-list-item-action>
              </v-list-item>
              <!-- E-Loading Switch -->
              <v-list-item color="primary">
                <v-list-item-avatar>
                  <v-avatar>
                    <v-icon>mdi-cellphone-text</v-icon>
                  </v-avatar>
                </v-list-item-avatar>
                <v-list-item-content>
                  <v-list-item-title>E-Loading</v-list-item-title>
                  <v-list-item-subtitle>Allow members to buy load from networks such as Globe, Smart, and Sun.
                  </v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action>
                  <v-switch v-model="model.is_eloading_enabled"></v-switch>
                </v-list-item-action>
              </v-list-item>
              <!-- Ticketing Switch -->
              <v-list-item color="primary" disabled>
                <v-list-item-avatar>
                  <v-avatar>
                    <v-icon>mdi-airplane</v-icon>
                  </v-avatar>
                </v-list-item-avatar>
                <v-list-item-content>
                  <v-list-item-title>Ticketing</v-list-item-title>
                  <v-list-item-subtitle>Allow members to buy tickets from White Label.</v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action>
                  <v-switch v-model="model.is_ticketing_enabled"></v-switch>
                </v-list-item-action>
              </v-list-item>
              <!-- Bills Payment Switch -->
              <v-list-item color="primary">
                <v-list-item-avatar>
                  <v-avatar>
                    <v-icon>mdi-airplane</v-icon>
                  </v-avatar>
                </v-list-item-avatar>
                <v-list-item-content>
                  <v-list-item-title>Bills Payment</v-list-item-title>
                  <v-list-item-subtitle>Allow members to pay bills through ECPay.</v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action>
                  <v-switch v-model="model.is_bills_payment_enabled"></v-switch>
                </v-list-item-action>
              </v-list-item>
            </v-col>

            <v-col cols="12" class="text-right">
              <v-divider class="my-4"/>
              <v-dialog v-model="showModal" max-width="400">
                <template #activator="{on, attrs}">
                  <v-btn
                    color="primary"
                    elevation="0"
                    v-bind="attrs"
                    v-on="on"
                    v-text="'Apply'"
                  />
                </template>

                <v-card>
                  <v-card-title>Apply Changes</v-card-title>
                  <v-card-text>
                    You are about to update the referral settings. This change will affect all users and subsequent
                    referral invites generated in the system. Do you want to continue?
                  </v-card-text>
                  <v-card-actions>
                    <v-spacer/>
                    <v-btn
                      :disabled="isSubmitting"
                      text
                      @click="showModal = false"
                      v-text="'Cancel'"
                    />
                    <v-btn
                      :disabled="isSubmitting"
                      :loading="isSubmitting"
                      type="submit"
                      color="primary"
                      elevation="0"
                      @click="$refs.durationForm.$el.requestSubmit()"
                      v-text="'Apply'"
                    />
                  </v-card-actions>
                </v-card>
              </v-dialog>
            </v-col>
          </v-row>
        </v-form>
      </v-card-text>
    </v-card>
  </div>

</template>

<script>
export default {
  data: () => ({
    isDurationFormValid: false,
    showModal: false,
    isSubmitting: false,
    model: {
      duration: 0,
      is_transfer_enabled: false,
      is_eloading_enabled: false,
      is_ticketing_enabled: false,
      is_bills_payment_enabled: false,
    },
  }),
  async created() {
    await this.getReferralSettings()
  },
  methods: {
    /**
     * Gets the referral settings object from the database and set it as model.
     *
     * @return void
     */
    async getReferralSettings() {
      await this.$axios.get('/api/referral/settings')
        .then((res) => {
          this.model = res.data?.referral_setting
        })
        .catch((err) => {
          this.$notifier.showMessage({
            content: err.response?.data?.message,
            color: 'error'
          })
        })
    },

    /**
     * Validates the durationForm then first an HTTP request to update the
     * referral settings.
     *
     * @return void
     */
    async onSubmitDurationForm() {
      const isInvalid = !this.$refs.durationForm.validate()
      if (isInvalid) {
        return
      }

      this.isSubmitting = true

      await this.$axios.post('api/referral/settings', this.model)
        .then((response) => {
          this.$notifier.showMessage({
            content: response.data?.message,
            color: 'success'
          });
        })
        .catch((err) => {
          this.$notifier.showMessage({
            content: err.response.data?.message,
            color: 'error'
          });
        })

      this.isSubmitting = false
      this.showModal = false
    },
  }
}
</script>
