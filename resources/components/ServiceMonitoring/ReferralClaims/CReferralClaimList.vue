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
    selectedItem: {}
  }),
  watch: {
    selectedItem(val) {
      this.$emit('select-item', val)
    }
  }
}
</script>
