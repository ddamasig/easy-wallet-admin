<template>
  <div>
    <c-app-bar></c-app-bar>
    <v-row
      justify="start"
      align="center"
      dense
    >
      <v-col>
        <c-money-transfer-list @select-item="handleSelectItemEvent"></c-money-transfer-list>
      </v-col>

      <c-money-transfer-details
        :selectedItem="selectedItem"
        @close-drawer="handleCloseDrawerEvent"
      ></c-money-transfer-details>
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
    selectedItem: null,
  }),
  methods: {
    handleSelectItemEvent(item) {
      this.selectedItem = item
    },
    handleCloseDrawerEvent() {
      console.log('close drawer')
      this.selectedItem = null
    }
  }
}
</script>
