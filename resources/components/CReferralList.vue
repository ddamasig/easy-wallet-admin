<template>
  <v-card
    class="pa-4"
    flat
  >
    <v-card-text>
      <template
        v-for="(item,index) in filteredReferrals"
      >
        <v-list-item
          three-line
          :key="index"
          dense
        >
          <v-list-item-content>
            <v-list-item-title>{{ item.name }}</v-list-item-title>
            <v-list-item-subtitle>{{ item.date }}</v-list-item-subtitle>
            <v-list-item-subtitle class="mt-4">
              <v-chip
                class="text-capitalize"
                :class="getStatusColor(item)"
                small
              >
                {{ item.status }}
              </v-chip>
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-divider
          :key="`${index}-divider`"
          class="my-2"
        ></v-divider>
      </template>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  props: {
    status: String
  },
  data: () => ({
    referrals: [
      {
        name: 'Juan Dela Cruz',
        date: 'March 12, 2022',
        status: 'pending'
      },
      {
        name: 'John Snow',
        date: 'March 05, 2022',
        status: 'pending'
      },
      {
        name: 'LeBron James',
        date: 'January 23, 2022',
        status: 'pending'
      },
      {
        name: 'Kobe Bryant',
        date: 'March 16, 2022',
        status: 'claimed'
      },
      {
        name: 'Dwayne Wade',
        date: 'March 01, 2022',
        status: 'claimed'
      },
    ]
  }),
  computed: {
    filteredReferrals() {
      return this.referrals.filter(r => r.status === this.status)
    },
  },
  methods: {
    getStatusColor(item) {
      switch (item.status) {
        case 'pending':
          return 'orange lighten-5 orange--text'
        case 'claimed':
          return 'success lighten-5 success--text'
      }
    }
  }
}
</script>
