<template>
  <v-dialog
    v-model="dialog"
    width="500"
  >
    <template v-slot:activator="{ on, attrs }">
      <v-btn
        color="primary"
        elevation="0"
        class="mr-2"
        small
        fab
        v-bind="attrs"
        v-on="on"
      >
        <v-icon>mdi-content-copy</v-icon>
      </v-btn>
    </template>

    <v-card>
      <v-card-title>
        Generate Referral Link
      </v-card-title>
      <v-card-subtitle>
        Specify which services and products will be included for this invitation.
      </v-card-subtitle>

      <v-card-text>
        <v-form>
          <v-row>
            <v-col cols="12" sm="6">
              <p>Service Inclusions</p>
              <v-switch
                v-for="(item,index) in services"
                :key="index"
                :label="item.name"
                :prepend-icon="item.icon"
                v-model="item.value"
              ></v-switch>
            </v-col>
            <v-col cols="12" sm="6">
              <p>Package Inclusions</p>
              <v-switch
                v-for="(item,index) in packages"
                :key="index"
                :label="item.name"
                v-model="item.value"
              ></v-switch>
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-checkbox
                label="Set this as the default configuration."
              ></v-checkbox>
            </v-col>
          </v-row>
        </v-form>
      </v-card-text>

      <v-divider></v-divider>

      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn
          color="primary"
          @click="dialog = false"
          text
        >
          Cancel
        </v-btn>
        <v-btn
          color="primary"
          @click="dialog = false"
          elevation="0"
        >
          Generate
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  data: () => ({
    dialog: false,
    services: [
      {
        name: 'Money Transfer',
        description: 'Pius mensa cito captiss fraticinida est.',
        icon: 'mdi-credit-card-fast',
        value: true
      },
      {
        name: 'E-Loading',
        description: 'Pius mensa cito captiss fraticinida est.',
        icon: 'mdi-cellphone-text',
        value: true
      },
      {name: 'Ticketing', description: 'Pius mensa cito captiss fraticinida est.', icon: 'mdi-receipt', value: true},
      {
        name: 'Bills Payment',
        description: 'Pius mensa cito captiss fraticinida est.',
        icon: 'mdi-airplane',
        value: true
      },
    ],
    packages: [
      {name: 'Alkaline Drops', description: 'Pius mensa cito captiss fraticinida est.', value: true},
      {name: 'Product 2', description: 'Pius mensa cito captiss fraticinida est.', value: true},
      {name: 'Product 3', description: 'Pius mensa cito captiss fraticinida est.', value: true},
    ]
  })
}
</script>
