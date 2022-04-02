<template>
  <div>
    <c-app-bar></c-app-bar>
    <v-row
      justify="center"
      align="start"
      class="px-3 pb-12"
      dense
    >
      <v-col
        cols="12"
        sm="8"
        :class="listClass"
      >
        <c-audit-log-list
          :items="items"
          @select-item="handleSelectItemEvent"
        ></c-audit-log-list>
      </v-col>

      <v-col
        sm="4"
        :class="detailsClass"
      >
        <v-toolbar
          flat
          class="pa-3 mb-0 d-block d-sm-none"
        >
          <v-icon>
            mdi-arrow-left
          </v-icon>
        </v-toolbar>
        <c-audit-log-details
          :selectedItem="selectedItem"
        ></c-audit-log-details>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import CAuditLogDetails from "@/components/ServiceMonitoring/AuditLogs/CAuditLogDetails";
import CAuditLogList from "@/components/ServiceMonitoring/AuditLogs/CAuditLogList";

export default {
  name: 'AuditLogs',
  components: {CAuditLogDetails, CAuditLogList},
  layout: 'home',
  data: () => ({
    showList: true,
    selectedItem: {},
    items: [
      {
        description: 'Mensas sunt tumultumques de flavum vortex.',
        actor: 'Juan Dela Cruz',
        tags: ['Auth', 'Member'],
        date: 'March 31, 2022',
        additional_info: '{"attribute": "value"}',
        id: 1
      },
      {
        description: 'Mensas sunt tumultumques de flavum vortex.',
        actor: 'LeBron James',
        tags: ['Auth', 'Admin'],
        date: 'March 31, 2022',
        id: 2
      },
      {
        description: 'Mensas sunt tumultumques de flavum vortex.',
        actor: 'Juan Dela Cruz',
        tags: ['Auth', 'Member'],
        date: 'March 31, 2022',
        id: 3
      },
      {
        description: 'Mensas sunt tumultumques de flavum vortex.',
        actor: 'Juan Dela Cruz',
        tags: ['Auth', 'Member'],
        date: 'March 31, 2022',
        id: 4
      },
      {
        description: 'Mensas sunt tumultumques de flavum vortex.',
        actor: 'Juan Dela Cruz',
        tags: ['Auth', 'Member'],
        date: 'March 31, 2022',
        id: 5
      },
      {
        description: 'Mensas sunt tumultumques de flavum vortex.',
        actor: 'Juan Dela Cruz',
        tags: ['Auth', 'Member'],
        date: 'March 31, 2022',
        id: 6
      },
    ]
  }),
  computed: {
    listClass() {
      if (this.selectedItem) {
        return 'd-block'
      }
      return 'd-none d-sm-block'
    },
    detailsClass() {
      if (!this.selectedItem) {
        return 'd-block'
      }
      return 'd-none d-sm-block'
    },
  },
  methods: {
    handleSelectItemEvent(item) {
      console.log('Received select-item event')
      this.selectedItem = item
    },
  }
}
</script>
