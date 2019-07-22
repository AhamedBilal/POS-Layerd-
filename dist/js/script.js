let myChart = document.getElementById('myChart').getContext('2d');

// Global Options

let massPopChart = new Chart(myChart, {
    type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data:{
        labels:['Jan', 'Feb', 'March', 'April', 'May', 'June'],
        datasets:[{
            label:'Orders',
            data:[
                1000,
                450,
                500,
                400,
                800,
                100
            ],
            //backgroundColor:'green',
            backgroundColor:[
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)',
                'rgba(255, 159, 64, 0.6)',
                'rgba(255, 99, 132, 0.6)'
            ],
            borderWidth:1,
            borderColor:'#777',
            hoverBorderWidth:3,
            hoverBorderColor:'#000'
        }]
    },
    options:{
        title:{
            display:true,
            text:'Sales',
            fontSize:25,
        },
        legend:{
            display:false,
            position:'right',
            labels:{
                fontColor:'#000'
            }
        },
        layout:{
            padding:{
                left:50,
                right:0,
                bottom:0,
                top:0
            }
        },
        tooltips:{
            enabled:true
        }
    }
});
let myChart2 = document.getElementById('myChart2').getContext('2d');

// Global Options

let massPopChart2 = new Chart(myChart2, {
    type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data:{
        labels:['Item1', 'Item2', 'Item3', ,'Item5','Item5','Item7'],
        datasets:[{
            label:'Stocks',
            data:[
                1000,
                450,
                500,
                400,
                450,
                500,
                100,

            ],
            //backgroundColor:'green',
            backgroundColor:[
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(255, 99, 132, 0.6)'
            ],
            borderWidth:1,
            borderColor:'#777',
            hoverBorderWidth:3,
            hoverBorderColor:'#000'
        }]
    },
    options:{
        title:{
            display:true,
            text:'Stocks',
            fontSize:25,
        },
        legend:{
            display:false,
            position:'left',
            labels:{
                fontColor:'#000'
            }
        },
        layout:{
            padding:{
                left:50,
                right:0,
                bottom:0,
                top:0
            }
        },
        tooltips:{
            enabled:true
        }
    }
});