<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Agrega estilos adicionales aquí, si es necesario */
body {
  margin: 0;
  font-family: 'Arial', sans-serif;
}

.content {
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 20px;
  margin-top: 20px;
}

@media (max-width: 768px) {
  .sidebar {
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    z-index: 1000;
    overflow-x: hidden;
    overflow-y: auto;
  }

  .main-content {
    flex: 1;
    margin-left: 0;
  }
}

  </style>
  <title>Dashboard con Bootstrap</title>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block sidebar" style="background-color: #00d7d0;">
        <div class="sidebar-sticky">
          <h5 class="my-4 text-white">Menú</h5>
          <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link text-white" href="#">Inicio</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#">Estadísticas</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#">Configuración</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#">Ayuda</a></li>
          </ul>
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <header class="d-flex justify-content-between align-items-center p-3 mb-3" style="background-color: #00d7d0;">
          <h1 class="text-white">Dashboard con Bootstrap</h1>
        </header>

        <section class="content p-3">
          <h2>Contenido Principal</h2>
          <p>Bienvenido al dashboard con Bootstrap. Puedes agregar tu contenido principal aquí.</p>
        </section>
      </main>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
