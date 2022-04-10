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
    </v-card-title>
    <v-card-text
      class="px-0"
      style="max-height: 40rem"
    >
      <v-row dense>
        <v-col sm="4">
          <v-list>
            <v-list-item-group color="primary" mandatory v-model="filter">
              <template v-for="(item,index) in filters">
                <v-list-item :key="index" dense>
                  <v-list-item-content>
                    <v-list-item-title>{{ item.name }}</v-list-item-title>
                  </v-list-item-content>
                  <v-list-item-action>
                    <v-avatar color="primary" size="32">
                      <span class="white--text">{{ item.count }}</span>
                    </v-avatar>
                  </v-list-item-action>
                </v-list-item>

                <v-divider v-if="index < filters.length - 1" :key="`${index}-divider`"></v-divider>

              </template>
            </v-list-item-group>
          </v-list>
        </v-col>

        <v-col>
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
                      {{ item.new_member_name }}
                    </v-list-item-title>
                    <v-list-item-subtitle>{{ item.date }}</v-list-item-subtitle>
                    <v-list-item-subtitle>{{ item.status }}</v-list-item-subtitle>
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
              <div class="pa-3">
                <v-btn
                  block
                  text
                  small
                >
                  Show more
                </v-btn>
              </div>
            </v-list-item-group>
          </v-list>
        </v-col>
      </v-row>
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
