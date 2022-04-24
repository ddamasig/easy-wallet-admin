<template>
  <v-card
    outlined
    rounded
    class="pa-3"
  >
    <v-card-title>Service Inclusions</v-card-title>
    <v-card-subtitle>
      These are the services that the members will have access to.
    </v-card-subtitle>
    <v-card-text>
      <v-row dense>
        <v-col cols="12">
          <template
            v-for="(item,index) in services"
          >
            <v-list-item
              :key="index"
              color="primary"
              :disabled="item.disabled"
            >
              <v-list-item-avatar>
                <v-avatar>
                  <v-icon>{{ item.icon }}</v-icon>
                </v-avatar>
              </v-list-item-avatar>
              <v-list-item-content>
                <v-list-item-title>{{ item.name }}</v-list-item-title>
                <v-list-item-subtitle>{{ item.description }}</v-list-item-subtitle>
              </v-list-item-content>
              <v-list-item-action>
                <v-switch :v-model="item.value"></v-switch>
              </v-list-item-action>
            </v-list-item>

            <v-divider
              v-if="index < services.length - 1"
              :key="`${index}-divider`"
            ></v-divider>

          </template>
        </v-col>
      </v-row>
    </v-card-text>
    <c-new-product-inclusion-modal :show="modal"></c-new-product-inclusion-modal>
  </v-card>
</template>

<script>
import CNewProductInclusionModal from "@/components/Settings/CNewProductInclusionModal";

export default {
  components: {CNewProductInclusionModal},
  data: () => ({
    modal: false,
    services: [
      {
        name: 'Money Transfer',
        description: 'Pius mensa cito captiss fraticinida est.',
        icon: 'mdi-credit-card-fast',
        value: true
      },
      {
        name: 'E-Loading',
        description: 'Pius mensa cito captiss fraticinida est.',
        icon: 'mdi-cellphone-text',
        value: true
      },
      {name: 'Ticketing', description: 'Pius mensa cito captiss fraticinida est.', icon: 'mdi-receipt', value: true},
      {
        name: 'Bills Payment',
        description: 'Pius mensa cito captiss fraticinida est.',
        icon: 'mdi-airplane',
        value: true
      },
    ],
  }),
  methods: {
    toggleModal() {
      this.modal = !this.modal
    }
  }
}
</script>
