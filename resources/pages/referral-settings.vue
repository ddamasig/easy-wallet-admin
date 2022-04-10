<template>
  <div>
    <c-app-bar></c-app-bar>
    <v-row
      justify="center"
      align="start"
      class="px-3 pb-12"
      dense
    >
      <v-col cols="6">
        <c-referral-settings-panel class="mb-4"></c-referral-settings-panel>
        <c-membership-settings-panel class="mb-4"></c-membership-settings-panel>
        <c-service-inclusions-panel class="mb-4"></c-service-inclusions-panel>
      </v-col>
    </v-row>
  </div>
</template>

<script>

import CReferralSettingsPanel from "@/components/Settings/CReferralSettingsPanel";
import CMembershipSettingsPanel from "@/components/Settings/CMembershipSettingsPanel";
import CServiceInclusionsPanel from "@/components/Settings/CServiceInclusionsPanel";

export default {
  name: 'ReferralSettings',
  components: {CReferralSettingsPanel, CMembershipSettingsPanel, CServiceInclusionsPanel},

  layout: 'home',
  data: () => ({
    showList: true,
    selectedItem: {},
    items: [],
  }),
  computed: {},
}
</script>
