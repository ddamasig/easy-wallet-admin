<template>
  <v-card
    class="pa-4"
    flat
    rounded
  >
    <v-card-title>
      Audit Log Details
    </v-card-title>
    <v-card-text>
      <v-simple-table v-if="selectedItem">
        <tbody>
        <tr>
          <td class="font-weight-medium">Description</td>
          <td>{{ selectedItem.description }}</td>
        </tr>
        <tr>
          <td class="font-weight-medium">User</td>
          <td>{{ selectedItem.actor }}</td>
        </tr>
        <tr>
          <td class="font-weight-medium">Tags</td>
          <td>
            <v-chip
              v-for="(tag,index) in selectedItem.tags"
              :key="index"
              small
              class="mr-1"
              color="primary"
            >
              {{ tag }}
            </v-chip>
          </td>
        </tr>
        <tr>
          <td class="font-weight-medium">Date</td>
          <td>{{ selectedItem.date }}</td>
        </tr>
        <tr>
          <td class="font-weight-medium">Additional Information</td>
          <td>{{ selectedItem.additional_info }}</td>
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
