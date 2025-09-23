<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reportes personalizados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

  <div class="container py-4">

    <h2 class="text-center mb-4">📊 Reportes personalizados</h2>

    <div class="row g-4">

      <!-- Primer formulario -->
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white fw-bold">
            Filtro de editoras
          </div>
          <div class="card-body">
            <form action="/reportes/publisher" method="post">
              <div class="form-floating mb-3">
                <select name="publisher_id" id="publisher_id" class="form-select">
                  <option value="">Seleccione</option>
                  <?php foreach($publishers as $row): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['publisher_name'] ?></option>
                  <?php endforeach; ?>
                </select>
                <label for="publisher_id">Editora</label>
              </div>
              <div class="text-end">
                <button class="btn btn-outline-success">Generar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Segundo formulario -->
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-header bg-success text-white fw-bold">
            Filtro por razas y alineaciones
          </div>
          <div class="card-body">
            <form action="<?= base_url() . 'reportes/racealignment' ?>" method="post">
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="form-floating">
                    <select name="race_id" id="race_id" class="form-select">
                      <option value="">Seleccione</option>
                      <?php foreach($races as $row): ?>
                        <option value="<?= $row['id'] ?>"><?= $row['race'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <label for="race_id">Razas</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <select name="alignment_id" id="alignment_id" class="form-select">
                      <option value="">Seleccione</option>
                      <?php foreach($alignments as $row): ?>
                        <option value="<?= $row['id'] ?>"><?= $row['alignment'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <label for="alignment_id">Alineaciones</label>
                  </div>
                </div>
              </div>
              <div class="text-end mt-3">
                <button type="submit" class="btn btn-outline-primary">Generar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div> <!-- /row -->

  </div>
</body>
</html>
