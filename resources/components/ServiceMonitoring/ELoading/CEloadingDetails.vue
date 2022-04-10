<template>
  <v-card
    class="pa-4"
    flat
    rounded
  >
    <v-card-title>
      E-Loading Details
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
          <td class="font-weight-medium">Customer Name</td>
          <td>{{ selectedItem.customer_name }}</td>
        </tr>
        <tr>
          <td class="font-weight-medium">Network</td>
          <td>{{ selectedItem.network }}</td>
        </tr>
        <tr>
          <td class="font-weight-medium">Number</td>
          <td>{{ selectedItem.number }}</td>
        </tr>
        <tr>
          <td class="font-weight-medium">Promo</td>
          <td>{{ selectedItem.promo }}</td>
        </tr>
        <tr>
          <td class="font-weight-medium">Amount Deducted to Wallet</td>
          <td>{{ selectedItem.amount_deducted_from_wallet }}</td>
        </tr>
        <tr>
          <td class="font-weight-medium">Date</td>
          <td>{{ selectedItem.date }}</td>
        </tr>
        <tr>
          <td class="font-weight-medium">Status</td>
          <td class="font-weight-medium success--text">{{ selectedItem.status }}</td>
        </tr>
        </tbody>
      </v-simple-table>

      <p v-else class="text-center py-12">
        <v-icon>mdi-cursor-default-click-outline</v-icon>
        Select an item from the left panel first.
      </p>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  props: {
    selectedItem: Object
  },
  data: () => ({}),
  methods: {
    getStatusColor(item) {
      const firstString = item.status.charAt(0)
      switch (firstString) {
        case 'Failed':
          return 'error lighten-5 error--text'
        case 'Success':
          return 'success lighten-5 success--text'
      }
    }
  }
}
</script>
