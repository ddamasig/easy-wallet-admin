<template>
  <div>
    <c-app-bar></c-app-bar>
    <v-row
      justify="center"
      align="start"
      class="px-3 pb-12"
      dense
    >
      <v-col cols="12" sm="6">
        <c-referral-settings-panel class="mb-4"/>
        <c-package-inclusions-panel/>
      </v-col>
    </v-row>
  </div>
</template>

<script>

import CReferralSettingsPanel from "@/components/Settings/CReferralSettingsPanel";
import CPackageInclusionsPanel from "@/components/Settings/CPackageInclusionsPanel";

export default {
  name: 'ReferralSettings',
  components: {CReferralSettingsPanel, CPackageInclusionsPanel},

  layout: 'home',
  data: () => ({
    showList: true,
    selectedItem: {},
    items: [],
  }),
  computed: {},
}
</script>
