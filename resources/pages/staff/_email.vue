<template>
  <div class="mb-12">
    <c-simple-app-bar
      title="Member Profile"
      link="/members"
    ></c-simple-app-bar>
    <v-row
      justify="center"
      align="center"
      dense
    >
      <v-col
        cols="12"
        sm="6"
      >

        <v-card
          flat
          rounded
          class="pa-3 mt-4"
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
      </v-col>

    </v-row>

    <v-row
      justify="center"
      align="center"
      class="pb-6"
      dense
    >
      <v-col
        cols="12"
        sm="6"
      >

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
                <p>
                  Replace the member's email address and send a reset password link.
                </p>
                <v-btn
                  color="error"
                  elevation="0"
                  outlined
                >
                  Reset Credentials
                </v-btn>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12">
                <p>
                  Send a link to the member's email address which will allow
                  the member to reset his/her password.
                </p>
                <v-btn
                  color="error"
                  elevation="0"
                  outlined
                >
                  Reset Password
                </v-btn>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12">
                <p>
                  This prevents the member from logging into the system and
                  performing any form of transaction.
                </p>
                <v-btn
                  color="error"
                  elevation="0"
                  outlined
                >
                  Disable Account
                </v-btn>
              </v-col>
            </v-row>
          </v-card-text>
        </v-card>
      </v-col>

    </v-row>
  </div>
</template>

<script>
export default {
  name: 'MemberView',
  layout: 'home',
  data: () => ({
    member: {
      identity_key: 'RX2LS900',
      name: 'Juan Dela Cruz',
      email: 'jdelacruz@example.net',
      mobile_number: '+6391231231234',
      date_joined: 'January 3, 2022',
      birthdate: 'August 17, 1996',
      current_balance: 'PHP 2,542',
      number_of_confirmed_referrals: 4
    }
  })
}
</script>
