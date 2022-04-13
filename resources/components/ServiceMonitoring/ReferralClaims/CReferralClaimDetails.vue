<template>
  <v-card
    class="pa-4"
    flat
    rounded
  >
    <v-card-title>
      Referral Details
    </v-card-title>
    <v-card-text>
      <v-row v-if="hasSelectedItem">
        <v-col cols="12">
          <v-simple-table>
            <tbody>
            <tr>
              <td class="font-weight-medium">Referral ID</td>
              <td>{{ selectedItem.id }}</td>
            </tr>
            <tr>
              <td class="font-weight-medium">Referred By</td>
              <td>{{ selectedItem.referred_by }}</td>
            </tr>
            <tr>
              <td class="font-weight-medium">New Member Name</td>
              <td>{{ selectedItem.new_member_name }}</td>
            </tr>
            <tr>
              <td class="font-weight-medium">New Member Email</td>
              <td>{{ selectedItem.new_member_email }}</td>
            </tr>
            <tr>
              <td class="font-weight-medium">Date</td>
              <td>{{ selectedItem.date }}</td>
            </tr>
            <tr>
              <td class="font-weight-medium">Status</td>
              <td :class="getStatusColor()">{{ selectedItem.status }}</td>
            </tr>
<!--            <tr>-->
<!--              <td class="font-weight-medium">Commission Claimed</td>-->
<!--              <td class="error&#45;&#45;text">Not Yet</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--              <td class="font-weight-medium">Approved/Disapproved At</td>-->
<!--              <td>N/A</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--              <td class="font-weight-medium">Approved/Disapproved By</td>-->
<!--              <td>N/A</td>-->
<!--            </tr>-->
            </tbody>
          </v-simple-table>
        </v-col>
        <v-col cols="12" class="pt-6">
          <span class="font-weight-black">
            Images
          </span>
        </v-col>
        <v-col cols="4" v-for="(image,index) in selectedItem.images" :key="index">
          <v-card @click="selectImage(image)">
            <v-img :src="image" eager></v-img>
          </v-card>
        </v-col>
      </v-row>

      <p v-else class="text-center py-12">
        <v-icon>mdi-cursor-default-click-outline</v-icon>
        Select an item from the left panel first.
      </p>


    </v-card-text>
    <v-card-actions v-if="hasSelectedItem">
      <v-row dense>
        <v-col cols="12">
          <c-referral-claim-approval-modal></c-referral-claim-approval-modal>
        </v-col>
        <v-col cols="12">
          <c-referral-claim-disapproval-modal></c-referral-claim-disapproval-modal>
        </v-col>
      </v-row>
    </v-card-actions>
  </v-card>
</template>

<script>
import CReferralClaimApprovalModal from "@/components/ServiceMonitoring/ReferralClaims/CReferralClaimApprovalModal";
import CReferralClaimDisapprovalModal
  from "@/components/ServiceMonitoring/ReferralClaims/CReferralClaimDisapprovalModal";

export default {
  components: {CReferralClaimDisapprovalModal, CReferralClaimApprovalModal},
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
