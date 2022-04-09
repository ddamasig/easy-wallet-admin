<template>
  <v-navigation-drawer app fixed v-model="navigationDrawer" >
    <v-list-item color="primary">
      <v-list-item-content>
        <v-list-item-title class="text-h6 font-weight-black">
          <h3 class="primary--text">
            ID#00041234
          </h3>
        </v-list-item-title>
        <v-list-item-subtitle>
          Juan Dela Cruz
        </v-list-item-subtitle>
      </v-list-item-content>
      <v-list-item-avatar>
        <v-img src="/logos/ewallet.png"></v-img>
      </v-list-item-avatar>
    </v-list-item>

    <v-divider></v-divider>

    <v-list
      dense
      nav
    >
      <v-list-item
        v-for="item in items"
        :key="item.title"
        link
        :to="item.to"
        color="primary"
      >
        <v-list-item-icon>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>


    <v-divider class="mt-12"></v-divider>

    <p class="pa-3 pb-0 font-weight-medium">
      Service Monitoring
    </p>

    <v-list
      dense
      nav
    >
      <v-list-item
        v-for="item in services"
        :key="item.title"
        link
        :to="item.to"
        color="primary"
        :disabled="item.disabled"
      >
        <v-list-item-icon>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
export default {
  data() {
    return {
      navigationDrawer: true,
      items: [
        {title: 'Dashboard', icon: 'mdi-chart-box-plus-outline', to: '/'},
        {title: 'Members Management', icon: 'mdi-account-group', to: '/members'},
        {title: 'Top Performing Members', icon: 'mdi-trophy', to: '/top-performing-members'},
        {title: 'Staff Management', icon: 'mdi-family-tree', to: '/staff'},
        {title: 'Profile', icon: 'mdi-account', to: '/profile'},
        {title: 'Audit Logs', icon: 'mdi-history', to: '/audit-logs'},
        {title: 'Referral Settings', icon: 'mdi-tools', to: '/referral-settings'},
      ],
      services: [
        {title: 'Money Transfer', icon: 'mdi-credit-card-fast', to: '/service-monitoring/money-transfer'},
        {title: 'E-Loading', icon: 'mdi-cellphone-text', to: '/service-monitoring/eloading'},
        {title: 'Bills Payment', icon: 'mdi-receipt', to: '/service-monitoring/bills-payment'},
        {title: 'Cash-In Requests', icon: 'mdi-cash-plus', to: '/service-monitoring/cash-in-requests'},
        {title: 'Cash-Out Requests', icon: 'mdi-cash-minus', to: '/service-monitoring/cash-out-requests'},
        {title: 'Ticketing', icon: 'mdi-airplane', to: '/service-monitoring/ticketing', disabled: true},
        {title: 'Referral Claims', icon: 'mdi-gift-open-outline', to: '/service-monitoring/referral-claims'},
      ],
      right: null,
    }
  },
  methods: {
    handleToggleNavigationEventDrawer() {
      this.navigationDrawer = !this.navigationDrawer
    }
  },
  mounted() {
    this.$root.$on('toggle-navigation-drawer', this.handleToggleNavigationEventDrawer)
  }
}
</script>

