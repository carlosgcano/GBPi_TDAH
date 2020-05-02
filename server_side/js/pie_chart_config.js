$("#chart_subjects_index").kendoChart({
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

  var chart = $("#chart_subjects_index").data("kendoChart");

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
    res.push([]);
    var green=0;
    var yellow=0;
    var red = 0;
    var chart_slices_values = Object.entries($("#chart_subjects_index").data("kendoChart"))[18][1][0];
    for (var i=0; i < chart_slices_values.data.length ; ++i){
      var aux = Object.values(chart_slices_values.data)[i].userColor;
      res[0].push(aux);       
      switch(aux) {
        case "green":
          green++;
          break;
        case "yellow":
          yellow++;
          break;
        case "red":
          red++;
          break;
      }
    }
    res.push([]);
    res[1].push(green, yellow, red);  
    //console.log(JSON.stringify(Object.assign({}, res)));
    return JSON.stringify(Object.assign({}, res));
}


$("#chart_subjects_stats").kendoChart({
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
  transitions: false
});

$("#chart_attitudes_stats").kendoChart({
  dataSource: {
    data: attitudes_pie
  },
  title: {
    align: "center",
    text: "Attitudes"
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
  transitions: false
});