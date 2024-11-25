<?php
// Beispielhafte Daten für Statistiken
$visitors = 1234; // Besucheranzahl
$sales = 567;     // Verkäufe
$products = 89;   // Verfügbare Produkte
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f7fa;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }
        footer {
            background-color: #343a40;
            color: #fff;
        }
        canvas {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
    </div>
</nav>

<!-- Dashboard Content -->
<div class="container mt-5">
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    <div class="row">
        <!-- Statistikkarten -->
        <div class="col-md-4">
            <div class="card bg-primary text-white text-center">
                <div class="card-body">
                    <h5 class="card-title">Besucher</h5>
                    <p class="card-text display-6"><?php echo $visitors; ?></p>
                    <p class="card-text">heute</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white text-center">
                <div class="card-body">
                    <h5 class="card-title">Verkäufe</h5>
                    <p class="card-text display-6"><?php echo $sales; ?></p>
                    <p class="card-text">heute</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-dark text-center">
                <div class="card-body">
                    <h5 class="card-title">Produkte</h5>
                    <p class="card-text display-6"><?php echo $products; ?></p>
                    <p class="card-text">verfügbar</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Diagramme -->
    <div class="row mt-5">
        <!-- Wöchentliche Statistiken -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Wöchentliche Statistiken</h5>
                    <canvas id="weeklyStatsChart"></canvas>
                </div>
            </div>
        </div>
        <!-- Monatliche/Jährliche Statistiken -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Monatliche und Jährliche Statistiken</h5>
                    <canvas id="monthlyYearlyStatsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center py-3 mt-5">
    <p>&copy; 2024 Admin Dashboard. Alle Rechte vorbehalten.</p>
</footer>

<!-- Chart.js Script -->
<script>
    // Wöchentliche Statistiken
    const weeklyCtx = document.getElementById('weeklyStatsChart').getContext('2d');
    const weeklyStatsChart = new Chart(weeklyCtx, {
        type: 'line',
        data: {
            labels: ['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag'],
            datasets: [
                {
                    label: 'Besucher',
                    data: [1200, 1300, 1100, 1400, 1500, 1600, 1700],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    tension: 0.3
                },
                {
                    label: 'Verkäufe',
                    data: [300, 400, 350, 500, 450, 600, 550],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    tension: 0.3
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Monatliche und jährliche Statistiken
    const monthlyYearlyCtx = document.getElementById('monthlyYearlyStatsChart').getContext('2d');
    const monthlyYearlyStatsChart = new Chart(monthlyYearlyCtx, {
        type: 'bar',
        data: {
            labels: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
            datasets: [
                {
                    label: 'Monatliche Besucher',
                    data: [10000, 12000, 15000, 14000, 13000, 12500, 16000, 17000, 14000, 15000, 15500, 18000],
                    backgroundColor: 'rgba(54, 162, 235, 0.8)',
                },
                {
                    label: 'Jährliche Verkäufe',
                    data: [200, 250, 300, 400, 500, 600, 650, 700, 800, 900, 950, 1000],
                    backgroundColor: 'rgba(75, 192, 192, 0.8)',
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

