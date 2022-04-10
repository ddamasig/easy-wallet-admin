<template>
  <v-row justify="center" align="center" class="fill-height">
    <v-col cols="12" sm="3">
      <v-card flat class="pa-3">
        <v-card-title>
          <v-img class="mx-auto" max-width="260" src="/logos/ewallet.png"></v-img>
        </v-card-title>
        <v-card-text>
          <v-text-field
            label="Email/ID"
            append-icon="mdi-account"
          ></v-text-field>
          <v-text-field
            label="Password"
            type="password"
            append-icon="mdi-lock"
          ></v-text-field>
          <!--          <recaptcha/>-->
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
          <v-btn block color="primary" elevation="0" to="/">
            Login
          </v-btn>
          <v-btn text block class="mt-2">
            Forgot Password?
          </v-btn>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: 'LoginPage',
  layout: 'blank'
}
</script>
