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
      <h3>Money Transfer</h3>

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
      <v-avatar size="32">
        <v-img :src="item.avatar"></v-img>
      </v-avatar>
      <span>{{ item.member }}</span>
    </template>
    <template v-slot:[`item.status`]="{ item }">
      <v-chip color="success" small>{{ item.status }}</v-chip>
    </template>
  </v-data-table>

</template>

<script>
export default {
  data: () => ({
    search: '',
    headers: [
      {text: 'Member', value: 'member'},
      {text: 'Recipient Name', value: 'recipient_name'},
      {text: 'Recipient Number', value: 'recipient_number'},
      {text: 'Amount', value: 'amount'},
      {text: 'Status', value: 'status'},
      {text: 'Date', value: 'date'},
    ],

    items: [
      {
        member: 'Harris Quedado',
        recipient_name: 'Karl Limlengco',
        recipient_number: '+6391231231234',
        amount: 'PHP 5,000',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        avatar: 'https://picsum.photos/32',
        id: 1
      },
      {
        member: 'Ryan Labrador',
        recipient_name: 'Ardee Poblete',
        recipient_number: '+6391231231234',
        amount: 'PHP 10,000',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        avatar: 'https://picsum.photos/33',
        id: 2
      },
      {
        member: 'Dean Simon Damasig',
        recipient_name: 'Ryan Alonzo',
        recipient_number: '+6391231231234',
        amount: 'PHP 2,500',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        avatar: 'https://picsum.photos/34',
        id: 3
      },
      {
        member: 'John Jackson Betito',
        recipient_name: 'Max Betito',
        recipient_number: '+6391231231234',
        amount: 'PHP 15,000',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        avatar: 'https://picsum.photos/35',
        id: 4
      },
      {
        member: 'Ardee Poblete',
        recipient_name: 'Daryl Dayrit',
        recipient_number: '+6391231231234',
        amount: 'PHP 2,000',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        avatar: 'https://picsum.photos/36',
        id: 5
      },
      {
        member: 'Daryl Dayrit',
        recipient_name: 'Harris Quedado',
        recipient_number: '+6391231231234',
        amount: 'PHP 3,299',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        avatar: 'https://picsum.photos/37',
        id: 6
      },
      {
        member: 'Harris Quedado',
        recipient_name: 'Karl Limlengco',
        recipient_number: '+6391231231234',
        amount: 'PHP 5,000',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        avatar: 'https://picsum.photos/38',
        id: 7
      },
      {
        member: 'Ryan Labrador',
        recipient_name: 'Ardee Poblete',
        recipient_number: '+6391231231234',
        amount: 'PHP 10,000',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        avatar: 'https://picsum.photos/39',
        id: 8
      },
      {
        member: 'Dean Simon Damasig',
        recipient_name: 'Ryan Alonzo',
        recipient_number: '+6391231231234',
        amount: 'PHP 2,500',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        avatar: 'https://picsum.photos/40',
        id: 9
      },
      {
        member: 'John Jackson Betito',
        recipient_name: 'Max Betito',
        recipient_number: '+6391231231234',
        amount: 'PHP 15,000',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        avatar: 'https://picsum.photos/41',
        id: 10
      },
      {
        member: 'Ardee Poblete',
        recipient_name: 'Daryl Dayrit',
        recipient_number: '+6391231231234',
        amount: 'PHP 2,000',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        avatar: 'https://picsum.photos/42',
        id: 11
      },
      {
        member: 'Daryl Dayrit',
        recipient_name: 'Harris Quedado',
        recipient_number: '+6391231231234',
        amount: 'PHP 3,299',
        date: '10:30 am, March 30, 2022',
        status: 'Success',
        avatar: 'https://picsum.photos/43',
        id: 12
      },
    ],
    selectedItem: [],
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
