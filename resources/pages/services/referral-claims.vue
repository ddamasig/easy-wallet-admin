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
        sm="6"
        md="5"
        :class="listClass"
      >
        <c-referral-claim-list
          :items="items"
          @select-item="handleSelectItemEvent"
        ></c-referral-claim-list>
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
          <v-icon @click="selectedItem = {}">
            mdi-arrow-left
          </v-icon>
        </v-toolbar>
        <c-referral-claim-details
          :selectedItem="selectedItem"
          @select-image="handleSelectImageEvent"
        ></c-referral-claim-details>
      </v-col>
    </v-row>
    <c-image-viewer
      :src="selectedImage"
      @close-image-viewer="handleCloseImageViewer"
    ></c-image-viewer>
  </div>
</template>

<script>
import CReferralClaimDetails from "@/components/ServiceMonitoring/ReferralClaims/CReferralClaimDetails";
import CReferralClaimList from "@/components/ServiceMonitoring/ReferralClaims/CReferralClaimList";
import CImageViewer from "@/components/General/CImageViewer";

export default {
  name: 'ServiceMonitoringCashOutRequests',
  components: {CReferralClaimDetails, CReferralClaimList, CImageViewer},
  layout: 'home',
  data: () => ({
    showList: true,
    selectedImage: '',
    selectedItem: {},
    items: [
      {
        referred_by: 'Juan Dela Cruz',
        new_member_name: 'LeBron James',
        new_member_email: 'lebronjames@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 'MT9123JK22',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/361',
          'https://placekitten.com/640/362',
        ]
      },
      {
        referred_by: 'Juan Dela Cruz',
        new_member_name: 'Derek Rose',
        new_member_email: 'drose@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 'MT9123JK22',
        images: [
          'https://placekitten.com/640/360',
        ]
      },
      {
        referred_by: 'Juan Dela Cruz',
        new_member_name: 'George St. Pierre',
        new_member_email: 'gsp@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 'MT9123JK22',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/362',
        ]
      },
      {
        referred_by: 'Juan Dela Cruz',
        new_member_name: 'Israel Adesanya',
        new_member_email: 'stylebender@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 'MT9123JK22',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/361',
          'https://placekitten.com/640/362',
        ]
      },
      {
        referred_by: 'Juan Dela Cruz',
        new_member_name: 'Henry Cejudo',
        new_member_email: 'triplec@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 'MT9123JK22',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/361',
          'https://placekitten.com/640/362',
        ]
      },
    ]
  }),
  computed: {
    listClass() {
      if (this.selectedItem.images === undefined) {
        return 'd-block'
      }
      return 'd-none d-sm-block'
    },
    detailsClass() {
      if (!this.selectedItem !== undefined) {
        return 'd-block'
      }
      return 'd-none d-sm-block'
    },
  },
  methods: {
    handleSelectImageEvent(image) {
      console.log('Received select-image event')
      this.selectedImage = image
    },
    handleSelectItemEvent(item) {
      console.log('Received select-item event')
      this.selectedItem = item
    },
    handleCloseImageViewer(item) {
      console.log('Received close-image-viewer event')
      this.selectedImage = ''
    },
  }
}
</script>
