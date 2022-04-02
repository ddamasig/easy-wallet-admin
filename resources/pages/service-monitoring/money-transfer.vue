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
        <c-money-transfer-list
          :items="items"
          @select-item="handleSelectItemEvent"
        ></c-money-transfer-list>
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
        <c-money-transfer-details
          :selectedItem="selectedItem"
        ></c-money-transfer-details>
      </v-col>
    </v-row>

  </div>
</template>

<script>
import CMoneyTransferDetails from "@/components/ServiceMonitoring/MoneyTransfer/CMoneyTransferDetails";
import CMoneyTransferList from "@/components/ServiceMonitoring/MoneyTransfer/CMoneyTransferList";

export default {
  name: 'ServiceMonitoringELoading',
  components: {CMoneyTransferDetails, CMoneyTransferList},
  layout: 'home',
  data: () => ({
    showList: true,
    selectedItem: {},
    items: [
      {
        member: 'Juan Dela Cruz',
        recipient_name: 'John Doe',
        recipient_number: '+6391231231234',
        amount: 'PHP 5,000',
        date: 'March 30, 2022',
        status: 'Success',
        id: 'MT9123JK22'
      },
      {
        member: 'Juan Dela Cruz',
        recipient_name: 'LeBron James',
        recipient_number: '+6391231231234',
        amount: 'PHP 10,000',
        date: 'March 30, 2022',
        status: 'Success',
        id: 'MT9123JK22'
      },
      {
        member: 'Juan Dela Cruz',
        recipient_name: 'Yao Ming',
        recipient_number: '+6391231231234',
        amount: 'PHP 2,500',
        date: 'March 30, 2022',
        status: 'Success',
        id: 'MT9123JK22'
      },
      {
        member: 'Juan Dela Cruz',
        recipient_name: 'Lorem Ipsum',
        recipient_number: '+6391231231234',
        amount: 'PHP 1,250',
        date: 'March 30, 2022',
        status: 'Success',
        id: 'MT9123JK22'
      },
      {
        member: 'Juan Dela Cruz',
        recipient_name: 'Kemba Walker',
        recipient_number: '+6391231231234',
        amount: 'PHP 2,000',
        date: 'March 30, 2022',
        status: 'Success',
        id: 'MT9123JK22'
      },
      {
        member: 'Juan Dela Cruz',
        recipient_name: 'Gordon Hayward',
        recipient_number: '+6391231231234',
        amount: 'PHP 3,299',
        date: 'March 30, 2022',
        status: 'Success',
        id: 'MT9123JK22'
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
