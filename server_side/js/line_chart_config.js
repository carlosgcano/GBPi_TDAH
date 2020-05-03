
$("#chart_score_week").kendoChart({

    title: {
        text: ""
    },

    seriesDefaults: {
        type: "line",
        style: "smooth"
    },
    series: [{
        
        data: score_chart
    }],

    categoryAxis: {
        categories: score_date_chart

    },

});