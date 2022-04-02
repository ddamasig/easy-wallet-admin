<template>
  <v-card
    color="primary"
    dark
    elevation="0 "
    class="fill-height"
  >
    <v-card-text>
      <v-list-item class="white--text">
        <v-list-item-content>
          <v-list-item-title>
            <h1>₱ 44,032</h1>
          </v-list-item-title>
          <v-list-item-subtitle class="font-weight-bold">
            <span>
              Wallet Balance
            </span>
          </v-list-item-subtitle>
        </v-list-item-content>

        <v-list-item-action>
          <v-list-item-action-text>
            <v-btn
              color="white"
              class="primary--text text-capitalize font-weight-bold"
              elevation="0"
              to="/cash-in/how-to-cash-in"
            >
              Cash-In
              <v-icon class="ml-2">
                mdi-plus-circle
              </v-icon>
            </v-btn>
          </v-list-item-action-text>
        </v-list-item-action>
      </v-list-item>
    </v-card-text>
  </v-card>
</template>
