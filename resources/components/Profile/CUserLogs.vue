<template>
  <v-card flat class="pa-3">
    <v-card-title>
      User Logs
    </v-card-title>
    <v-list-item-group>
      <template v-for="(item,index) in items">
        <v-list-item :key="index">
          <v-list-item-content>
            <v-list-item-title>{{ item.category }}</v-list-item-title>
            <v-list-item-subtitle>
              {{ item.date }}
            </v-list-item-subtitle>
          </v-list-item-content>
          <v-list-item-action>
            <v-chip small color="primary">
              {{ item.id }}
            </v-chip>
          </v-list-item-action>
        </v-list-item>
        <v-divider v-if="index < items.length - 1" :key="`${index}-divider`"></v-divider>
      </template>
    </v-list-item-group>
  </v-card>
</template>

<script>
export default {
  props: {
    items: Array
  }
}
</script>
