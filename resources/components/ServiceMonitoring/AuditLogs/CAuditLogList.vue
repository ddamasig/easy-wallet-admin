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
        <v-col cols="12" sm="4">
          <v-text-field
            dense
            append-icon="mdi-magnify"
            label="Search"
          ></v-text-field>
        </v-col>
        <v-col cols="12" sm="4">
          <v-autocomplete
            dense
            label="Tags"
            :items="tags"
            multiple
            chips
            small-chips
            deletable-chips
            clearable
          ></v-autocomplete>
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
    </template>
    <template #[`item.user`]="{ item }">
      <span :id="`item-${item.id}`">{{ item.user }}</span>
    </template>

    <template #[`item.additional_info`]="{ item }">
      <span
        class="overflow-x-hidden text-truncate d-block"
        style="max-width: 300px !important;"
      >
        {{ item.additional_info }}
     </span>
    </template>


    <template #[`item.tags`]="{ item }">
      <v-chip
        v-for="(tag,index) in item.tags"
        :key="index"
        class="mr-1"
        small
      >
        {{ tag }}
      </v-chip>
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
      {text: 'User', value: 'user'},
      {text: 'Description', value: 'description'},
      {text: 'Tags', value: 'tags'},
      {text: 'Additional Info', value: 'additional_info'},
      {text: 'Date', value: 'date'},
    ],
    tags: [
      'Admin',
      'Member',
      'Auth',
      'E-Loading',
      'Bills Payment',
      'Money Transfer',
      'Ticketing',
      'Settings',
      'System',
    ],
    items: [
      {
        description: 'Mensas sunt tumultumques de flavum vortex.',
        user: 'Harris Quedado',
        tags: ['Auth', 'Member'],
        date: '10:30 pm, March 31, 2022',
        additional_info: '{\n' +
          '\t"glossary": {\n' +
          '        "title": "example glossary",\n' +
          '\t\t"GlossDiv": {\n' +
          '            "title": "S",\n' +
          '\t\t\t"GlossList": {\n' +
          '                "GlossEntry": {\n' +
          '                    "ID": "SGML",\n' +
          '\t\t\t\t\t"SortAs": "SGML",\n' +
          '\t\t\t\t\t"GlossTerm": "Standard Generalized Markup Language",\n' +
          '\t\t\t\t\t"Acronym": "SGML",\n' +
          '\t\t\t\t\t"Abbrev": "ISO 8879:1986",\n' +
          '\t\t\t\t\t"GlossDef": {\n' +
          '                        "para": "A meta-markup language, used to create markup languages such as DocBook.",\n' +
          '\t\t\t\t\t\t"GlossSeeAlso": ["GML", "XML"]\n' +
          '                    },\n' +
          '\t\t\t\t\t"GlossSee": "markup"\n' +
          '                }\n' +
          '            }\n' +
          '        }\n' +
          '    }\n' +
          '}',
        avatar: 'https://picsum.photos/32',
        id: 1
      },
      {
        description: 'Mensas sunt tumultumques de flavum vortex.',
        user: 'Dean Simon Damasig',
        tags: ['Auth', 'Admin'],
        date: '10:30 pm, March 31, 2022',
        avatar: 'https://picsum.photos/34',
        id: 2
      },
      {
        description: 'Mensas sunt tumultumques de flavum vortex.',
        user: 'Ryan Labrador',
        tags: ['Auth', 'Member'],
        date: '10:30 pm, March 31, 2022',
        avatar: 'https://picsum.photos/35',
        id: 3
      },
      {
        description: 'Mensas sunt tumultumques de flavum vortex.',
        user: 'John Jackson Betito',
        tags: ['Auth', 'Member'],
        date: '10:30 pm, March 31, 2022',
        avatar: 'https://picsum.photos/36',
        id: 4
      },
      {
        description: 'Mensas sunt tumultumques de flavum vortex.',
        user: 'Max Betito',
        tags: ['Auth', 'Member'],
        date: '10:30 pm, March 31, 2022',
        avatar: 'https://picsum.photos/37',
        id: 5
      },
      {
        description: 'Mensas sunt tumultumques de flavum vortex.',
        user: 'John Jackson Betito',
        tags: ['Auth', 'Member'],
        date: '10:30 pm, March 31, 2022',
        id: 6
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
