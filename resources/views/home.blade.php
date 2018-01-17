@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active"><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
@stop

@section('content')
  <div class="col-md-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Visitors</h3>
      </div>
      <div class="box-body">
        <div class="chart">
          <canvas id="lineChart" style="height:250px"></canvas>
        </div>
      </div>
    </div>
  </div>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>
<script>
function whatDay(n=0){
  var day = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
  return day[n];
}
function rearrange(){
  var d=  new Date();
  var n =d.getDay();
  var arr = [];
  for(i=0;i<=6;i++){
    if(n>6) n=0;
    arr[i] = whatDay(n);
    n++;
  }
  return arr;
}
$(document).ready(function(){
  //-------------
  //- LINE CHART -
  //--------------
  var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
  var lineChart                = new Chart(lineChartCanvas)
  var lineChartOptions         =  {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }
    var data = {
       labels: rearrange(),
       datasets: [
           {
               label: "Last Week",
               fillColor: "rgba(220,220,220,0.2)",
               strokeColor: "rgba(220,220,220,1)",
               pointColor: "rgba(220,220,220,1)",
               pointStrokeColor: "#fff",
               pointHighlightFill: "#fff",
               data: {{ json_encode($lastWeekVisitors) }}
           },
           {
               label: "This Week",
               fillColor: "rgba(13,172,222, .5)",
               strokeColor: "rgba(13,172,222,1)",
               pointColor: "rgba(13,172,222,1)",
               pointStrokeColor: "#fff",
               pointHighlightFill: "#fff",
               data: {{ json_encode($thisWeekVisitors) }}
           }
       ]
   }
  lineChartOptions.datasetFill = false
  lineChart.Line(data, lineChartOptions)
});
</script>
@stop
