<template>
  <v-card
    class="p-4"
    flat
    rounded
  >
    <v-card-title class="pa-6">
      <v-row dense>
        <v-col cols="12">
          <p>Filters</p>
        </v-col>
        <v-col cols="12" sm="4">
          <v-text-field
            placeholder="Type keywords here"
            prepend-inner-icon="mdi-magnify"
            hide-details
            dense
            filled
            rounded
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="4">
          <v-text-field
            placeholder="Type keywords here"
            type="date"
            dense
            filled
            hide-details
            rounded
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="4">
          <v-text-field
            placeholder="Type keywords here"
            type="date"
            hide-details
            dense
            filled
            rounded
          ></v-text-field>
        </v-col>

        <v-col cols="12">
          <v-autocomplete
            v-model="filters.tags"
            :items="tags"
            item-color="primary"
            deletable-chips
            color="primary"
            filled
            rounded
            dense
            multiple
            chips
            small-chips
            clearable
          ></v-autocomplete>
        </v-col>
      </v-row>

      <v-row dense>
        <v-col sm="4">
          <v-btn
            color="primary"
            dark
            elevation="0"
            class="mb-2"
          >
            Apply
          </v-btn>

          <v-btn
            color="primary"
            dark
            elevation="0"
            outlined
            class="mb-2"
          >
            Clear
          </v-btn>
        </v-col>
      </v-row>
    </v-card-title>

    <v-divider></v-divider>

    <v-card-text class="pa-3">
      <v-data-table
        :headers="headers"
        :items="items"
        sort-by="date"
        single-select
        v-model="selectedItem"
        item-key="id"
        show-select
        checkbox-color="primary"
      >
        <template v-slot:[`item.tags`]="{ item }">
          <v-chip
            v-for="(tag,index) in item.tags"
            :key="index"
            small
            class="mr-1"
          >
            {{ tag }}
          </v-chip>
        </template>
        <template v-slot:no-data>
          <v-btn
            color="primary"
            @click="initialize"
          >
            Reset
          </v-btn>
        </template>
      </v-data-table>

    </v-card-text>
  </v-card>
</template>

<script>
export default {
  props: {
    items: Array
  },
  data: () => ({
    selectedItem: [],
    dialog: false,
    dialogDelete: false,
    tags: [
      'Auth',
      'Member',
      'Admin',
      'E-Loading',
      'Bills Payment',
      'Ticketing',
      'Money Transfer',
      'Settings',
      'Daemon',
    ],
    filters: {
      tags: null
    },
    headers: [
      {
        text: 'Description',
        align: 'start',
        sortable: false,
        value: 'description',
      },
      {text: 'Actor', value: 'actor'},
      {text: 'Tags', value: 'tags'},
      {text: 'Date', value: 'date'},
    ],
    editedIndex: -1,
    editedItem: {
      name: '',
      calories: 0,
      fat: 0,
      carbs: 0,
      protein: 0,
    },
    defaultItem: {
      name: '',
      calories: 0,
      fat: 0,
      carbs: 0,
      protein: 0,
    },
  }),

  watch: {
    selectedItem(val) {
      console.log('Val:')
      console.log(val[0])
      this.$emit('select-item', val[0])
    }
  },

  created() {
  },

  methods: {
  },
}
</script>
