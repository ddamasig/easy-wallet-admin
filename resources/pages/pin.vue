<template>
  <div>
    <v-app-bar
      flat
      color="transparent"
      class="mb-3"
    >
      <v-app-bar-nav-icon
        class="white"
        @click="$router.push('/')"
      >
        <v-icon>
          mdi-arrow-left
        </v-icon>
      </v-app-bar-nav-icon>
    </v-app-bar>
    <v-card
      class="pa-4 text-center"
      flat
    >
      <v-avatar color="primary">
        <v-icon color="white">mdi-lock</v-icon>
      </v-avatar>
      <v-card-title class="text-center">
       <span class="text-center font-weight-bold flex-fill">
         Enter PIN
       </span>
      </v-card-title>
      <v-card-subtitle>
        Never share your PIN
      </v-card-subtitle>
      <v-card-text>
        <v-form>
          <!-- Amount field -->
          <v-text-field
            class="d-none"
            filled
            rounded
            label="Amount"
            v-model="model.amount"
            type="number"
          >
          </v-text-field>

          <v-row>
            <v-col cols="12">
              <v-icon
                v-for="c in [1,2,3,4]"
                :key="c"
              >
                {{ getIcon(c) }}
              </v-icon>
            </v-col>
          </v-row>

          <v-row class="justify-center">
            <v-col
              v-for="(n, index) in numbers"
              :key="index"
              cols="4"
            >
              <v-btn
                elevation="0"
                color="grey"
                class="font-weight-bold"
                dark
                fab
                @click="handleInput(n)"
              >{{ n }}
              </v-btn>
            </v-col>
          </v-row>

        </v-form>
      </v-card-text>
    </v-card>
  </div>

</template>

<script>
export default {
  layout: 'blank',
  name: 'IndexPage',
  data: () => ({
    numbers: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
    model: {
      pin: '',
    },
  }),
  watch: {
    model: {
      handler(val){
        // Redirect to the summary page after encoding PIN.
        if (this.model.pin.length === 4) {
          let next = '/eloading/success'
          if (this.$route.query.next) {
            next = this.$route.query.next
          }
          this.$router.push(next)
        }
      },
      deep: true
    }
  },
  methods: {
    /**
     * Appends the number parameter to the PIN.
     * @param number
     */
    handleInput(number) {
      if (this.model.pin.length < 4) {
        this.model.pin += number
      }
    },
    /**
     * Returns a shaded or outlined circle icon depending on the index parameter.
     * @param index
     * @returns {string}
     */
    getIcon(index) {
      if (this.model.pin.length >= index) {
        return 'mdi-checkbox-blank-circle'
      }
      return 'mdi-checkbox-blank-circle-outline'
    }
  }
}
</script>

