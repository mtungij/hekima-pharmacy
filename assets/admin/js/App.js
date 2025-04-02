let url = `http://192.168.1.100/pharmacy/admin/get_total_sell`;

fetch(url)
.then(res=>res.json())
.then(data=>{
    let year = [];
    let total_sell = [];
    let total_profit = [];
    let total_expens = [];

    data.forEach(d=>{
        year.push(d.years);
        total_sell.push(d.total_sells);
        total_profit.push(d.total_prof);
    })
    drawGraph(year,total_sell,total_profit);
})


function drawGraph(year,total_sell,total_profit){
    const ctx = document.querySelector('#myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:year,
            datasets: [{
                label: '# Total sells',
                data:total_sell,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            },{
                label: '# Total profit',
                data:total_profit,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 3)',
                    'rgba(54, 162, 235, 3)',
                    'rgba(255, 206, 86, 3)',
                    'rgba(75, 192, 192, 3)',
                    'rgba(153, 102, 255, 3)',
                    'rgba(255, 159, 64, 3)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}



let urls = `http://192.168.1.100/pharmacy/admin/get_expenses`;

fetch(urls)
.then(res=>res.json())
.then(data=>{
    let years = [];
    let total_expenses = [];

    data.forEach(d=>{
        years.push(d.year_list);
        total_expenses.push(d.total_price);
    })
    drawGraphExpenses(years,total_expenses);
})


function drawGraphExpenses(years,total_expenses){
    const ctx = document.querySelector('#myChartExpenses').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:years,
            datasets: [{
                label: '# Total Expenses',
                data:total_expenses,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}


let urls_paylor = `http://192.168.1.100/pharmacy/admin/get_paylor`;

fetch(urls_paylor)
.then(res=>res.json())
.then(data=>{
    let pay_years = [];
    let total_pay = [];

    data.forEach(d=>{
        pay_years.push(d.pay_year);
        total_pay.push(d.total_payrol);
    })
    drawGraphPayrol(pay_years,total_pay);
})


function drawGraphPayrol(pay_years,total_pay){
    const ctx = document.querySelector('#myChartpayrol').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:pay_years,
            datasets: [{
                label: '# Total Paylor',
                data:total_pay,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}