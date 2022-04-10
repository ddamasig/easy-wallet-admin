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
        <c-bills-payment-list
          :items="items"
          @select-item="handleSelectItemEvent"
        ></c-bills-payment-list>
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
          <v-icon @click="selectedItem = null">
            mdi-arrow-left
          </v-icon>
        </v-toolbar>
        <c-bills-payment-details
          :selectedItem="selectedItem"
        ></c-bills-payment-details>
      </v-col>
    </v-row>

  </div>
</template>

<script>
import CBillsPaymentDetails from "@/components/ServiceMonitoring/BillsPayment/CBillsPaymentDetails";
import CBillsPaymentList from "@/components/ServiceMonitoring/BillsPayment/CBillsPaymentList";

export default {
  name: 'ServiceMonitoringELoading',
  components: {CBillsPaymentDetails, CBillsPaymentList},
  layout: 'home',
  data: () => ({
    showList: true,
    selectedItem: null,
    items: [
      {
        provider: 'PLDT HOME',
        amount: 'PHP 2,900',
        account_name: 'Juan Dela Cruz Account',
        account_number: '8729911231',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        id: 'PL9288UYX21'
      },
      {
        provider: 'GLOBE',
        amount: 'PHP 2,900',
        account_name: 'Juan Dela Cruz Account',
        account_number: '8729911231',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        id: 'PL9288UYX21'
      },
      {
        provider: 'CASURECO II',
        amount: 'PHP 1,200',
        account_name: 'Juan Dela Cruz Account',
        account_number: '8729911231',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        id: 'PL9288UYX21'
      },
      {
        provider: 'Sky Cable',
        amount: 'PHP 2,900',
        account_name: 'Juan Dela Cruz Account',
        account_number: '8729911231',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        id: 'PL9288UYX21'
      },
      {
        provider: 'Sky Cable',
        amount: 'PHP 1,599',
        account_name: 'Juan Dela Cruz Account',
        account_number: '8729911231',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        id: 'PL9288UYX21'
      },
    ]
  }),
  computed: {
    listClass() {
      if (!this.selectedItem) {
        return 'd-block'
      }
      return 'd-none d-sm-block'
    },
    detailsClass() {
      if (this.selectedItem) {
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
