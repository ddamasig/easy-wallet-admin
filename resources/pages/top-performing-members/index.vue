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

        <h3>Top Performing Members</h3>
        <small>
          Here are the list of members with the most cash-in transactions.
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
                <v-tooltip bottom>
                  <template #activator="{ on: tooltip }">
                    <v-btn
                      color="primary"
                      elevation="0"
                      icon
                      v-on="{...tooltip}"
                    >
                      <v-icon>mdi-printer</v-icon>
                    </v-btn>
                  </template>
                  <span>Print Results</span>
                </v-tooltip>

                <v-tooltip bottom>
                  <template #activator="{ on: tooltip }">
                    <v-btn
                      color="primary"
                      elevation="0"
                      icon
                      v-on="{...tooltip}"
                    >
                      <v-icon>mdi-file-excel</v-icon>
                    </v-btn>
                  </template>
                  <span>Export to Excel</span>
                </v-tooltip>
              </v-col>
              <v-spacer></v-spacer>
              <v-col
                cols="12"
                sm="2"
              >
                <v-text-field
                  v-model="filters.date_start"
                  type="date"
                  label="From"
                  dense
                ></v-text-field>
              </v-col>
              <v-col
                cols="12"
                sm="2"
              >
                <v-text-field
                  v-model="filters.date_end"
                  type="date"
                  label="Until"
                  dense
                ></v-text-field>
              </v-col>

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
            <template #[`item.cash_in_amount`]="{item}">
              <span class="text-mono">{{ item.cash_in_amount }}</span>
            </template>
          </v-data-table>
        </v-card>
      </v-col>

    </v-row>
  </div>
</template>

<script>
export default {
  name: 'MembersIndex',
  layout: 'home',
  data() {
    return {
      search: '',
      filters: {
        date_start: null,
        date_end: null,
      },
      headers: [
        {
          text: 'Name',
          align: 'start',
          filterable: false,
          value: 'name',
        },
        {text: 'Email', value: 'email'},
        {text: 'Cash-In Amount', value: 'cash_in_amount'},
        {text: 'Last Login', value: 'last_login'},
        {text: 'Date Joined', value: 'date_joined'},
      ],
      users: [
        {
          name: 'Ryan Labrador',
          email: 'ryan@example.net',
          cash_in_amount: 'PHP 34,391',
          user_type: 'Member',
          date_joined: '10:30 am, March 26, 2022',
          last_login: '10:30 am, March 24, 2022',
        },
        {
          name: 'John Jackson Betito',
          email: 'johnjackson@example.net',
          cash_in_amount: 'PHP 28,627',
          user_type: 'Member',
          date_joined: '10:30 am, March 26, 2022',
          last_login: '10:30 am, March 24, 2022',
        },
        {
          name: 'Harris Quedado',
          email: 'harris@example.net',
          cash_in_amount: 'PHP 17,200',
          user_type: 'Member',
          date_joined: '10:30 am, April 8, 2022',
          last_login: '10:30 am, March 24, 2022',
        },
        {
          name: 'Max Betito',
          email: 'max@example.net',
          cash_in_amount: 'PHP 7,200',
          user_type: 'Member',
          date_joined: '10:30 am, March 25, 2022',
          last_login: '10:30 am, March 24, 2022',
        },
        {
          name: 'Karl Limlengco',
          email: 'karl@example.net',
          cash_in_amount: 'PHP 7,200',
          user_type: 'Member',
          date_joined: '10:30 am, March 21, 2022',
          last_login: '10:30 am, March 24, 2022',
        },
        {
          name: 'Ardee Poblete',
          email: 'ardee@example.net',
          cash_in_amount: 'PHP 7,200',
          user_type: 'Member',
          date_joined: '10:30 am, March 16, 2022',
          last_login: '10:30 am, March 24, 2022',
        },
        {
          name: 'Dean Simon Damasig',
          email: 'dean@example.net',
          cash_in_amount: 'PHP 2,500',
          user_type: 'Member',
          date_joined: '10:30 am, March 31, 2022',
          last_login: '10:30 am, March 24, 2022',
        },
      ],
    }
  }
}
</script>
