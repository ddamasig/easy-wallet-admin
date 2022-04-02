<template>
  <div class="white text-center py-3 fill-height rounded">
    <!-- Chart -->
    <highchart :options="options"></highchart>
  </div>
</template>

<script>
export default {
  data: () => ({
    options: {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
      },
      title: {
        text: 'Sales by Service'
      },
      subtitle: {
        text: 'Month of March'
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
        point: {
          valueSuffix: '%'
        }
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: false
          },
          showInLegend: true
        }
      },
      series: [{
        name: 'Service',
        colorByPoint: true,
        data: [{
          name: 'Ticketing',
          y: 61.41,
          sliced: true,
          selected: true,
          color: '#f55258'
        }, {
          name: 'E-Loading',
          y: 11.84,
          color: '#4CAF50'
        }, {
          name: 'Pay Bills',
          y: 10.85,
          color: '#FF9800'
        }, {
          name: 'Money Transfer',
          y: 4.67,
          color: '#4fbac7'
        }]
      }]
    }
  })
}
</script>
