<template>
  <div class="mb-12">
    <c-simple-app-bar
      title="Member Profile"
      link="/members"
    ></c-simple-app-bar>
    <v-row
      justify="center"
      align="start"
      dense
    >
      <v-col
        cols="12"
        sm="5"
      >

        <v-card
          flat
          rounded
          class="pa-3"
        >
          <v-card-title>
            Basic Details
          </v-card-title>
          <v-card-text>
            <v-simple-table class="flex-fill">
              <tbody>
              <tr>
                <td class="font-weight-medium">Identity Key</td>
                <td>{{ member.identity_key }}</td>
              </tr>
              <tr>
                <td class="font-weight-medium">Name</td>
                <td>{{ member.name }}</td>
              </tr>
              <tr>
                <td class="font-weight-medium">Email Address</td>
                <td>{{ member.email }}</td>
              </tr>
              <tr>
                <td class="font-weight-medium">Mobile Number</td>
                <td>{{ member.mobile_number }}</td>
              </tr>
              <tr>
                <td class="font-weight-medium">Date Joined</td>
                <td>{{ member.date_joined }}</td>
              </tr>
              <tr>
                <td class="font-weight-medium">Address</td>
                <td>{{ member.address }}</td>
              </tr>
              <tr>
                <td class="font-weight-medium">Birthdate</td>
                <td>{{ member.birthdate }}</td>
              </tr>
              <tr>
                <td class="font-weight-medium">Current Balance</td>
                <td>{{ member.current_balance }}</td>
              </tr>
              <tr>
                <td class="font-weight-medium">Number of Confirmed Referrals</td>
                <td>{{ member.number_of_confirmed_referrals }}</td>
              </tr>
              </tbody>
            </v-simple-table>
          </v-card-text>
        </v-card>

        <v-card
          flat
          rounded
          class="pa-3 mt-4"
        >
          <v-card-title>
            Settings
          </v-card-title>
          <v-card-text>
            <v-row>
              <v-col cols="12">
                <v-list nav>
                  <v-list-item-group color="primary">
                    <template v-for="(item,index) in settings">
                      <v-list-item to="/" :key="index">
                        <v-list-item-avatar>
                          <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-avatar>
                        <v-list-item-content>
                          <v-list-item-title>{{ item.name }}</v-list-item-title>
                          <v-list-item-subtitle>{{ item.description }}</v-list-item-subtitle>
                        </v-list-item-content>
                      </v-list-item>
                    </template>

                  </v-list-item-group>

                </v-list>

              </v-col>
            </v-row>
          </v-card-text>
        </v-card>
      </v-col>

      <v-col
        cols="12"
        sm="3"
      >
        <c-user-logs
          :items="logs"
        ></c-user-logs>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import CUserLogs from "@/components/Profile/CUserLogs";

export default {
  name: 'MemberView',
  components: {CUserLogs},
  layout: 'home',
  data: () => ({
    settings: [
      {
        name: 'Reset Credentials',
        description: 'Send a reset link to the member\'s new email address.',
        icon: 'mdi-email'
      },
      {
        name: 'Reset Password',
        description: 'Send a link to the member\'s email address which will allow the member to reset his/her password.',
        icon: 'mdi-lock'
      },
      {
        name: 'Disable Account',
        description: 'This prevents the member from logging into the system and performing any form of transaction.',
        icon: 'mdi-account-cancel'
      },
    ],
    member: {
      identity_key: 'RX2LS900',
      name: 'Juan Dela Cruz',
      address: 'Penafrancia St, Naga City, Camarines Sur',
      email: 'jdelacruz@example.net',
      mobile_number: '+6391231231234',
      date_joined: 'January 3, 2022',
      birthdate: 'August 17, 1996',
      current_balance: 'PHP 2,542',
      number_of_confirmed_referrals: 4
    },
    logs: [
      {
        category: 'Buy Load',
        date: 'March 31, 2022',
        id: 'LWU123010',
      },
      {
        category: 'Money Transfer',
        date: 'March 31, 2022',
        id: 'LWU123010',
      },
      {
        category: 'Login',
        date: 'March 31, 2022',
        id: 'LWU123010',
      },
      {
        category: 'Logout',
        date: 'March 31, 2022',
        id: 'LWU123010',
      },
      {
        category: 'Pay Bills',
        date: 'March 31, 2022',
        id: 'LWU123010',
      },
      {
        category: 'Cash-In',
        date: 'March 31, 2022',
        id: 'LWU123010',
      },
    ]
  })
}
</script>
