<template>
  <div>
    <v-simple-table>
      <tbody>
      <tr>
        <td class="font-weight-medium">Referral ID</td>
        <td>{{ selectedItem.id }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Member</td>
        <td>{{ selectedItem.member }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Old Email</td>
        <td>{{ selectedItem.old_email }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">New Email</td>
        <td>{{ selectedItem.new_email }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Date</td>
        <td>{{ selectedItem.date }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Status</td>
        <td :class="getStatusColor()">{{ selectedItem.status }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Reason</td>
        <td :class="getStatusColor()">{{ selectedItem.reason }}</td>
      </tr>

<!--      <tr>-->
<!--        <td class="font-weight-medium">Approved/Disapproved At</td>-->
<!--        <td>N/A</td>-->
<!--      </tr>-->
<!--      <tr>-->
<!--        <td class="font-weight-medium">Approved/Disapproved By</td>-->
<!--        <td>N/A</td>-->
<!--      </tr>-->
      </tbody>
    </v-simple-table>
    <v-row dense class="mt-5">
      <v-col cols="12">
        <c-email-reset-approval-modal></c-email-reset-approval-modal>
      </v-col>
      <v-col cols="12">
        <c-email-reset-disapproval-modal></c-email-reset-disapproval-modal>
      </v-col>
    </v-row>
  </div>

</template>

<script>
import CEmailResetApprovalModal from "@/components/Settings/EmailReset/CEmailResetApprovalModal";
import CEmailResetDisapprovalModal from "@/components/Settings/EmailReset/CEmailResetDisapprovalModal";

export default {
  components: {CEmailResetApprovalModal, CEmailResetDisapprovalModal},
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
