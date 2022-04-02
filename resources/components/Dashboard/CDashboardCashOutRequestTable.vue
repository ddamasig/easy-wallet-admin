<template>
    <v-card
      flat
      rounded
      class="pa-3 overflow-y-auto"
      max-height="625"
    >
      <template
        v-for="(item,index) in requests"
      >
        <v-list-item
          :key="index"
          class="pt-2"
        >
          <v-list-item-content>
            <v-list-item-title class="font-weight-medium">
              {{ item.amount }}
            </v-list-item-title>
            <v-list-item-subtitle>
              {{ item.member }}
            </v-list-item-subtitle>
            <v-list-item-subtitle>
              {{ item.date }}
            </v-list-item-subtitle>
          </v-list-item-content>
          <v-list-item-action>
            <v-chip
              class="text-capitalize primary lighten-5 primary--text"
              small
              @click="reviewWithdrawalRequest()"
            >
              Review
            </v-chip>
          </v-list-item-action>
        </v-list-item>
        <v-divider
          v-if="index < requests.length - 1"
          :key="`${index}-divider`"
          class="my-2">
        </v-divider>
      </template>
    </v-card>
</template>

<script>
export default {
  data: () => ({
    requests: [
      {
        amount: 'P 5,000',
        id: 'KK23LQD',
        date: 'March 16, 2022',
        status: 'pending',
        member: 'Juan Dela Cruz'
      },
      {
        amount: 'P 5,000',
        id: 'KK23LQD',
        date: 'March 16, 2022',
        status: 'pending',
        member: 'Juan Dela Cruz'
      },
      {
        amount: 'P 200',
        id: 'QS5LS01',
        date: 'March 10, 2022',
        status: 'complete',
        member: 'Michael Jordan'
      },
      {
        amount: 'P 1,450',
        id: 'SM0X921',
        date: 'March 02, 2022',
        status: 'complete',
        member: 'Kobe Bryant'
      },
      {
        amount: 'P 5,000',
        id: 'KK23LQD',
        date: 'March 16, 2022',
        status: 'pending',
        member: 'Juan Dela Cruz'
      },
      {
        amount: 'P 200',
        id: 'QS5LS01',
        date: 'March 10, 2022',
        status: 'complete',
        member: 'Michael Jordan'
      },
      {
        amount: 'P 1,450',
        id: 'SM0X921',
        date: 'March 02, 2022',
        status: 'complete',
        member: 'Kobe Bryant'
      },
      {
        amount: 'P 5,000',
        id: 'KK23LQD',
        date: 'March 16, 2022',
        status: 'pending',
        member: 'Juan Dela Cruz'
      },
      {
        amount: 'P 200',
        id: 'QS5LS01',
        date: 'March 10, 2022',
        status: 'complete',
        member: 'Michael Jordan'
      },
      {
        amount: 'P 1,450',
        id: 'SM0X921',
        date: 'March 02, 2022',
        status: 'complete',
        member: 'Kobe Bryant'
      },
    ]
  }),
  methods: {
    reviewWithdrawalRequest() {
      console.log('review')
    },
    getStatusColor(item) {
      switch (item.status) {
        case 'pending':
          return 'orange lighten-5 orange--text'
        case 'complete':
          return 'success lighten-5 success--text'
      }
    }
  }
}
</script>
