<template>
  <div>
    <c-app-bar></c-app-bar>
    <v-row
      justify="center"
      align="center"
      dense
    >
      <v-col
        cols="12"
        sm="4"
      >
        <v-card flat class="py-2">
          <v-card-title>
            Profile
          </v-card-title>
          <v-card-subtitle>
            This is how you appear to the admin other members that you interact with.
          </v-card-subtitle>
          <v-card-text>
            <v-form
              ref="form"
            >
              <p class="mb-0">First Name</p>
              <v-text-field
                v-model="model.full_name"
                solo
                flat
                dense
                readonly
              ></v-text-field>
              <p class="mb-0">Email Address</p>
              <v-text-field
                v-model="model.email"
                solo
                flat
                dense
                readonly
              ></v-text-field>
              <p class="mb-0">Birthdate</p>
              <v-text-field
                v-model="model.birthdate"
                solo
                flat
                dense
                readonly
              ></v-text-field>
              <p class="mb-0">Mobile Number</p>
              <v-text-field
                v-model="model.mobile_number"
                solo
                flat
                dense
                readonly
                prefix="+63"
              ></v-text-field>
              <p class="mb-0">Full Address</p>
              <v-text-field
                v-model="model.address"
                solo
                flat
                dense
                readonly
              ></v-text-field>
            </v-form>
          </v-card-text>
          <v-card-actions>
            <v-btn
              color="primary"
              elevation="0"
              block
            >
              Logout
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>

      <v-col
        cols="12"
        sm="3"
        align-self="start"
      >
        <v-card flat class="py-2 fill-height">
          <v-card-title>
            Security
          </v-card-title>
          <v-card-subtitle>
            Update your password or PIN here.
          </v-card-subtitle>
          <v-card-text>
            <v-btn
              block
              color="primary"
              outlined
              class="text-capitalize"
              elevation="0"
              to="/profile/update-pin"
            >
              Update PIN
            </v-btn>
            <v-btn
              class="mt-2 text-capitalize"
              block
              color="primary"
              outlined
              elevation="0"
              to="/profile/update-password"
            >
              Update Password
            </v-btn>
          </v-card-text>
        </v-card>
      </v-col>

    </v-row>

  </div>
</template>

<script>
export default {
  layout: 'home',
  name: 'ProfileIndex',
  data: () => ({
    model: {
      alias: 'JD Loading Station',
      full_name: 'Juan R. Dela Cruz',
      first_name: 'Juan',
      middle_name: 'Reyes',
      last_name: 'Dela Cruz',
      birthdate: 'March 31, 1990',
      address: 'Penafrancia St, Naga City, Camarines Sur',
      email: 'juandelacruz@gmail.com',
      mobile_number: '1231231234',
    }
  })
}
</script>
