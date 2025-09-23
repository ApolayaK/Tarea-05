<h2>Reporte por Raza y Alineación</h2>

<?= $estilos ?>

<table>
  <colgroup>
    <col style="width: 10%">
    <col style="width: 25%">
    <col style="width: 25%">
    <col style="width: 20%">
    <col style="width: 20%">
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>Super Hero</th>
      <th>Full name</th>
      <th>Race</th>
      <th>Publisher</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($superheros)): ?>
      <?php foreach ($superheros as $row): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['superhero_name'] ?></td>
          <td><?= $row['full_name'] ?></td>
          <td><?= $row['race'] ?></td>
          <td><?= $row['publisher_name'] ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="5" style="text-align:center;">No se encontraron resultados</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
