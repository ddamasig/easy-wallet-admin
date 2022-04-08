<template>
  <v-card
    class="pa-4"
    flat
    rounded
  >
    <v-card-title>
      Cash-In Request Details
    </v-card-title>
    <v-card-text>
      <v-simple-table v-if="selectedItem">
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
        Deposit Funds
      </v-btn>
    </v-card-actions>
    <v-card-actions>
      <v-dialog
        v-model="dialog"
        width="500"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-btn
            color="primary"
            v-bind="attrs"
            v-on="on"
            outlined
            block
          >
            Reject
          </v-btn>
        </template>

        <v-card>
          <v-card-title>
            Reject Cash-in Request
          </v-card-title>

          <v-card-text>
            <v-form>
              <v-textarea
                v-model="model.reason"
                label="Please explain the reason"
                auto-grow
              >
              </v-textarea>
            </v-form>
          </v-card-text>

          <v-divider></v-divider>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
              color="primary"
              @click="dialog = false"
              text
            >
              Cancel
            </v-btn>
            <v-btn
              color="primary"
              @click="dialog = false"
              elevation="0"
            >
              Submit
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  props: {
    selectedItem: Object
  },
  data: () => ({
    model: {
      reason: ''
    },
    dialog: true
  }),
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
