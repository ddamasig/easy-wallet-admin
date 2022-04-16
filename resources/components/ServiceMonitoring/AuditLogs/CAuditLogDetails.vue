<template>
  <div>
    <v-simple-table v-if="selectedItem">
      <tbody>
      <tr>
        <td class="font-weight-medium">Description</td>
        <td>{{ selectedItem.description }}</td>
      </tr>
      <tr>
        <td class="font-weight-medium">User</td>
        <td>{{ selectedItem.user }}</td>
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
        <!--        <td class="font-weight-medium">Additional Information</td>-->
        <td colspan="2">
          <span class="d-block font-weight-medium my-4">
            Additional Information
          </span>
          <pre><code>{{ selectedItem.additional_info }}</code></pre>
        </td>
      </tr>
      </tbody>
    </v-simple-table>
  </div>
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
