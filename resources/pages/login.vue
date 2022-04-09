<template>
  <v-row justify="center">
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
