<template>
  <v-row justify="end">
    <v-menu
      bottom
      origin="center center"
      offset-y
      transition="slide-y-transition"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          icon
          v-bind="attrs"
          v-on="on"
        >
          <v-badge dot overlap color="error">
            <v-icon
              small
            >
              mdi-bell
            </v-icon>
          </v-badge>
        </v-btn>
      </template>

      <v-list>
        <template
          v-for="(item, i) in items"
        >
          <v-list-item
            :key="i"
          >
            <v-list-item-content>
              <v-list-item-title :class="item.color">{{ item.title }}</v-list-item-title>
              <v-list-item-subtitle>{{ item.subtitle }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-divider
            v-if="i < items.length - 1"
            :key="`${i}-divider`"
          ></v-divider>
        </template>

      </v-list>
    </v-menu>
  </v-row>
</template>

<script>
export default {
  data: () => ({
    items: [
      {
        title: 'Fund Transfer Successful!',
        subtitle: 'Lorem ipsum set amet dolor elicit!',
        color: 'success--text',
      },
      {
        title: 'Bills Payment Successful!',
        subtitle: 'Lorem ipsum set amet dolor elicit!',
        color: 'success--text',
      },
      {
        title: 'Cash-In Request Rejected',
        subtitle: 'Lorem ipsum set amet dolor elicit!',
        color: 'error--text',
      },
      {
        title: 'Fund Transfer Complete!',
        subtitle: 'Lorem ipsum set amet dolor elicit!',
        color: 'success--text',
      },
    ]
  }),
}
</script>
