<template>
  <v-menu
    bottom
    origin="center center"
    offset-y
    transition="slide-y-transition"
    class="pa-0"
  >
    <template v-slot:activator="{ on, attrs }">
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
          <v-list-item-title>John Jackson Betito</v-list-item-title>
          <v-list-item-subtitle>ID#1020304050</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
      <v-list-item to="/profile">
        <v-list-icon>
          <v-icon class="mr-1" small>mdi-account-cog</v-icon>
        </v-list-icon>
        <v-list-item-content>
          <v-list-item-title>My Profile</v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list-item @click="logout">
        <v-list-icon>
          <v-icon color="red" class="mr-1" small>mdi-logout</v-icon>
        </v-list-icon>
        <v-list-item-content>
          <v-list-item-title class="red--text">Logout</v-list-item-title>
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
  methods: {
    logout() {
      console.log('Logging out...')
    }
  }
}
</script>
