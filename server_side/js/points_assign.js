$("#chart").kendoChart({
  dataSource: {
    data: subject_pie
  },
  title: {
    align: "left",
    text: "Comments per day"
  },
  legend: {
    visible: false
  },
  seriesDefaults: {
    type: "pie",
    labels: {
      visible: true,
      background: "transparent"
    }
  },
  series: [{
    color: "red",
    field: "value",
    colorField: "userColor"
  }],
  valueAxis: {
    max: 28,
    majorGridLines: {
      visible: false
    },
    visible: false
  },
  categoryAxis: {
    field: "day",
    majorGridLines: {
      visible: false
    },
    line: {
      visible: false
    }
  },
  seriesClick: onSeriesClick,
  transitions: false
});

function onSeriesClick(e){

  var chart = $("#chart").data("kendoChart");

  switch(e.dataItem.userColor) {
  case "grey":
    e.dataItem.userColor = "green";
    chart.refresh();  
    break;
  case "green":
    e.dataItem.userColor = "yellow";
    chart.refresh();  
    break;
  case "yellow":
    e.dataItem.userColor = "red";
    chart.refresh();  
    break;
  case "red":
    e.dataItem.userColor = "green";
    chart.refresh();  
    break;
  default:
    e.dataItem.userColor = "grey";
    chart.refresh();  
    break;
  } 
}


  //var chart = $("#chart").kendoChart("title");

  //console.log(chart);

