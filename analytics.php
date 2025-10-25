<?php
    $conn = new mysqli('localhost', 'root', '', 'liveelect');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/8161412aed.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link rel="icon" href="images/logo.jpg">
    <title>Live Analytics</title>
</head>

<body>
    <div class="container bg-white my-5 p-4 shadow rounded">

        <!-- nav -->
        <nav class="navbar navbar-expand-sm mt-5">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse"               id="collapsibleNavbar">

                    <ul class="navbar-nav d-flex justify-content w-100">
                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="voting.php" class="nav-link">Voting</a></li>
                        <li class="nav-item"><a href="analytics.php" class="nav-link active1">Analytics</a></li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- end of nav -->
        <div class="container mt-3">
            <h2 class="text-center text-primary mb-4">📊 Real-Time Voting Analytics</h2>
            <p class="text-center text-muted mb-5">This dashboard updates automatically every 15 seconds.</p>

            <h3 id="totalVotesDisplay" class="text-center text-muted my-3 bg-info w-50 mx-auto p-2">
            Total Votes Casted: 0
            </h3>

            <div id="charts" class="row g-4">
                <!-- Dynamic charts will load here -->
            </div>
        </div>

        <script>
            Chart.register(ChartDataLabels);
            
            function loadAnalytics() {
            fetch('get_analytics.php?mode=analytics')
                .then(res => res.json())
                .then(data => {
                const container = document.getElementById('charts');
                container.innerHTML = ''; // Clear old charts

                Object.keys(data.positions).forEach(position => {
                    const candidates = data.positions[position];

                // Create card for each position
                const card = document.createElement('div');
                card.className = 'col-md-4';
                card.innerHTML = `
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center text-success mb-3">${position}</h5>
                        <canvas id="${position.replace(/\s+/g, '_')}BarChart"></canvas>
                        <hr>
                        <div class="d-flex justify-content-center align-items-center mx-auto" style="width:300px; height:300px;">
                            <canvas id="${position.replace(/\s+/g, '_')}PieChart" ></canvas>
                        </div>
                    </div>
                </div>
                    `;
                container.appendChild(card);

                // Chart data
                const labels = candidates.map(c => c.name);
                const votes = candidates.map(c => c.votes);
                const totalVotes = votes.reduce((a, b) => a + b, 0);
                const percentages = votes.map(v => totalVotes ? ((v / totalVotes) * 100).toFixed(1) : 0);

                // Colors for pie chart
                const colors = [
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 99, 132, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)'
                ];

                // Create different colors for each candidate
                const dynamicColors = candidates.map(() => {
                const r = Math.floor(Math.random() * 255);
                const g = Math.floor(Math.random() * 255);
                const b = Math.floor(Math.random() * 255);
                return `rgba(${r}, ${g}, ${b}, 0.7)`;
                });

                // Bar chart
                new Chart(document.getElementById(`${position.replace(/\s+/g, '_')}BarChart`), {
                type: 'bar',
                data: {
                    labels,
                    datasets: [{
                    label: 'Total Votes',
                    data: votes,
                    backgroundColor: dynamicColors,
                    borderColor: dynamicColors.map(c => c.replace('0.7', '1')),
                    borderWidth: 1
                    }]
                    },

                    options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true } },
                    plugins: {
                        legend: { display: true },
                        tooltip: { enabled: true },
                        datalabels: {
                        anchor: 'end',
                        align: 'top',
                        formatter: (value) => value
                        }
                    }
                    }

                    });

                    // Pie chart
                    new Chart(document.getElementById(`${position.replace(/\s+/g, '_')}PieChart`), {
                    type: 'pie',
                    data: {
                        labels: labels.map((name, i) => `${name} (${percentages[i]}%)`),
                        datasets: [{
                        data: votes,
                        backgroundColor: colors.slice(0, candidates.length)
                        }]
                    },
                    options: { responsive: true }
                    });
                });
                })
                .catch(err => console.error('Error loading analytics:', err));
            }

            // Auto-refresh every 15 seconds
            setInterval(loadAnalytics, 15000);
            loadAnalytics();

            // Load voting trend over time
            function loadTrends() {
            fetch('get_analytics.php?mode=all')
                .then(res => res.json())
                .then(data => {
                document.getElementById('totalVotesDisplay').textContent =`Total Votes Casted: ${data.overall_total}`;

                const trends = data.trends || [];
                if (trends.length === 0) return;

                const labels = trends.map(row => row.time_slot);
                const votes = trends.map(row => row.votes);

                let trendSection = document.getElementById('trendChartContainer');
                if (!trendSection) {
                    const div = document.createElement('div');
                    div.id = 'trendChartContainer';
                    div.className = 'col-12 mt-5';
                    div.innerHTML = `
                    <div class="card shadow">
                        <div class="card-body">
                        <h5 class="card-title text-center text-info mb-3">🕒 Voting Trend Over Time</h5>
                        <canvas id="trendChart"></canvas>
                        </div>
                    </div>
                    `;
                    document.getElementById('charts').appendChild(div);
                }

                const ctx = document.getElementById('trendChart');
                if (window.trendChartInstance) window.trendChartInstance.destroy();

                window.trendChartInstance = new Chart(ctx, {
                    type: 'line',
                    data: {
                    labels,
                    datasets: [{
                        label: 'Votes Cast',
                        data: votes,
                        fill: true,
                        borderColor: 'rgba(75,192,192,1)',
                        backgroundColor: 'rgba(75,192,192,0.2)',
                        tension: 0.3,
                        pointRadius: 3
                    }]
                    },
                    options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true, title: { display: true, text: 'Votes' } },
                        x: { title: { display: true, text: 'Time (HH:MM)' } }
                    }
                    }
                });
                })
                .catch(err => console.error('Error loading trends:', err));
            }

            // Auto-refresh every 15 seconds
            setInterval(loadTrends, 15000);
            loadTrends();
        </script>

    </div>     
</body>
</html>