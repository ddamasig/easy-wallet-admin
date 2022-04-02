<template>
  <div class="text-center">
    <v-carousel
      v-model="model"
      hide-delimiters
      show-arrows-on-hover
      height="200"
    >
      <v-carousel-item
        v-for="(color, index) in colors"
        :key="index"
      >
        <v-col class="fill-height mt-3">
          <v-card
            flat
            color="grey"
            width="auto"
            class="ma-0 fill-height"
          >
            <v-row
              align="center"
              justify="center"
              class="fill-height text-center"
            >
              <v-col cols="12">
                <v-icon x-large>
                  mdi-play-circle-outline
                </v-icon>
              </v-col>
            </v-row>
          </v-card>
        </v-col>
      </v-carousel-item>
    </v-carousel>
    <small class="text-center font-italic">
      Swipe left/right to switch videos.
    </small>
  </div>
</template>


<script>
export default {
  data: () => ({
    model: 0,
    colors: [
      'primary',
      'secondary',
      'yellow darken-2',
      'red',
      'orange',
    ],
  }),
}
</script>
