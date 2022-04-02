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
        <c-cash-in-request-list
          :items="items"
          @select-item="handleSelectItemEvent"
        ></c-cash-in-request-list>
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
        <c-cash-in-request-details
          :selectedItem="selectedItem"
          @select-image="handleSelectImageEvent"
        ></c-cash-in-request-details>
      </v-col>
    </v-row>
    <c-image-viewer
      :src="selectedImage"
      @close-image-viewer="handleCloseImageViewer"
    ></c-image-viewer>
  </div>
</template>

<script>
import CCashInRequestList from "@/components/ServiceMonitoring/CashInRequests/CCashInRequestList";
import CCashInRequestDetails from "@/components/ServiceMonitoring/CashInRequests/CCashInRequestDetails";
import CImageViewer from "@/components/General/CImageViewer";

export default {
  name: 'ServiceMonitoringCashInRequests',
  components: {CCashInRequestList, CCashInRequestDetails, CImageViewer},
  layout: 'home',
  data: () => ({
    showList: true,
    selectedImage: '',
    selectedItem: {},
    items: [
      {
        member: 'Juan Dela Cruz',
        remarks: 'Byssuss congregabo in ferox burdigala!',
        amount: 'PHP 5,000',
        date: 'March 30, 2022',
        status: 'Awaiting Funds',
        id: 'MT9123JK22',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/361',
          'https://placekitten.com/640/362',
        ]
      },
      {
        member: 'Juan Dela Cruz',
        remarks: 'Byssuss congregabo in ferox burdigala!',
        amount: 'PHP 2,500',
        date: 'March 30, 2022',
        status: 'Awaiting Funds',
        id: 'MT9123JK22',
        images: [
          'https://placekitten.com/640/310',
          'https://placekitten.com/640/342',
        ]
      },
      {
        member: 'Juan Dela Cruz',
        remarks: 'Byssuss congregabo in ferox burdigala!',
        amount: 'PHP 4,700',
        date: 'March 30, 2022',
        status: 'Awaiting Funds',
        id: 'MT9123JK22'
      },
      {
        member: 'Juan Dela Cruz',
        remarks: 'Byssuss congregabo in ferox burdigala!',
        amount: 'PHP 1,250',
        date: 'March 30, 2022',
        status: 'Awaiting Funds',
        id: 'MT9123JK22'
      },
      {
        member: 'Juan Dela Cruz',
        remarks: 'Byssuss congregabo in ferox burdigala!',
        amount: 'PHP 3,250',
        date: 'March 30, 2022',
        status: 'Awaiting Funds',
        id: 'MT9123JK22'
      },
      {
        member: 'John Doe',
        remarks: 'Byssuss congregabo in ferox burdigala!',
        amount: 'PHP 2,500',
        date: 'March 30, 2022',
        status: 'Awaiting Funds',
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
