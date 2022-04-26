<template>
  <v-row justify="center" align="center" class="fill-height">
    <v-col cols="12" sm="6" md="6" lg="4" xl="3">
      <v-form ref="loginForm" @submit.prevent="authenticate">
        <v-card outlined class="pa-3">
          <v-card-title>
            <v-img class="mx-auto" max-width="260" src="/logos/ewallet.png"></v-img>
          </v-card-title>
          <v-card-text class="mt-4">
            <v-text-field
              v-model="model.username"
              label="Email/Mobile Number"
              append-icon="mdi-account"
              dense
              outlined
            ></v-text-field>
            <v-text-field
              v-model="model.password"
              label="Password"
              type="password"
              append-icon="mdi-lock"
              dense
              outlined
            ></v-text-field>
            <v-card rounded outlined class="pa-3 py-1 my-2 mb-4">
              <v-row>
                <v-col cols="9">
                  <v-checkbox label="I'm not a robot."></v-checkbox>
                </v-col>
                <v-col cols="3">
                  <v-img src="/logos/recaptcha.png"></v-img>
                </v-col>
              </v-row>
            </v-card>
            <v-btn block color="primary" elevation="0" type="submit">
              Login
            </v-btn>
            <v-btn text block class="mt-2">
              Forgot Password?
            </v-btn>
          </v-card-text>
        </v-card>
      </v-form>

    </v-col>
  </v-row>
</template>

<script>
export default {
  name: 'LoginPage',
  layout: 'blank',
  auth: false,
  data: () => ({
    model: {
      username: '',
      password: '',
    }
  }),
  methods: {
    async authenticate() {
      await this.$auth.loginWith('laravelSanctum', {
        data: this.model,
      });
      await this.$router.push('/')
    }
  }
}
</script>
