<template>
  <div>
    <v-app-bar
      flat
      color="transparent"
      class="mb-3"
    >
      <v-app-bar-nav-icon
        class="white"
        @click="$router.push('/cash-in/how-to-cash-in')"
      >
        <v-icon>
          mdi-arrow-left
        </v-icon>
      </v-app-bar-nav-icon>
      <v-app-bar-title class="">
        Cash-In
      </v-app-bar-title>
      <v-spacer></v-spacer>
    </v-app-bar>
    <v-card
      class="pa-4"
      flat
    >
      <v-card-text>
        <v-card-title class="px-0">
          Payment Form
        </v-card-title>
        <v-card-subtitle class="px-0">
          Please make sure that you include your Member ID <b class="orange--text">J46Y7A</b> in your proof of payment.
        </v-card-subtitle>
        <v-form
          ref="form"
          @submit.prevent="onSubmit()"
          :disabled="isLoading"
        >
          <small class="d-block mb-2">
            Enter Amount
          </small>
          <v-text-field
            prefix="PHP"
            solo
            placeholder="0.00"
            type="number"
            :rules="[rules.required, rules.max]"
          ></v-text-field>

          <small class="d-block mb-2">
            Proof of Payment
          </small>
          <v-file-input
            solo
            prepend-inner-icon="mdi-image"
            clearable
            prepend-icon=""
            placeholder="Click to upload photo."
            :rules="[rules.required]"
          >
          </v-file-input>

          <small class="d-block mb-2">
            Remarks (Optional)
          </small>
          <v-textarea
            solo
            placeholder="Type additional description here."
          ></v-textarea>

          <v-btn
            block
            rounded
            elevation="0"
            color="primary"
            type="submit"
            :loading="isLoading"
          >
            Submit
          </v-btn>
        </v-form>
      </v-card-text>
    </v-card>

  </div>

</template>

<script>
export default {
  layout: 'blank',
  name: 'SubmitProofOfPayment',
  data: () => ({
    model: {
      amount: '',
      proofOfPayment: '',
      remarks: ''
    },
    rules: {
      required: value => !!value || 'Please provide the recipients number.',
      max: value => value <= 10000 || 'You can only cash-in PHP 10,000 a day.',
    },
    isLoading: false
  }),
  methods: {
    onSubmit() {
      this.isLoading = true
      const isValid = this.$refs.form.validate()
      if (isValid) {
        // Perform axios code here
        // this.$axios.post()....

        setTimeout(() => {
          this.$router.push('/pin?next=pay-bills/success')
        }, 300)
      }
      this.isLoading = false
    }
  }
}
</script>


<style scoped>
.centered-input >>> input {
  text-align: center
}
</style>
