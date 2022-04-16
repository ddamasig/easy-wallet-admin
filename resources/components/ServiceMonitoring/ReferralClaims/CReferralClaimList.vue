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
      <h3 class="mb-5">Referral Claims</h3>

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
      <v-chip-group mandatory color="primary" class="my-4">
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
    <template v-slot:[`item.referred_by`]="{ item }">
      <v-avatar size="32" :id="`item-${item.id}`" class="mr-1">
        <v-img :src="item.avatar"></v-img>
      </v-avatar>
      <span>{{ item.referred_by }}</span>
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
      {text: 'Referral ID', value: 'id'},
      {text: 'Referred By', value: 'referred_by'},
      {text: 'New Member Name', value: 'new_member_name'},
      {text: 'New Member Email', value: 'new_member_email'},
      {text: 'Images', value: 'images'},
      {text: 'Status', value: 'status'},
      {text: 'Date', value: 'date'},
    ],
    filter: null,
    filters: [
      {
        name: 'Invitation Sent',
        count: '10'
      },
      {
        name: 'Information Complete',
        count: '36'
      },
      {
        name: 'Requirements Complete',
        count: '36'
      },
      {
        name: 'Approved',
        count: '5'
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
        referred_by: 'Harris Quedado',
        new_member_name: 'LeBron James',
        new_member_email: 'lebronjames@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 1,
        avatar: 'https://picsum.photos/31',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/361',
          'https://placekitten.com/640/362',
        ]
      },
      {
        referred_by: 'Dean Simon Damasig',
        new_member_name: 'Derek Rose',
        new_member_email: 'drose@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 2,
        avatar: 'https://picsum.photos/32',
        images: [
          'https://placekitten.com/640/360',
        ]
      },
      {
        referred_by: 'Ryan Labrador',
        new_member_name: 'George St. Pierre',
        new_member_email: 'gsp@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 3,
        avatar: 'https://picsum.photos/33',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/362',
        ]
      },
      {
        referred_by: 'Karl Limlengco',
        new_member_name: 'Israel Adesanya',
        new_member_email: 'stylebender@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 4,
        avatar: 'https://picsum.photos/34',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/361',
          'https://placekitten.com/640/362',
        ]
      },
      {
        referred_by: 'Ardee Poblete',
        new_member_name: 'Henry Cejudo',
        new_member_email: 'triplec@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 5,
        avatar: 'https://picsum.photos/35',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/361',
          'https://placekitten.com/640/362',
        ]
      },
      {
        referred_by: 'John Jackson Betito',
        new_member_name: 'LeBron James',
        new_member_email: 'lebronjames@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 6,
        avatar: 'https://picsum.photos/31',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/361',
          'https://placekitten.com/640/362',
        ]
      },
      {
        referred_by: 'Max Betito',
        new_member_name: 'Derek Rose',
        new_member_email: 'drose@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 7,
        avatar: 'https://picsum.photos/32',
        images: [
          'https://placekitten.com/640/360',
        ]
      },
      {
        referred_by: 'Max Betito',
        new_member_name: 'George St. Pierre',
        new_member_email: 'gsp@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 8,
        avatar: 'https://picsum.photos/33',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/362',
        ]
      },
      {
        referred_by: 'Ryan Alonzo',
        new_member_name: 'Israel Adesanya',
        new_member_email: 'stylebender@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 9,
        avatar: 'https://picsum.photos/34',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/361',
          'https://placekitten.com/640/362',
        ]
      },
      {
        referred_by: 'Juan Dela Cruz',
        new_member_name: 'Henry Cejudo',
        new_member_email: 'triplec@example.net',
        date: '10:30 am, March 30, 2022',
        status: 'Invitation Sent',
        id: 10,
        avatar: 'https://picsum.photos/35',
        images: [
          'https://placekitten.com/640/360',
          'https://placekitten.com/640/361',
          'https://placekitten.com/640/362',
        ]
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
