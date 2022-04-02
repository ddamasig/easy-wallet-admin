<template>
  <v-app-bar
    flat
    color="transparent"
    class="my-4"
  >
    <v-list-item>
      <v-list-item-avatar>
        <v-img src="/avatars/avatar1.png"></v-img>
      </v-list-item-avatar>

      <v-list-item-content>
        <v-list-item-subtitle class="font-weight-medium">
          Good morning,
        </v-list-item-subtitle>
        <v-list-item-title class="font-weight-bold">
          Juan Dela Cruz
        </v-list-item-title>
      </v-list-item-content>

      <v-list-item-action>
        <v-list-item-action-text>
          <c-notifications></c-notifications>


        </v-list-item-action-text>
      </v-list-item-action>
    </v-list-item>
  </v-app-bar>
</template>
