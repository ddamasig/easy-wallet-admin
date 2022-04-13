<template>
  <v-navigation-drawer app fixed v-model="navigationDrawer">
    <p class="pa-3 pb-0 font-weight-medium">
      Analytics
    </p>
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


    <v-divider class="mt-8"></v-divider>

    <p class="pa-3 pb-0 font-weight-medium">
      Services
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

    <v-divider class="mt-8"></v-divider>

    <p class="pa-3 pb-0 font-weight-medium">
      Configuration
    </p>

    <v-list dense nav>
      <v-list-item
        v-for="item in configuration"
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
        {title: 'Top Performing Members', icon: 'mdi-trophy', to: '/top-performing-members'},
        {title: 'Members Management', icon: 'mdi-account-group', to: '/members'},
        {title: 'Staff Management', icon: 'mdi-family-tree', to: '/staff'},
      ],
      services: [
        {title: 'Money Transfer', icon: 'mdi-credit-card-fast', to: '/services/money-transfer'},
        {title: 'E-Loading', icon: 'mdi-cellphone-text', to: '/services/eloading'},
        {title: 'Bills Payment', icon: 'mdi-receipt', to: '/services/bills-payment'},
        {title: 'Cash-In Requests', icon: 'mdi-cash-plus', to: '/services/cash-in-requests'},
        {title: 'Cash-Out Requests', icon: 'mdi-cash-minus', to: '/services/cash-out-requests'},
        {title: 'Ticketing', icon: 'mdi-airplane', to: '/services/ticketing', disabled: true},
        {title: 'Referral Claims', icon: 'mdi-gift-open-outline', to: '/services/referral-claims'},
      ],
      configuration: [
        {title: 'Audit Logs', icon: 'mdi-history', to: '/audit-logs'},
        {title: 'Profile', icon: 'mdi-account', to: '/profile'},
        {title: 'Email Reset Requests', icon: 'mdi-email-sync', to: '/email-reset-requests'},
        {title: 'Referral Settings', icon: 'mdi-tools', to: '/referral-settings'},
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

