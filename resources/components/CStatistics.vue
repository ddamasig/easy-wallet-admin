<template>
  <div class="white text-center py-3 fill-height rounded">
    <!-- Chart -->
    <highchart :options="incomeOptions"></highchart>

    <!-- Filters -->
    <v-row class="justify-center">
      <v-col
        v-for="(timeframe,index) in timeframes"
        :key="index"
        cols="3"
      >
        <v-btn
          rounded
          :color="timeframe.color"
          elevation="0"
          class="text-capitalize"
        >
          {{ timeframe.name }}
        </v-btn>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      timeframes: [
        {
          name: 'Month',
          color: 'transparent',
        }
      ],
      tabs: [
        {
          name: 'Income',
          color: 'black--text',
        },
        {
          name: 'Expense',
          color: 'grey--text',
        },
      ],
      selectedTab: 'Income',
      show: true,
      incomeOptions: {
        chart: {
          type: 'areaspline'
        },
        title: {
          text: 'Monthly Sales per Service'
        },
        subtitle: {
          text: 'March, 2022'
        },
        legend: {
          layout: 'vertical',
          align: 'left',
          verticalAlign: 'top',
          x: 150,
          y: 100,
          floating: true,
          borderWidth: 1,
          backgroundColor: '#ffffff'
        },
        xAxis: {
          categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
          // plotBands: [{ // visualize the weekend
          //   from: 4.5,
          //   to: 6.5,
          //   color: 'rgba(68, 170, 213, .2)'
          // }]
        },
        yAxis: {
          title: {
            text: 'Income (Thousands)'
          },
          gridLineWidth: 0,
        },
        tooltip: {
          shared: true,
          valueSuffix: ' thousand'
        },
        credits: {
          enabled: false
        },
        plotOptions: {
          areaspline: {
            fillOpacity: 0.15
          }
        },
        series: [
          {
            name: 'E-Loading',
            color: '#f55258',
            data: [3, 2, 1, 1, 2, 3, 1, 1, 7, 7, 8, 6, 5, 1, 3, 5, 4, 8, 5, 7, 4, 6, 8, 7, 5, 9, 4, 8, 2, 7, 6],
          },
          {
            name: 'Bills Payment',
            data: [12, 14, 16, 18, 19, 20, 20, 21, 21, 23, 24, 22, 20, 22, 22, 22, 21, 20, 20, 20, 18, 12, 12, 12, 12, 13, 14, 15, 16, 17, 18],
            color: '#4CAF50'
          },
          {
            name: 'Money Transfer',
            data: [12, 9, 10, 11, 10, 11, 10, 11, 11, 12, 12, 10, 10, 9, 9, 11, 11, 11, 10, 12, 12, 10, 11, 9, 12, 9, 10, 10, 12, 11, 12],
            color: '#FF9800'
          },
          {
            name: 'Ticketing',
            data: [16, 16, 13, 17, 17, 19, 24, 24, 25, 26, 28, 30, 31, 33, 34, 28, 26, 17, 17, 28, 19, 20, 12, 29, 31, 33, 36, 37, 39, 42, 45],
            color: '#4fbac7'
          },
          // {
          //   name: 'Expense',
          //   data: [1, 3, 4, 3, 3, 5, 4],
          //   color: 'rgb(246,119,106)'
          // }
        ]
      }
    }
  },
}
</script>
