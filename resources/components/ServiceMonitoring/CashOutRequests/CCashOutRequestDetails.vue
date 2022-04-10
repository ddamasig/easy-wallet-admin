<template>
  <v-card
    class="pa-4"
    flat
    rounded
  >
    <v-card-title>
      Cash-Out Request Details
    </v-card-title>
    <v-card-text>

      <v-row v-if="hasSelectedItem">
        <v-col cols="12">
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
              <td class="font-weight-medium">Amount</td>
              <td>{{ selectedItem.amount }}</td>
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
        </v-col>
<!--        <v-col cols="12">-->
<!--          <span class="font-weight-black">-->
<!--            Attachments-->
<!--          </span>-->
<!--        </v-col>-->
        <!--        <v-col cols="4" v-for="(image,index) in selectedItem.images" :key="index">-->
        <!--          <v-card @click="selectImage(image)">-->
        <!--            <v-img :src="image" eager></v-img>-->
        <!--          </v-card>-->
        <!--        </v-col>-->
      </v-row>
      <p v-else class="text-center py-12">
        Select an item from the left panel first.
      </p>
    </v-card-text>
    <v-card-actions v-if="hasSelectedItem">
      <v-row dense>
        <v-col cols="12">
          <c-cash-out-approval-modal></c-cash-out-approval-modal>
        </v-col>
        <v-col cols="12">
          <c-cash-out-disapproval-modal></c-cash-out-disapproval-modal>
        </v-col>
      </v-row>
    </v-card-actions>
  </v-card>
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
