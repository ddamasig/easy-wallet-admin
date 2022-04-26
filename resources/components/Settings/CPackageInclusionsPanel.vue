<template>
  <v-card
    outlined
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
            v-for="(item,index) in package_inclusions"
          >
            <v-list-item
              :key="index"
              color="primary"
              :disabled="item.disabled"
            >
              <v-list-item-avatar>
<!--                <v-avatar>-->
<!--                  <v-img :src="item.photo"></v-img>-->
<!--                </v-avatar>-->
              </v-list-item-avatar>
              <v-list-item-content>
                <v-list-item-title>{{ item.name }}</v-list-item-title>
                <v-list-item-subtitle>{{ item.file_size_limit }}</v-list-item-subtitle>
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
              v-if="index < package_inclusions.length - 1"
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
    <c-new-product-inclusion-modal :show="showModal"></c-new-product-inclusion-modal>
  </v-card>
</template>

<script>
import CNewProductInclusionModal from "@/components/Settings/CNewProductInclusionModal";

export default {
  components: {CNewProductInclusionModal},
  data: () => ({
    showModal: false,
    package_inclusions: []
  }),
  fetch () {
    this.getReferralSettings()
  },
  methods: {
    /**
     * Gets the package inclusion objects from the database and set it as package_inclusions.
     *
     * @return void
     */
    async getReferralSettings() {
      await this.$axios.get('/api/referral/package-inclusions')
        .then((res) => {
          this.package_inclusions = res.data?.package_inclusions
        })
        .catch((err) => {
          this.$notifier.showMessage({
            content: err.response?.data?.message,
            color: 'error'
          })
        })
    },
    toggleModal() {
      this.showModal = !this.showModal
    }
  }
}
</script>
