<template>
  <div class="top">
    <c-app-bar></c-app-bar>
    <v-row
      justify="start"
      align="center"
      dense
    >
      <v-col>
        <c-cash-out-request-list @select-item="handleSelectItemEvent"/>
      </v-col>

      <v-navigation-drawer
        v-if="showDetails"
        absolute
        right
        permanent
        width="400"
      >
        <v-divider></v-divider>
        <v-card flat>
          <v-card-title>
            <v-toolbar flat dense>
              <v-toolbar-title>Details</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-btn icon @click="handleCloseDrawerEvent">
                <v-icon>
                  mdi-close
                </v-icon>
              </v-btn>
            </v-toolbar>
          </v-card-title>
          <v-card-text>
            <c-cash-out-request-details :selectedItem="selectedItem" @select-image="handleSelectImageEvent"/>
          </v-card-text>
        </v-card>
      </v-navigation-drawer>
    </v-row>
    <c-image-viewer :src="selectedImage" @close-drawer="handleCloseDrawerEvent"/>
  </div>
</template>

<script>
import CCashOutRequestList from "@/components/ServiceMonitoring/CashOutRequests/CCashOutRequestList";
import CCashOutRequestDetails from "@/components/ServiceMonitoring/CashOutRequests/CCashOutRequestDetails";
import CImageViewer from "@/components/General/CImageViewer";

export default {
  name: 'ServiceMonitoringCashOut',
  components: {CCashOutRequestDetails, CCashOutRequestList, CImageViewer},
  layout: 'home',
  data: () => ({
    showDetails: false,
    selectedItem: null,
    selectedImage: null,
  }),
  methods: {
    handleSelectItemEvent(item) {
      this.selectedItem = item
      this.showDetails = true
      this.$vuetify.goTo(".top", {
        duration: 0
      })
    },
    handleCloseDrawerEvent() {
      this.$vuetify.goTo(`#item-${this.selectedItem.id}`, {
        duration: 0,
        offset: 200
      })
      this.selectedItem = null
      this.showDetails = false
    },
    handleSelectImageEvent(image) {
      this.selectedImage = image
    },
  }
}
</script>
