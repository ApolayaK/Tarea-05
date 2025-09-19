<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Resultado del Filtro</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 8px;
    }

    th {
      background-color: #495057;
      color: white;
    }
  </style>
</head>
<body>

  <h2>Superhéroes filtrados</h2>

  <?php if (count($heroes) > 0): ?>
    <form action="/reportes/filtro/pdf" method="post" style="margin-bottom: 15px;">
      <input type="hidden" name="publisher_id" value="<?= esc($heroes[0]['publisher_id']) ?>">
      <button type="submit">Exportar a PDF</button>
    </form>
  <?php endif; ?>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Alias</th>
        <th>Publisher</th>
        <th>Bando</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($heroes) > 0): ?>
        <?php foreach($heroes as $h): ?>
          <tr>
            <td><?= $h['id'] ?></td>
            <td><?= $h['superhero_name'] ?></td>
            <td><?= $h['full_name'] ?></td>
            <td><?= $h['publisher_name'] ?></td>
            <td><?= $h['alignment'] ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="5">No se encontraron resultados.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <p><a href="/reportes/filtro">← Volver al filtro</a></p>

</body>
</html>
