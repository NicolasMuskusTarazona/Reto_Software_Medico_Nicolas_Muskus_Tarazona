<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>

    <style>
      body { background-color: #f4f6f9; }
      .navbar-brand { font-weight: 600; }
      .content-wrapper { padding: 30px 0; }
      
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <div class="container">
        <a class="navbar-brand" href="<?php echo url_for('@homepage') ?>">Software Médico</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo url_for('@paciente') ?>">Pacientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo url_for('@doctor') ?>">Doctores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo url_for('@cita') ?>">Citas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo url_for('@libros') ?>">Catálogo de Libros</a>
            </li>
          </ul>
          <?php if ($sf_user->isAuthenticated()): ?>
            <ul class="navbar-nav">
              <li class="nav-item">
                <span class="nav-link text-light">
                  Hola, <?php echo htmlspecialchars($sf_user->getGuardUser()->getUsername()) ?>
                </span>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo url_for('sf_guard_signout') ?>">Cerrar sesión</a>
              </li>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    </nav>

    <div class="container content-wrapper">
      <?php echo $sf_content ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>