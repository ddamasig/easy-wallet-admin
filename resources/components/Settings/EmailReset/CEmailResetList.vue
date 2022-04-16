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
      <h3 class="mb-5">Money Transfer</h3>

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
    <template #[`item.member`]="{ item }">
      <v-avatar size="32" :id="`item-${item.id}`" class="mr-1">
        <v-img :src="item.avatar"></v-img>
      </v-avatar>
      <span>{{ item.member }}</span>
    </template>
    <template #[`item.status`]="{ item }">
      <span class="orange--text">
        {{ item.status }}
      </span>
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
      {text: 'Old Email', value: 'old_email'},
      {text: 'New Email', value: 'new_email'},
      {text: 'Status', value: 'status'},
      {text: 'Date', value: 'date'},
    ],

    items: [
      {
        member: 'Harris Quedado',
        old_email: 'harris@example.net',
        new_email: 'hoquedado@revlv.net',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        avatar: 'https://picsum.photos/32',
        id: 1,
        reason: 'Lorem ipsum set amet dolor elicit.'
      },
      {
        member: 'Karl Limlengco',
        old_email: 'karl@example.net',
        new_email: 'klimlengco@revlv.net',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        avatar: 'https://picsum.photos/33',
        id: 2,
        reason: 'Lorem ipsum set amet dolor elicit.'
      },
      {
        member: 'Ryan Labrador',
        old_email: 'ryan@example.net',
        new_email: 'rvl@revlv.net',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        avatar: 'https://picsum.photos/34',
        id: 3,
        reason: 'Lorem ipsum set amet dolor elicit.'
      },
      {
        member: 'Ardee Poblete',
        old_email: 'ardee@example.net',
        new_email: 'apoblete@revlv.net',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        avatar: 'https://picsum.photos/35',
        id: 4,
        reason: 'Lorem ipsum set amet dolor elicit.'
      },
      {
        member: 'Dean Simon Damasig',
        old_email: 'dean@example.net',
        new_email: 'ddamasig@revlv.net',
        date: '10:30 am, March 30, 2022',
        status: 'Pending',
        avatar: 'https://picsum.photos/36',
        id: 5,
        reason: 'Lorem ipsum set amet dolor elicit.'
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
