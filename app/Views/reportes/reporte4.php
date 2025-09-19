<?= $estilos ?? '' ?>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">

  <page_header>
    <div style="text-align: right; font-size: 10pt;">
      Página [[page_cu]] de [[page_nb]]
    </div>
  </page_header>

  <page_footer>
    <div style="text-align: center; font-size: 10pt;">
      Filtro de Superhéroes
    </div>
  </page_footer>

  <h2 class="text-center mb-2">Reporte de Superhéroes</h2>

  <table class="table">
    <colgroup>
      <col style="width:5%">
      <col style="width:25%">
      <col style="width:30%">
      <col style="width:25%">
      <col style="width:15%">
    </colgroup>
    <thead>
      <tr class="bg-primary text-light">
        <th>ID</th>
        <th>Nombre</th>
        <th>Alias</th>
        <th>Casa</th>
        <th>Bando</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($rows as $row): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['superhero_name'] ?></td>
          <td><?= $row['full_name'] ?></td>
          <td><?= $row['publisher_name'] ?></td>
          <td><?= $row['alignment'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</page>
