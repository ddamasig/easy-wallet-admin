<template>
  <div>
    <c-app-bar></c-app-bar>
    <v-row
      justify="center"
      align="start"
      class="px-3 pb-12"
      dense
    >
      <v-col
        cols="12"
        sm="5"
        md="3"
        :class="listClass"
      >
        <c-e-loading-list
          :items="items"
          @select-item="handleSelectItemEvent"
        ></c-e-loading-list>
      </v-col>

      <v-col
        sm="6"
        md="4"
        :class="detailsClass"
      >
        <v-toolbar
          flat
          class="pa-3 mb-0 d-block d-sm-none"
        >
          <v-icon>
            mdi-arrow-left
          </v-icon>
        </v-toolbar>
        <c-e-loading-details
          :selectedItem="selectedItem"
        ></c-e-loading-details>
      </v-col>
    </v-row>

  </div>
</template>

<script>
import CELoadingList from "@/components/ServiceMonitoring/ELoading/CELoadingList";
import CELoadingDetails from "@/components/ServiceMonitoring/ELoading/CEloadingDetails";

export default {
  name: 'ServiceMonitoringELoading',
  components: {CELoadingList, CELoadingDetails},
  layout: 'home',
  data: () => ({
    selectedItem: {},
    items: [
      {
        network: 'Globe',
        number: '+6391231231234',
        promo: 'GoSurf50',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: 'March 30, 2022',
        status: 'Success',
        id: 'PL9288UYX21'
      },
      {
        network: 'TNT',
        number: '+6391231231234',
        promo: 'UnliText100',
        amount_deducted_from_wallet: 'PHP 103',
        member: 'Juan Dela Cruz',
        date: 'March 28, 2022',
        status: 'Success',
        id: 'G23HHJ9982'
      },
      {
        network: 'Globe',
        number: '+6391231231234',
        promo: 'GoExtra99',
        amount_deducted_from_wallet: 'PHP 100',
        member: 'Juan Dela Cruz',
        date: 'March 28, 2022',
        status: 'Success',
        id: 'PL9288UYX21'
      },
      {
        network: 'Globe',
        number: '+6391231231238',
        promo: 'GoSurf50',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: 'March 30, 2022',
        status: 'Success',
        id: 'PL9288UYX21'
      },
      {
        network: 'Globe',
        number: '+6391231231239',
        promo: 'GoSurf50',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: 'March 30, 2022',
        status: 'Success',
        id: 'PL9288UYX21'
      },
    ]
  }),
  computed: {
    listClass() {
      if (this.selectedItem) {
        return 'd-block'
      }
      return 'd-none d-sm-block'
    },
    detailsClass() {
      if (!this.selectedItem) {
        return 'd-block'
      }
      return 'd-none d-sm-block'
    },
  },
  methods: {
    handleSelectItemEvent(item) {
      console.log('Received select-item event')
      this.selectedItem = item
    }
  }
}
</script>
