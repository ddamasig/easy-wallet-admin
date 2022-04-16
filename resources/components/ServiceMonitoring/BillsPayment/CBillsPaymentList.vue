<template>
  <v-data-table
    :headers="headers"
    :items="items"
    sort-by="date"
    single-select
    v-model="selectedItem"
    item-key="id"
    hide-default-footer
    class="transparent my-4"
    @click:row="selectItem"
    :item-class="selectedItemClass"
  >
    <template #top>
      <h3 class="mb-5">Bills Payment</h3>

      <!-- Search and date filter -->
      <v-row>
        <v-col cols="12" sm="8">
          <v-text-field
            dense
            append-icon="mdi-magnify"
            label="Search"
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="2">
          <v-text-field
            dense
            label="Starting Date"
            type="date"
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="2">
          <v-text-field
            dense
            label="End Date"
            type="date"
          ></v-text-field>
        </v-col>
      </v-row>

      <!-- Status -->
      <v-chip-group mandatory color="primary">
        <v-chip
          v-for="(filter,index) in filters"
          :key="index"
          small
          class="font-weight-medium"
        >
          {{ filter.name }} &nbsp; {{ filter.count }}
        </v-chip>
      </v-chip-group>
    </template>
    <template v-slot:[`item.member`]="{ item }">
      <v-avatar size="32" :id="`item-${item.id}`" class="mr-1">
        <v-img :src="item.avatar"></v-img>
      </v-avatar>
      <span>{{ item.member }}</span>
    </template>
    <template v-slot:[`item.status`]="{ item }">
      <span class="success--text">
        {{ item.status }}
      </span>
    </template>
    <template #[`item.account_number`]="{ item }">
      <span class="text-mono">{{ item.account_number }}</span>
    </template>
    <template #[`item.amount`]="{ item }">
      <span class="text-mono">{{ item.amount }}</span>
    </template>

    <template #footer>
      <div class="text-center mx-auto mt-3">
        <v-btn text block>
          <v-icon class="mr-1">mdi-refresh</v-icon>
          Show more
        </v-btn>
      </div>

    </template>
  </v-data-table>

</template>

<script>
export default {
  data: () => ({
    search: '',
    headers: [
      {text: 'Member', value: 'member'},
      {text: 'Account Name', value: 'account_name'},
      {text: 'Account Number', value: 'account_number'},
      {text: 'Provider', value: 'provider'},
      {text: 'Amount', value: 'amount'},
      {text: 'Status', value: 'status'},
      {text: 'Date', value: 'date'},
    ],
    filter: null,
    filters: [
      {
        name: 'Pending',
        count: '10'
      },
      {
        name: 'Success',
        count: '36'
      },
      {
        name: 'Failed',
        count: '0'
      },
    ],
    selectedItem: [],
    items: [
      {
        provider: 'PLDT HOME',
        amount: 'PHP 2,900',
        account_name: 'Juan Dela Cruz Account',
        account_number: '8729911231',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        id: 1
      },
      {
        provider: 'GLOBE',
        amount: 'PHP 2,900',
        account_name: 'Juan Dela Cruz Account',
        account_number: '8729911231',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        id: 2
      },
      {
        provider: 'CASURECO II',
        amount: 'PHP 1,200',
        account_name: 'Juan Dela Cruz Account',
        account_number: '8729911231',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        id: 3
      },
      {
        provider: 'Sky Cable',
        amount: 'PHP 2,900',
        account_name: 'Juan Dela Cruz Account',
        account_number: '8729911231',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        id: 4
      },
      {
        provider: 'Sky Cable',
        amount: 'PHP 1,599',
        account_name: 'Juan Dela Cruz Account',
        account_number: '8729911231',
        amount_deducted_from_wallet: 'PHP 51',
        member: 'Juan Dela Cruz',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        id: 5
      },
    ]
  }),
  methods: {
    selectItem(item) {
      this.selectedItem = [item]
      this.$emit('select-item', item)
    },
    selectedItemClass(item) {
      if (this.selectedItem.length > 0) {
        if (item.id === this.selectedItem[0].id) {
          return 'primary--bg primary--text pointer'
        }
      }

      return 'pointer'
    }
  }
}
</script>
