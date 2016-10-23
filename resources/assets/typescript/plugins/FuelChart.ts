let chart = require('chart.js'),
    context = <HTMLCanvasElement>document.getElementById("myChart"),
    data = JSON.parse(context.dataset['content']);

let lineChart = new chart(context.getContext("2d"), {
    type: 'line',
    data: {
        labels: data.map(data => data.time),
        datasets: [
            {
                label: "Fuel Price",
                fill: true,
                lineTension: 0.1,
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 8,
                pointHitRadius: 10,
                data: data.map(data => data.price),
                spanGaps: true,
            }
        ]
    },
    options: {}
});
