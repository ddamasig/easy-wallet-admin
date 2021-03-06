<template>
  <v-card
    flat
    rounded
    class="pa-3"
  >
    <v-card-title>Referral Settings</v-card-title>
    <v-card-subtitle>
      Any changes made will not affect referral links generated prior to the update.
    </v-card-subtitle>
    <v-card-text>
      <v-row dense class="mb-0 pb-0">
        <v-col cols="12" class="mb-0 pb-0">
          <p class="mb-0 pb-0">Generated referral links will expire after a certain amount of time.</p>
        </v-col>
        <v-col cols="12" sm="4" class="mb-0 pb-0">
          <v-text-field
            label="Validity Duration"
            type="number"
            prepend-icon="mdi-timer-sand-complete"
            v-model="model.expiration"
          ></v-text-field>
        </v-col>
      </v-row>

      <v-row dense>
        <v-col cols="12">
          <p class="my-0 py-0">Require the following attachments during registration.</p>
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
                  <v-list-item-content>
                    <v-list-item-title>{{ req.name }}</v-list-item-title>
                    <v-list-item-subtitle>{{ req.file_type }}</v-list-item-subtitle>
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
    model: {
      expiration: 48,
      requirements: [
        {
          name: 'Selfie Photo',
          description: 'Please upload a selfie. Make sure to take the photo in a well lit area.',
          file_type: 'Image',
        },
        {
          name: 'ID Picture',
          description: 'Please upload a primary ID with your face on it. (e.g. Driver\'s License, Passport, SSS UMID, etc.)',
          file_type: 'Document/Image',
        },
        {
          name: 'Proof of Payment',
          description: 'Please upload an image or document such as a GCASH receipt which will serve as a proof of payment.',
          file_type: 'Document/Image',
        }
      ]
    },
  }),
  methods: {
    toggleNewRequirementModal() {
      this.requirementModal = !this.requirementModal
    }
  }
}
</script>
