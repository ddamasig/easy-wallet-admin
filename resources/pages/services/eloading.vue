<template>
  <div class="top">
    <c-app-bar></c-app-bar>
    <v-row
      justify="start"
      align="center"
      dense
    >
      <v-col>
        <c-e-loading-list @select-item="handleSelectItemEvent"/>
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
            <c-eloading-details :selectedItem="selectedItem"/>
          </v-card-text>
        </v-card>
      </v-navigation-drawer>
    </v-row>

  </div>
</template>

<script>
import CELoadingList from "@/components/ServiceMonitoring/ELoading/CELoadingList";
import CEloadingDetails from "@/components/ServiceMonitoring/ELoading/CEloadingDetails";

export default {
  name: 'ServiceMonitoringELoading',
  components: {CEloadingDetails, CELoadingList},
  layout: 'home',
  data: () => ({
    showDetails: false,
    selectedItem: null,
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
  }
}
</script>
