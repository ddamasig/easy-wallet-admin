<template>
  <v-card
    flat
    rounded
    class="pa-3"
  >
    <v-card-title>Package Inclusions</v-card-title>
    <v-card-subtitle>
      These are the products that will be shown during registration page.
    </v-card-subtitle>
    <v-card-text>
      <v-row dense>
        <v-col cols="12">
          <template
            v-for="(item,index) in model.products"
          >
            <v-list-item
              :key="index"
              color="primary"
              :disabled="item.disabled"
            >
              <v-list-item-avatar>
                <v-avatar>
                  <v-img :src="item.photo"></v-img>
                </v-avatar>
              </v-list-item-avatar>
              <v-list-item-content>
                <v-list-item-title>{{ item.name }}</v-list-item-title>
                <v-list-item-subtitle>{{ item.file_type }}</v-list-item-subtitle>
                <v-list-item-subtitle>{{ item.description }}</v-list-item-subtitle>
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
              v-if="index < model.products.length - 1"
              :key="`${index}-divider`"
            ></v-divider>

          </template>

          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>
                <v-btn
                  block
                  color="primary"
                  text
                  @click="toggleModal"
                >
                  Add New
                </v-btn>
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
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
    model: {
      products: [
        {
          name: 'Product 1',
          description: 'Ubi est festus hibrida. A falsis, rector domesticus ventus.',
          photo: 'https://placekitten.com/180/181',
        },
        {
          name: 'Product 2',
          description: 'Ubi est festus hibrida. A falsis, rector domesticus ventus.',
          photo: 'https://placekitten.com/180/182',
        },
        {
          name: 'Product 3',
          description: 'Ubi est festus hibrida. A falsis, rector domesticus ventus.',
          photo: 'https://placekitten.com/180/180',
        },
        {
          name: 'Disabled Product',
          description: 'Ubi est festus hibrida. A falsis, rector domesticus ventus.',
          photo: 'https://placekitten.com/180/185',
          disabled: true
        },
      ]
    },
  }),
  methods: {
    toggleModal() {
      this.modal = !this.modal
    }
  }
}
</script>
