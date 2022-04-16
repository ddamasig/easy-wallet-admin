<template>
  <div>
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
        <td class="font-weight-medium">Transfer Method</td>
        <td>{{ selectedItem.method }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Recipient Number</td>
        <td class="text-mono">{{ selectedItem.recipient_number }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">Recipient Number</td>
        <td class="text-mono">{{ selectedItem.recipient_number }}</td>
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
        <td class="font-weight-medium">Status</td>
        <td class="font-weight-medium success--text">{{ selectedItem.status }}</td>
      </tr>
      </tbody>
    </v-simple-table>

    <p v-else class="text-center py-12">
      <v-icon>mdi-cursor-default-click-outline</v-icon>
      Select an item from the left panel first.
    </p>
  </div>

</template>

<script>
export default {
  props: {
    selectedItem: Object
  },
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
