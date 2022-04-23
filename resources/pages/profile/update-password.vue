<template>
  <div>
    <c-simple-app-bar
      title="Update Password"
      link="/profile"
    >
    </c-simple-app-bar>
    <v-row
      justify="center"
      align="center"
      dense
    >
      <v-col cols="12" sm="6" md="5" lg="4" xl="3">
        <v-form ref="updatePinForm" v-model="isFormValid" @submit.prevent="onSubmit">
          <v-card outlined class="pa-3">
            <v-card-title>
              Change Password
            </v-card-title>
            <v-card-subtitle>
              Enter you current and new Password below.
            </v-card-subtitle>
            <v-card-text>
              <p class="mb-0">Current Password</p>
              <v-text-field
                v-model="model.old_password"
                type="password"
                :rules="passwordRules"
                dense
              ></v-text-field>
              <p class="mb-0">New Password</p>
              <v-text-field
                v-model="model.new_password"
                type="password"
                :rules="passwordRules"
                dense
              ></v-text-field>
              <p class="mb-0">Confirm New Password</p>
              <v-text-field
                v-model="model.new_password_confirmation"
                type="password"
                :rules="confirmedRule"
                dense
              ></v-text-field>
            </v-card-text>
            <v-card-actions>
              <v-btn
                type="submit"
                :loading="isLoading"
                block
                color="primary"
                elevation="0"
                :disabled="!isFormValid"
                v-text="'Save'"
              />
            </v-card-actions>
          </v-card>
        </v-form>
      </v-col>

    </v-row>

  </div>
</template>

<script>
import CSimpleAppBar from "../../components/CSimpleAppBar";

export default {
  name: 'MembershipIndex',
  components: {CSimpleAppBar},
  layout: 'home',
  data: () => ({
    isFormValid: false,
    isLoading: false,
    model: {
      old_password: '',
      new_password: '',
      new_password_confirmation: '',
    },
  }),

  computed: {
    passwordRules() {
      return [
        v => !!v || 'This field is required',
        v => (v && v.length >= 8) || 'Must be at least 8 characters.',
      ]
    },
    confirmedRule() {
      return [
        v => !!v || 'This field is required',
        v => (v && v.length >= 8) || 'Must be at least 8 characters.',
        v => (v && v === this.model.new_password) || 'Password does not match.',
      ]
    }
  },

  methods: {
    onSubmit() {
      const isInvalid = !this.$refs.updatePinForm.validate()
      if (isInvalid) {
        return
      }

      this.isLoading = true

      this.$axios.post('/api/profile/password', this.model)
        .then((res) => {
          this.$notifier.showMessage({
            content: res.data?.message,
            color: "success"
          });
          this.$router.back()
        })
        .catch((err) => {
          this.$notifier.showMessage({
            content: err.response.data?.message,
            color: "error"
          });
        })
        .finally(() => {
          this.isLoading = false
        })
    }
  }
}
</script>
