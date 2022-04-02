<template>
  <div>
    <c-simple-app-bar
      title="Update PIN"
      link="/profile"
    >
    </c-simple-app-bar>
    <v-row
      justify="center"
      align="center"
      dense
    >
      <v-col cols="12" sm="3">
        <v-card flat class="py-2 px-3">
          <v-card-title>
            Change PIN
          </v-card-title>
          <v-card-subtitle>
            Enter you current and new PIN below.
          </v-card-subtitle>
          <v-card-text>
            <v-form
              ref="form"
            >
              <p class="mb-0">Current PIN</p>
              <v-text-field
                v-model="model.current_pin"
                type="number"
                solo
                dense
              ></v-text-field>
              <p class="mb-0">New PIN</p>
              <v-text-field
                v-model="model.new_pin"
                type="number"
                solo
                dense
              ></v-text-field>
              <p class="mb-0">Confirm New PIN</p>
              <v-text-field
                v-model="model.confirm_new_pin"
                type="number"
                solo
                dense
              ></v-text-field>
            </v-form>
          </v-card-text>
          <v-card-actions>
            <v-btn
              block
              rounded
              color="primary"
              elevation="0"
            >
              Save
            </v-btn>
          </v-card-actions>
          <v-card-actions>
            <v-btn
              block
              rounded
              elevation="0"
              text
            >
              Reset
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>

    </v-row>

  </div>
</template>

<script>
import CSimpleAppBar from "../../components/CSimpleAppBar";

export default {
  components: {CSimpleAppBar},
  layout: 'home',
  name: 'MembershipIndex',
  data: () => ({
    model: {
      current_pin: '',
      new_pin: '',
      confirm_new_pin: '',
    }
  })
}
</script>
