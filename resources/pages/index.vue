<template>
  <div class="pb-12">
    <c-app-bar></c-app-bar>
    <v-row justify="center" align="start">
      <v-col
        cols="12"
        sm="3"
        class="mt-6 mr-sm-8"
      >
        <v-row>
          <v-col cols="12">
            <!-- Points BAN -->
            <c-points-card></c-points-card>
          </v-col>
          <v-col
            cols="4"
            v-for="(feature,index) in features"
            :key="index"
          >
            <!-- Feature Buttons -->
            <c-feature-card :feature="feature"></c-feature-card>
          </v-col>
        </v-row>
      </v-col>

      <v-col cols="12" sm="3">
        <div class="mb-3">
          <h3>Transaction History</h3>
          <small>Showing top 10 most recent transactions</small>
        </div>
        <c-transaction-history></c-transaction-history>
      </v-col>
    </v-row>
  </div>

</template>

<script>
export default {
  layout: 'home',
  name: 'IndexPage',
  data: () => ({
    features: [
      {
        name: 'Transfer',
        icon: 'mdi-credit-card-fast',
        color: 'blue',
        to: '/transfer',
        disabled: false
      },
      {
        name: 'E-Load',
        icon: 'mdi-cellphone-text',
        color: 'orange',
        to: '/eloading/recipient',
        disabled: false
      },
      {
        name: 'Tickets',
        icon: 'mdi-airplane',
        color: 'teal',
        to: '/',
        disabled: true
      },
      {
        name: 'Referral',
        icon: 'mdi-gift-open-outline',
        color: 'purple',
        to: '/referral',
        disabled: false
      },
      {
        name: 'Pay Bills',
        icon: 'mdi-receipt',
        color: 'pink',
        to: '/pay-bills',
        disabled: false
      }
    ]
  })
}
</script>
