<template>
  <div class="mb-12">
    <c-app-bar></c-app-bar>
    <v-row
      justify="center"
      align="center"
      class="pb-6"
      dense
    >
      <v-col
        cols="12"
        sm="9"
      >

        <h3>Staff Management</h3>
        <small>
          Here are the list of existing staff.
          Click on the staff's name to view more details and access actions.
        </small>
        <v-card
          flat
          class="pa-3 mt-4"
        >
          <v-card-title>
            <v-row>
              <v-col
                cols="12"
                sm="4"
              >
                <v-btn
                  color="primary"
                  elevation="0"
                  class="mr-2"
                  to="/staff/create"
                >
                  New
                </v-btn>
                <v-btn
                  color="primary"
                  outlined
                  elevation="0"
                >
                  Print
                </v-btn>
              </v-col>
              <v-spacer></v-spacer>
              <v-col
                cols="12"
                sm="3"
              >
                <v-text-field
                  v-model="search"
                  append-icon="mdi-magnify"
                  label="Search"
                  dense
                ></v-text-field>
              </v-col>
            </v-row>


          </v-card-title>
          <v-data-table
            :headers="headers"
            :items="users"
            :search="search"
          >
            <template v-slot:[`item.name`]="{ item }">
              <span
                 class="primary--text font-weight-medium"
                 @click="viewUserPofile(item)"
              >
                {{ item.name }}
              </span>
            </template>
          </v-data-table>
        </v-card>
      </v-col>

    </v-row>
  </div>
</template>

<script>
export default {
  name: 'StaffIndex',
  layout: 'home',
  data() {
    return {
      search: '',
      headers: [
        {
          text: 'Name',
          align: 'start',
          filterable: false,
          value: 'name',
        },
        {text: 'Email', value: 'email'},
        {text: 'Last Activity', value: 'last_activity'},
        {text: 'Last Login', value: 'last_login'},
      ],
      users: [
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          last_activity: 'March 24, 2022',
          last_login: 'March 24, 2022',
        },
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          last_activity: 'March 24, 2022',
          last_login: 'March 24, 2022',
        },
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          last_activity: 'March 24, 2022',
          last_login: 'March 24, 2022',
        },
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          last_activity: 'March 24, 2022',
          last_login: 'March 24, 2022',
        },
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          last_activity: 'March 24, 2022',
          last_login: 'March 24, 2022',
        },
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          last_activity: 'March 24, 2022',
          last_login: 'March 24, 2022',
        },
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          last_activity: 'March 24, 2022',
          last_login: 'March 24, 2022',
        },
      ],
    }
  },

  methods: {
    viewUserPofile(user) {
      this.$router.push(`/members/${user.email}`)
    }
  }
}
</script>
