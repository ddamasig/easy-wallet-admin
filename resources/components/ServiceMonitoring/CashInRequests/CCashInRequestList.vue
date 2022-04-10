<template>
  <v-card
    class="p-4"
    flat
    rounded
  >
    <v-card-title>
      <v-text-field
        placeholder="Type keywords here"
        prepend-inner-icon="mdi-magnify"
        hide-details
        dense
        filled
        rounded
      ></v-text-field>
      <v-row class="mt-2" dense>
        <v-col cols="12">
          <v-tabs grow show-arrows align-with-title>
            <v-tab v-for="(item,index) in filters" :key="index" class="mr-1">
              {{ item.name }} - {{ item.count }}
            </v-tab>
          </v-tabs>
        </v-col>
      </v-row>
    </v-card-title>
    <v-card-text
      class="overflow-auto px-0"
      style="max-height: 40rem"
    >
      <v-list>
        <v-list-item-group
          v-model="selectedItem"
          color="primary"
        >
          <template
            v-for="(item,index) in items"
          >
            <v-list-item
              :key="index"
              dense
              three-line
              :value="item"
            >
              <v-list-item-content>
                <v-list-item-title
                  class="font-weight-black"
                  style="font-size: 1rem"
                >
                  {{ item.amount }}
                </v-list-item-title>
                <v-list-item-subtitle>{{ item.date }}</v-list-item-subtitle>
                <v-list-item-subtitle>{{ item.member }}</v-list-item-subtitle>
              </v-list-item-content>
              <v-list-item-action class="mt-4">
                <v-chip
                  class="text-capitalize"
                  color="primary"
                  small
                >
                  {{ item.id }}
                </v-chip>
              </v-list-item-action>
            </v-list-item>

            <v-divider
              :key="`${index}-divider`"
            ></v-divider>
          </template>
        </v-list-item-group>
      </v-list>

      <div class="pa-3">
        <v-btn
          block
          text
          small
        >
          Show more
        </v-btn>
      </div>

    </v-card-text>
  </v-card>
</template>

<script>
export default {
  props: {
    items: Array
  },
  data: () => ({
    selectedItem: {},
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
    ]
  }),
  watch: {
    selectedItem(val) {
      if (val) {
        this.$emit('select-item', val)
      }
    }
  }
}
</script>
