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
        sm="4"
      >
        <c-referral-settings-panel>
        </c-referral-settings-panel>
      </v-col>
      <v-col
        cols="12"
        sm="4"
      >
        <c-membership-settings-panel
        ></c-membership-settings-panel>
      </v-col>
    </v-row>
  </div>
</template>

<script>

import CReferralSettingsPanel from "@/components/Settings/CReferralSettingsPanel";
import CMembershipSettingsPanel from "@/components/Settings/CMembershipSettingsPanel";

export default {
  name: 'ReferralSettings',
  components: {CReferralSettingsPanel, CMembershipSettingsPanel},

  layout: 'home',
  data: () => ({
    showList: true,
    selectedItem: {},
    items: [],
  }),
  computed: {},
}
</script>
