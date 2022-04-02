<template>
  <div>
    <v-app-bar
      flat
      color="transparent"
      class="mb-3"
    >
    </v-app-bar>
    <v-card
      class="pa-4 text-center"
      flat
    >
      <v-avatar color="orange">
        <v-icon color="white">mdi-dots-horizontal</v-icon>
      </v-avatar>
      <v-card-title class="text-center">
       <span class="text-center font-weight-bold flex-fill">
         Cash-In Request Pending
       </span>
      </v-card-title>
      <v-card-subtitle>
        Your request has been submitted to the admin. We will notify you as soon as your request gets approved.
      </v-card-subtitle>
      <v-card-text>
        <v-simple-table>
          <tr>
            <td class="text-left">Transaction ID</td>
            <td class="text-right">500012381138</td>
          </tr>
          <tr>
            <td class="text-left">Transaction Type</td>
            <td class="text-right">Cash-In</td>
          </tr>
          <tr>
            <td class="text-left">Amount</td>
            <td class="text-right font-weight-bold orange--text">PHP 10,000</td>
          </tr>
          <tr>
            <td class="text-left">Remarks</td>
            <td class="text-right">Lorem ipsum set amet dolor elicit.</td>
          </tr>
        </v-simple-table>
      </v-card-text>
      <v-card-actions>
        <v-btn
          color="primary"
          block
          rounded
          elevation="0"
          to="/"
        >Continue</v-btn>
      </v-card-actions>
    </v-card>
  </div>

</template>

<script>
export default {
  layout: 'blank',
  name: 'IndexPage',
  data: () => ({
    numbers: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
    model: {
      pin: '',
    },
  }),
  watch: {
    model: {
      handler(val) {
        console.log(val.pin)
      },
      deep: true
    }
  },
  methods: {
    /**
     * Appends the number parameter to the PIN.
     * @param number
     */
    handleInput(number) {
      if (this.model.pin.length < 4) {
        this.model.pin += number
      }
    },
    /**
     * Returns a shaded or outlined circle icon depending on the index parameter.
     * @param index
     * @returns {string}
     */
    getIcon(index) {
      if (this.model.pin.length >= index) {
        return 'mdi-checkbox-blank-circle'
      }
      return 'mdi-checkbox-blank-circle-outline'
    }
  }
}
</script>

