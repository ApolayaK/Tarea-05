<?= $estilos ?>
<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">

  <page_header>
    <div style="text-align: right; font-size: 10pt;">
      Página [[page_cu]] de [[page_nb]]
    </div>
  </page_header>

  <page_footer>
    <div style="text-align: center; font-size: 10pt;">
      Reporte de Superpoderes
    </div>
  </page_footer>

  <h2 class="text-center mb-2">Superpoderes de <?= $hero['superhero_name'] ?></h2>
  <h4 class="text-center mb-3">(<?= $hero['full_name'] ?>)</h4>

  <?php if(count($powers) > 0): ?>
    <table class="table">
      <colgroup>
        <col style="width:10%">
        <col style="width:90%">
      </colgroup>
      <thead>
        <tr class="bg-primary text-light">
          <th>#</th>
          <th>Nombre del Poder</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; foreach($powers as $p): ?>
          <tr>
            <td><?= $i++ ?></td>
            <td><?= $p['power_name'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p class="text-center mt-3">Este héroe no tiene poderes registrados.</p>
  <?php endif; ?>

</page>
