<template>
  <v-card outlined rounded class="pa-3">
    <v-card-title>Referral Settings</v-card-title>
    <v-card-subtitle>
      Any changes made will not affect referral links generated prior to the update.
    </v-card-subtitle>
    <v-card-text>
      <v-form ref="durationForm" v-model="isDurationFormValid" @submit.prevent="onSubmitDurationForm">
        <v-row class="align-center">
          <v-col cols="12" sm="1" class="d-none d-sm-block">
            <v-icon>mdi-timer-sand-complete</v-icon>
          </v-col>
          <v-col cols="12" sm="9">
            <v-list-item-title>Referral Link Validity Duration</v-list-item-title>
            <v-list-item-subtitle>
              Generated referral links will expire after a certain amount of time.
            </v-list-item-subtitle>
          </v-col>
          <v-col cols="12" sm="2">
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
          <v-col cols="12" class="text-right">
            <v-btn type="reset" text v-text="'Reset'"/>
            <v-btn type="submit" color="primary" elevation="0" v-text="'Save'"/>
          </v-col>
        </v-row>

      </v-form>


      <v-divider class="my-6"></v-divider>

      <v-row dense>
        <v-col cols="12">
          <h2 class="font-weight-medium">Requirements</h2>
          <p class="my-0 py-0">Ask potential members to upload the following images during registration.</p>
        </v-col>
        <v-col cols="12">
          <v-list @click.prevent>
            <v-list-item-group>
              <template
                v-for="(req,index) in model.requirements"
              >
                <v-list-item
                  :key="index"
                  color="primary"
                >
                  <v-list-item-avatar>
                    <v-icon>{{ req.icon }}</v-icon>
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-title>{{ req.name }}</v-list-item-title>
                    <v-list-item-subtitle>{{ req.description }}</v-list-item-subtitle>
                  </v-list-item-content>
                  <v-list-item-action>
                    <v-menu offset-y>
                      <template v-slot:activator="{ on, attrs }">
                        <v-btn
                          color="primary"
                          dark
                          v-bind="attrs"
                          v-on="on"
                          icon
                        >
                          <v-icon>
                            mdi-dots-horizontal
                          </v-icon>
                        </v-btn>
                      </template>
                      <v-list>
                        <v-list-item>
                          <v-list-item-title>Edit</v-list-item-title>
                        </v-list-item>
                        <v-list-item>
                          <v-list-item-title>Disable</v-list-item-title>
                        </v-list-item>
                      </v-list>
                    </v-menu>
                  </v-list-item-action>
                </v-list-item>

                <v-divider
                  v-if="index < model.requirements.length - 1"
                  :key="`${index}-divider`"
                ></v-divider>

              </template>
            </v-list-item-group>

            <v-list-item>
              <v-list-item-content>
                <v-list-item-title>
                  <v-btn
                    block
                    color="primary"
                    text
                    @click="toggleNewRequirementModal"
                  >
                    Add New
                  </v-btn>
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-col>
      </v-row>
    </v-card-text>

    <c-new-requirement-modal :show="requirementModal"></c-new-requirement-modal>
  </v-card>
</template>

<script>
import CNewRequirementModal from "@/components/Settings/CNewRequirementModal";

export default {
  components: {CNewRequirementModal},
  data: () => ({
    requirementModal: false,
    isDurationFormValid: false,
    model: {
      duration: 0,
      requirements: [
        {
          name: 'Selfie Photo',
          description: 'Please upload a selfie. Make sure to take the photo in a well lit area.',
          icon: 'mdi-image',
        },
        {
          name: 'ID Picture',
          description: 'Please upload a primary ID with your face on it. (e.g. Driver\'s License, Passport, SSS UMID, etc.)',
          icon: 'mdi-image',
        },
        {
          name: 'Proof of Payment',
          description: 'Please upload an image or document such as a GCASH receipt which will serve as a proof of payment.',
          icon: 'mdi-image',
        }
      ]
    },
  }),
  async created() {
    await this.getReferralSettings()
  },
  methods: {
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

    async onSubmitDurationForm() {

    },
    toggleNewRequirementModal() {
      this.requirementModal = !this.requirementModal
    }
  }
}
</script>
