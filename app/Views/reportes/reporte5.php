<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte 5 - Buscador de Héroes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }
    .contenedor {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      max-width: 600px;
      margin: auto;
    }
    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 8px;
    }
    th {
      background-color: #495057;
      color: white;
    }
    button {
      padding: 5px 10px;
      background-color: #495057;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background-color: #343a40;
    }
    .sin-resultados {
      text-align: center;
      color: #888;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="contenedor">
    <h2>Buscar Superhéroe</h2>
    <input type="text" id="buscador" placeholder="Escribe el nombre o alias...">

    <div id="resultados"></div>
  </div>

  <script>
    const buscador = document.getElementById('buscador');
    const resultados = document.getElementById('resultados');

    buscador.addEventListener('input', async () => {
      const nombre = buscador.value.trim();

      if (nombre.length < 2) {
        resultados.innerHTML = '<p class="sin-resultados">Escribe al menos 2 caracteres...</p>';
        return;
      }

      const response = await fetch(`/reportes/r5/ajax?nombre=${encodeURIComponent(nombre)}`);
      const data = await response.json();

      if (data.length === 0) {
        resultados.innerHTML = '<p class="sin-resultados">No se encontraron resultados.</p>';
        return;
      }

      let tabla = `<table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Alias</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>`;

      data.forEach(h => {
        tabla += `
          <tr>
            <td>${h.id}</td>
            <td>${h.superhero_name}</td>
            <td>${h.full_name ?? ''}</td>
            <td>
              <form action="/reportes/r5/pdf" method="post">
                <input type="hidden" name="hero_id" value="${h.id}">
                <button type="submit">Exportar PDF</button>
              </form>
            </td>
          </tr>`;
      });

      tabla += `</tbody></table>`;
      resultados.innerHTML = tabla;
    });
  </script>
</body>
</html>
