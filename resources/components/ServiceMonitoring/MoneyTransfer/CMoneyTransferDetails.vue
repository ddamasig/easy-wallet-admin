<template>
  <v-card
    class="pa-4"
    flat
    rounded
  >
    <v-card-title>
      Money Transfer Details
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
          <td class="font-weight-medium">Recipient Name</td>
          <td>{{ selectedItem.recipient_name }}</td>
        </tr>
        <tr>
          <td class="font-weight-medium">Recipient Number</td>
          <td>{{ selectedItem.recipient_number }}</td>
        </tr>
        <tr>
          <td class="font-weight-medium">Amout</td>
          <td>{{ selectedItem.amount }}</td>
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
