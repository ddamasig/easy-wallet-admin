<template>
  <div class="mb-12">
    <c-app-bar></c-app-bar>
    <v-row
      justify="center"
      align="start"
      class="px-3 pb-6"
      dense
    >
      <v-col
        cols="12"
        sm="9"
        class="mb-4"
      >

        <h3>Dashboard</h3>
        <small>Here is a quick overview of important numbers.</small>
        <v-row class="mt-1">
          <v-col
            v-for="(card,index) in cards"
            :key="index"
            cols="12"
            sm="4"
          >
            <c-dashboard-card
              :color="card.color"
              :text-color="card.textColor"
              :value="card.value"
              :label="card.label"
              :icon="card.icon"
            ></c-dashboard-card>
          </v-col>
        </v-row>
        <v-row>

          <v-col cols="12">
            <h3>Sales Report</h3>
            <small>Here is an overview of your revenue based on markup.</small>
          </v-col>
          <v-col cols="12" sm="8">
            <c-statistics></c-statistics>
          </v-col>
          <v-col cols="12" sm="4">
            <c-pie-chart></c-pie-chart>
          </v-col>
        </v-row>
      </v-col>

      <v-col
        cols="12"
        sm="3"
      >
        <v-row>
          <v-col cols="12">
            <h3>Cash-Out Requests</h3>
            <small class="mb-3">
              Here are the latest withdrawal requests from members.
            </small>
          </v-col>
          <v-col cols="12">
            <c-dashboard-cash-out-request-table></c-dashboard-cash-out-request-table>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import CPieChart from "../components/CPieChart";
import CDashboardCard from "@/components/Dashboard/CDashboardCard";
import CDashboardCashOutRequestTable from "@/components/Dashboard/CDashboardCashOutRequestTable";

export default {
  name: 'DashboardIndex',
  components: {CPieChart, CDashboardCard, CDashboardCashOutRequestTable},
  layout: 'home',
  data: () => ({
    model: {
      alias: 'JD Loading Station',
      full_name: 'Juan R. Dela Cruz',
      first_name: 'Juan',
      middle_name: 'Reyes',
      last_name: 'Dela Cruz',
      birthdate: 'March 31, 1990',
      email: 'juandelacruz@gmail.com',
      mobile_number: '1231231234',
    },
    cards: [
      {
        color: 'primary',
        textColor: 'white--text',
        value: 'P 36,422',
        label: 'Sales',
        icon: 'mdi-sale',
      },
      {
        color: 'orange',
        textColor: 'white--text',
        value: 'P 75,500',
        label: 'Commission',
        icon: 'mdi-piggy-bank',
      },
      {
        color: 'success',
        textColor: 'white--text',
        value: 'P 55,000',
        label: 'Total Withdrawals',
        icon: 'mdi-cash-fast',
      },
    ]
  })
}
</script>
