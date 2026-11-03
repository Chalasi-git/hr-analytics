<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HR Attrition Analytics Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; }
        .chart-container { width: 60%; margin: auto; }
    </style>
</head>
<body>
    <div class="container">
        <h2>HR Employee Attrition Analytics Dashboard</h2>
        <div class="chart-container">
            <canvas id="attritionChart"></canvas>
        </div>
    </div>

    <script>
        // PHP වලින් ලබාගත් දත්ත JavaScript වෙත ලබා දීම
        const rawData = <?php echo json_encode($stats); ?>;

        const labels = rawData.map(item => item.Attrition);
        const counts = rawData.map(item => Number(item.count));

        const ctx = document.getElementById('attritionChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Employee Count',
                    data: counts,
                    backgroundColor: ['#36A2EB', '#FF6384']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    title: { display: true, text: 'Employee Attrition Distribution (Yes / No)' }
                }
            }
        });
    </script>
</body>
</html>