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
        md="4"
        :class="listClass"
      >
        <c-email-reset-list
          :items="items"
          @select-item="handleSelectItemEvent"
        ></c-email-reset-list>
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
        <c-email-reset-details
          :selectedItem="selectedItem"
          @select-image="handleSelectImageEvent"
        ></c-email-reset-details>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import CEmailResetList from "@/components/Settings/EmailReset/CEmailResetList";
import CEmailResetDetails from "@/components/Settings/EmailReset/CEmailResetDetails";

export default {
  name: 'EmailResetRequestsPage',
  components: {CEmailResetList, CEmailResetDetails},
  layout: 'home',
  data: () => ({
    showList: true,
    selectedImage: '',
    selectedItem: {},
    items: [
      {
        member: 'Harris Quedado',
        old_email: 'harris@example.net',
        new_email: 'hoquedado@revlv.net',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        id: 'MT9123JK22'
      },
      {
        member: 'Karl Limlengco',
        old_email: 'karl@example.net',
        new_email: 'klimlengco@revlv.net',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        id: 'MT9123JK22'
      },
      {
        member: 'Ryan Labrador',
        old_email: 'ryan@example.net',
        new_email: 'rvl@revlv.net',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        id: 'MT9123JK22'
      },
      {
        member: 'Ardee Poblete',
        old_email: 'ardee@example.net',
        new_email: 'apoblete@revlv.net',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        id: 'MT9123JK22'
      },
      {
        member: 'Dean Simon Damasig',
        old_email: 'dean@example.net',
        new_email: 'ddamasig@revlv.net',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        id: 'MT9123JK22'
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
