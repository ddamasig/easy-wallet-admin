<template>
  <v-navigation-drawer v-model="show" right permanent floating width="400">
    <v-card flat rounded>
      <v-card-title>
        <v-toolbar flat>
          <v-toolbar-title>Details</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-btn icon @click="close">
            <v-icon>
              mdi-close
            </v-icon>
          </v-btn>
        </v-toolbar>
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
      </v-card-text>
    </v-card>
  </v-navigation-drawer>

</template>

<script>
export default {
  props: {
    selectedItem: Object
  },
  data: () => ({
    show: false
  }),
  watch: {
    selectedItem(val) {
      if (val) {
        this.show = true
      }
    }
  },
  methods: {
    close() {
      this.show = false
      this.$emit('close-drawer')
    },
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
