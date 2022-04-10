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
          color: '#4fbac7'
        }, {
          name: 'E-Loading',
          y: 11.84,
          color: '#f55258'
        }, {
          name: 'Pay Bills',
          y: 10.85,
          color: '#4CAF50'
        }, {
          name: 'Money Transfer',
          y: 4.67,
          color: '#FF9800'
        }]
      }]
    }
  })
}
</script>
