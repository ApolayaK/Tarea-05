<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informe 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <style>
    .grafico-card {
      max-width: 600px;
      margin: 20px auto;
      padding: 15px;
    }
    canvas {
      max-height: 350px;
    }
  </style>
</head>
<body class="bg-light">

  <div class="container py-4">
    <h1 class="text-center mb-4">📊 Informe Gráfico</h1>

    <!-- Primera tarjeta -->
    <div class="card shadow grafico-card">
      <div class="card-header bg-primary text-white fw-bold">
        Preferencia Musical
      </div>
      <div class="card-body">
        <canvas id="lienzo"></canvas>
      </div>
    </div>

    <!-- Segunda tarjeta -->
    <div class="card shadow grafico-card">
      <div class="card-header bg-success text-white fw-bold">
        Egresados de Ingeniería de Software
      </div>
      <div class="card-body">
        <canvas id="otro-lienzo"></canvas>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const lienzo = document.getElementById('lienzo')
      const otroLienzo = document.getElementById('otro-lienzo')

      // Primer gráfico: barras
      new Chart(lienzo, {
        type: 'bar',
        data: {
          labels: ['Rock','Baladas','Metal'],
          datasets: [
            {data: [15,20,4], label: '2023', backgroundColor: '#007bff'},
            {data: [50,10,8], label: '2024', backgroundColor: '#ffc107'}
          ]
        },
        options: {
          responsive: true,
          plugins: {
            legend: { position: 'top' },
          }
        }
      })

      // Datos del segundo gráfico
      const data = [
        { year: 2010, total: 420},
        { year: 2011, total: 492},
        { year: 2012, total: 470},
        { year: 2013, total: 510},
      ]

      // Segundo gráfico: línea
      new Chart(otroLienzo, {
        type: 'line',
        data: {
          labels: data.map(row => row.year),
          datasets: [{
            data: data.map(row => row.total),
            label: 'Egresados Ing. Software',
            borderColor: '#28a745',
            backgroundColor: 'rgba(40,167,69,0.2)',
            fill: true,
            tension: 0.3
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: { position: 'top' }
          },
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      })
    })
  </script>
</body>
</html>
