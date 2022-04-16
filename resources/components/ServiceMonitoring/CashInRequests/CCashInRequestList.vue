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
      <h3 class="mb-5">Cash-In Requests</h3>

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
      <span class="orange--text">
        {{ item.status }}
      </span>
    </template>
    <template #[`item.images`]="{ item }">
      <v-avatar
        v-for="(image,index) in item.images"
        :key="index"
        class="mr-1 ma-1"
        rounded
      >
        <v-img :src="image"></v-img>
      </v-avatar>
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
      {text: 'Amount', value: 'amount'},
      {text: 'Remarks', value: 'remarks'},
      {text: 'Images', value: 'images'},
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
        name: 'Approved',
        count: '36'
      },
      {
        name: 'Disapproved',
        count: '5'
      },
    ],
    selectedImage: '',
    selectedItem: [],
    items: [
      {
        member: 'Harris Quedado',
        remarks: 'Byssuss congregabo in ferox burdigala!',
        amount: 'PHP 5,000',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        id: 1,
        avatar: 'https://picsum.photos/32',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/361',
          'https://placekitten.com/640/362',
        ]
      },
      {
        member: 'Dean Simon Damasig',
        remarks: 'Byssuss congregabo in ferox burdigala!',
        amount: 'PHP 2,500',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        id: 2,
        avatar: 'https://picsum.photos/33',
        images: [
          'https://placekitten.com/640/310',
          'https://placekitten.com/640/342',
        ]
      },
      {
        member: 'John Jackson Betito',
        remarks: 'Byssuss congregabo in ferox burdigala!',
        amount: 'PHP 4,700',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        id: 3,
        avatar: 'https://picsum.photos/34',
        images: []
      },
      {
        member: 'Ryan Labrador',
        remarks: 'Byssuss congregabo in ferox burdigala!',
        amount: 'PHP 1,250',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        id: 4,
        avatar: 'https://picsum.photos/35',
        images: []
      },
      {
        member: 'Max Betito',
        remarks: 'Byssuss congregabo in ferox burdigala!',
        amount: 'PHP 3,250',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        id: 5,
        avatar: 'https://picsum.photos/36',
        images: []
      },
      {
        member: 'Karl Limlengco',
        remarks: 'Byssuss congregabo in ferox burdigala!',
        amount: 'PHP 2,500',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        id: 6,
        avatar: 'https://picsum.photos/37',
        images: []
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
