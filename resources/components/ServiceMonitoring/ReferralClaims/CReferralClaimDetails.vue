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
      <v-simple-table v-if="selectedItem">
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
        </tbody>
      </v-simple-table>

      <p v-else class="text-center py-12">
        Select an item from the left panel first.
      </p>

      <v-row class="pt-12">
        <v-col cols="12">
          <span class="font-weight-black">
            Attachments
          </span>
        </v-col>
        <v-col cols="4" v-for="(image,index) in selectedItem.images" :key="index">
          <v-card @click="selectImage(image)">
            <v-img :src="image" eager></v-img>
          </v-card>
        </v-col>
      </v-row>
    </v-card-text>
    <v-card-actions>
      <v-btn
        color="primary"
        block
        elevation="0"
      >
        Confirm Membership & Send Commission
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  props: {
    selectedItem: Object
  },
  data: () => ({}),
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
