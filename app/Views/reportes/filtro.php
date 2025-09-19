<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Filtrar por Publisher</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      background-color: #fff;
      padding: 20px 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      min-width: 300px;
    }
    h2 {
      text-align: center;
    }
    label {
      font-weight: bold;
    }
    select, button {
      width: 100%;
      padding: 8px;
      margin-top: 10px;
      border-radius: 4px;
    }
    button {
      background-color: #333;
      color: #fff;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <form action="/reportes/filtro" method="post">
    <h2>Filtrar Superhéroes</h2>
    <label for="publisher_id">Publisher:</label>
    <select name="publisher_id" required>
      <option value="">-- Selecciona --</option>
      <?php foreach($publishers as $pub): ?>
        <option value="<?= $pub['id'] ?>"><?= $pub['publisher_name'] ?></option>
      <?php endforeach; ?>
    </select>
    <button type="submit">Buscar</button>
  </form>
</body>
</html>
