<template>
  <div>
    <v-simple-table>
      <tbody>
      <tr>
        <td class="font-weight-medium">Transaction Number</td>
        <td>{{ selectedItem.id }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Member</td>
        <td>{{ selectedItem.member }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Cash-out Method</td>
        <td>{{ selectedItem.method }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Number</td>
        <td class="text-mono">{{ selectedItem.number }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Amount</td>
        <td class="text-mono">{{ selectedItem.amount }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Date</td>
        <td>{{ selectedItem.date }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Remarks</td>
        <td>{{ selectedItem.remarks }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Status</td>
        <td :class="getStatusColor()">{{ selectedItem.status }}</td>
      </tr>
      </tbody>
    </v-simple-table>

    <v-row dense class="mt-5">
      <v-col cols="12">
        <c-cash-out-approval-modal></c-cash-out-approval-modal>
      </v-col>
      <v-col cols="12">
        <c-cash-out-disapproval-modal></c-cash-out-disapproval-modal>
      </v-col>
    </v-row>
  </div>

</template>

<script>
import CCashOutApprovalModal from "@/components/ServiceMonitoring/CashOutRequests/CCashOutApprovalModal";
import CCashOutDisapprovalModal from "@/components/ServiceMonitoring/CashOutRequests/CCashOutDisapprovalModal";

export default {
  components: {CCashOutApprovalModal, CCashOutDisapprovalModal},
  props: {
    selectedItem: Object
  },
  data: () => ({}),
  computed: {
    hasSelectedItem() {
      return Object.keys(this.selectedItem).length !== 0
    }
  },
  methods: {
    selectImage(image) {
      this.$emit('select-image', image)
    },
    getStatusColor() {
      switch (this.selectedItem.status) {
        case 'Success':
          return 'success--text'
        case 'Failed':
          return 'error--text'
        default:
          return 'warning--text'
      }
    }
  }
}
</script>
