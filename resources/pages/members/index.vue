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

        <h3>Members Management</h3>
        <small>
          Here are the list of existing members.
          Click on the member's name to view more details and access actions.
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
                <c-generate-referral-link-modal
                ></c-generate-referral-link-modal>
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
                  label="Joined From"
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
import CGenerateReferralLinkModal from "@/components/Referrals/CGenerateReferralLinkModal";

export default {
  name: 'MembersIndex',
  layout: 'home',
  components: {CGenerateReferralLinkModal},
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
        {text: 'Current Balance', value: 'current_balance'},
        {text: 'Last Login', value: 'last_login'},
        {text: 'Date Joined', value: 'date_joined'},
      ],
      users: [
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          user_type: 'Member',
          date_joined: 'April 8, 2022',
          last_login: 'March 24, 2022',
        },
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          user_type: 'Member',
          date_joined: 'March 31, 2022',
          last_login: 'March 24, 2022',
        },
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          user_type: 'Member',
          date_joined: 'March 26, 2022',
          last_login: 'March 24, 2022',
        },
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          user_type: 'Member',
          date_joined: 'March 26, 2022',
          last_login: 'March 24, 2022',
        },
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          user_type: 'Member',
          date_joined: 'March 25, 2022',
          last_login: 'March 24, 2022',
        },
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          user_type: 'Member',
          date_joined: 'March 21, 2022',
          last_login: 'March 24, 2022',
        },
        {
          name: 'Juan Dela Cruz',
          email: 'jdelacruz@example.net',
          current_balance: 'PHP 7,200',
          user_type: 'Member',
          date_joined: 'March 16, 2022',
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
