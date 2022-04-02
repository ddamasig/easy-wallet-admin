<template>
  <v-card
    class="pa-4 text-center"
    flat
  >
    <v-card-title class="text-center">
       <span class="text-center font-weight-bold flex-fill">
         How to Invite Members?
       </span>
    </v-card-title>
    <v-card-text>
      <ol class="text-left">
        <li>Copy your referral link below.</li>
        <li>Send the link to your friends.</li>
        <li>Wait for them to complete their account and pay the membership fee PHP 5,000</li>
        <li>A referral fee of <b>PHP 2,500</b> will be deposited into you wallet.</li>
      </ol>
    </v-card-text>
    <v-card-actions>
      <v-text-field
        v-model="referral_link"
        ref="referralLinkInput"
        solo
        autofocus
        readonly
        append-icon="mdi-content-copy"
        hint="Click to copy referral link."
        persistent-hint
      ></v-text-field>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  data: () => ({
    referral_link: 'www.easywallet.ph/referrals/J4y7KD',
  }),
}
</script>
