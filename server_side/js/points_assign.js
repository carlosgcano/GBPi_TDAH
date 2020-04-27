$("#chart").kendoChart({
  dataSource: {
    data: subject_pie
  },
  title: {
    align: "center",
    text: "Subjects"
  },
  legend: {
    visible: false
  },
  seriesDefaults: {
    type: "pie",
    labels: {
      visible: false,
      background: "transparent"
    }
  },
  series: [{
    field: "value",
    colorField: "userColor"
  }],
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

function get_slice_colors() {
    var res = [];
    var chart_slices_values = Object.entries($("#chart").data("kendoChart"))[18][1][0];
    for (var i=0; i < chart_slices_values.data.length ; ++i){
      res.push(Object.values(chart_slices_values.data)[i].userColor);       
    }
    return res; 
}


