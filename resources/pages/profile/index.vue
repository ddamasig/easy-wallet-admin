<template>
  <div>
    <c-app-bar></c-app-bar>
    <v-row
      justify="center"
      align="center"
      dense
    >
      <v-col cols="12" sm="6" md="5" lg="4">
        <v-card flat class="pa-3" outlined>
          <v-card-text>
            <v-row>
              <v-col cols="12" class="text-center">
                <v-avatar color="primary" size="72">
                  <v-img v-if="$auth.user.avatar" :src="$auth.user.avatar"/>
                  <v-icon v-else large dark>mdi-account</v-icon>
                </v-avatar>

                <p class="black--text title mb-0 mt-6">{{ $auth.user.full_name }}</p>
                <p class="subtitle">{{ $auth.user.email }}</p>
              </v-col>
            </v-row>

            <p class="mb-0">User Type</p>
            <p class="black--text text-capitalize">{{ userType }}</p>

            <p class="mb-0">Date Joined</p>
            <p class="black--text">{{ $formatDate($auth.user.created_at) }}</p>

            <p class="mb-0">Mobile Number</p>
            <p class="black--text">{{ $auth.user.mobile_number }}</p>

            <p class="mb-0">Birthdate</p>
            <p class="black--text">{{ $formatDate($auth.user.birthdate) }}</p>

            <p class="mb-0">Address</p>
            <p class="black--text">{{ $auth.user.address }}</p>

            <v-divider class="my-4"/>

            <v-btn
              block
              color="primary"
              outlined
              class="text-capitalize"
              to="/profile/update-pin"
              v-text="'Update PIN'"
            />
            <v-btn
              class="mt-2 text-capitalize"
              block
              color="primary"
              outlined
              to="/profile/update-password"
              v-text="'Update Password'"
            />
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  name: 'ProfileIndex',
  // filters: {
  //   formatDate: (date) =>
  // },
  layout: 'home',
  computed: {
    userType() {
      return this.$auth.user.user_type.replace('_', ' ')
    }
  },
  methods: {
    // formatDate(date) {
    //   return this.$moment(date).format('MMMM DD, YYYY')
    // }
  }
}
</script>
