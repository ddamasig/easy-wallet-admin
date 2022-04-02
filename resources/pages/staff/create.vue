<template>
  <div class="mb-12">
    <c-simple-app-bar
      title="Create New Staff Account"
      link="/staff"
    ></c-simple-app-bar>
    <v-row
      justify="center"
      align="center"
      dense
    >
      <v-col
        cols="12"
        sm="4"
      >
        <v-card
          flat
          rounded
          class="pa-3 mt-4"
        >
          <v-card-title>
            Basic Details
          </v-card-title>
          <v-card-subtitle>
            Submitting this form will send a confirmation link to the specified
            email address. Please make sure that the email you enter is the
            correct one since this will give the recipient access to the account.
          </v-card-subtitle>
          <v-card-text>
            <v-form ref="form">
              <v-text-field
                label="Last Name"
              ></v-text-field>
              <v-text-field
                label="First Name"
              ></v-text-field>
              <v-text-field
                label="Middle Name"
              ></v-text-field>
              <v-text-field
                label="Email Address"
              ></v-text-field>
              <v-text-field
                label="Mobile Number"
              ></v-text-field>
              <v-text-field
                label="Full Address"
              ></v-text-field>
              <v-text-field
                label="Birthdate"
                type="date"
              ></v-text-field>
            </v-form>
          </v-card-text>
          <v-card-action class="px-3">
            <v-btn
              elevation="0"
              color="primary"
            >
              Submit
            </v-btn>
            <v-btn
              elevation="0"
              outlined
            >
              Reset
            </v-btn>
          </v-card-action>
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
