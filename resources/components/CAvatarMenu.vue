<template>
  <v-menu
    bottom
    origin="center center"
    offset-y
    transition="slide-y-transition"
    class="pa-0"
  >
    <template #activator="{ on, attrs }">
      <v-btn
        icon
        v-bind="attrs"
        v-on="on"
      >
        <v-avatar size="32">
          <v-img src="https://i.pravatar.cc/128"></v-img>
        </v-avatar>
      </v-btn>
    </template>

    <v-list dense class="pa-0">
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title>{{ user.full_name }}</v-list-item-title>
          <v-list-item-subtitle>{{ user.mobile_number }}</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
      <v-list-item to="/profile">
        <v-list-item-content>
          <v-list-item-title>
            <v-icon class="mr-1" small>mdi-account-cog</v-icon>
            My Profile
          </v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list-item @click="logout">
        <v-list-item-content>
          <v-list-item-title class="red--text">
            <v-icon color="red" class="mr-1" small>mdi-logout</v-icon>
            Logout
          </v-list-item-title>
        </v-list-item-content>
      </v-list-item>


    </v-list>
  </v-menu>
</template>

<script>
export default {
  data: () => ({
    items: [
      {
        title: 'Fund Transfer Successful!',
        subtitle: 'Lorem ipsum set amet dolor elicit!',
        color: 'success--text',
      },
      {
        title: 'Bills Payment Successful!',
        subtitle: 'Lorem ipsum set amet dolor elicit!',
        color: 'success--text',
      },
      {
        title: 'Cash-In Request Rejected',
        subtitle: 'Lorem ipsum set amet dolor elicit!',
        color: 'error--text',
      },
      {
        title: 'Fund Transfer Complete!',
        subtitle: 'Lorem ipsum set amet dolor elicit!',
        color: 'success--text',
      },
    ]
  }),
  created() {
    this.user = this.$auth.user
  },
  methods: {
    logout() {
      this.$auth.logout()
      this.$router.push('/login')
    }
  }
}
</script>
