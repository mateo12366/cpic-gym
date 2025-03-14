<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/style_dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="sidebar-content">
        <div class="logo-container">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="32" height="32" stroke-width="2.25"> <path d="M2 12h1"></path> <path d="M6 8h-2a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h2"></path> <path d="M6 7v10a1 1 0 0 0 1 1h1a1 1 0 0 0 1 -1v-10a1 1 0 0 0 -1 -1h-1a1 1 0 0 0 -1 1z"></path> <path d="M9 12h6"></path> <path d="M15 7v10a1 1 0 0 0 1 1h1a1 1 0 0 0 1 -1v-10a1 1 0 0 0 -1 -1h-1a1 1 0 0 0 -1 1z"></path> <path d="M18 8h2a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-2"></path> <path d="M22 12h-1"></path> </svg> 
          <span class="logo-text">GymCPIC</span>
        </div>
        <nav class="menu">
          <ul>
            <li><a href=""><span><i class="fas fa-user-tag"></i><span class="menu-text">Roles</span></span></a></li>
            <li><a href=""><span><i class="fas fa-users"></i><span class="menu-text">Tipo Usuario</span></span></a></li>
            <li><a href=""><span><i class="fas fa-user"></i><span class="menu-text">Usuario</span></span></a></li>
            <li><a href=""><span><i class="fas fa-building"></i><span class="menu-text">Centro de Formación</span></span></a></li>
            <li><a href=""><span><i class="fas fa-graduation-cap"></i><span class="menu-text">Programa de Formación</span></span></a></li>
            <li><a href=""><span><i class="fas fa-users-cog"></i><span class="menu-text">Grupo</span></span></a></li>
            <li><a href=""><span><i class="fas fa-tasks"></i><span class="menu-text">Actividades</span></span></a></li>
            <li><a href=""><span><i class="fas fa-sign-in-alt"></i><span class="menu-text">Registro Ingreso</span></span></a></li>
            <li><a href=""><span><i class="fas fa-chart-line"></i><span class="menu-text">Control Progreso</span></span></a></li>
          </ul>
        </nav>
      </div>
    </aside>
    <main class="main_content">
      <header class="header">
        <button class="menu-toggle"><i class="fas fa-bars"></i></button>
        <h1 class="page-title">Programas</h1>
        <div class="search-container">
          <input type="text" placeholder="Buscar...">
          <i class="fas fa-search"></i>
        </div>
        <div class="header-icons">
          <button><i class="fas fa-user-circle"></i></button>
          <button><i class="fas fa-bell"></i></button>
          <button><i class="fas fa-moon"></i></button>
        </div>
      </header>
      <div class="content">
        <?php
        // Assuming $content is defined elsewhere and contains the path to your content file
        if (isset($content)) {
          include_once $content;
        } else {
          echo "Content not available.";
        }
        ?>
      </div>
    </main>
  </div>
  <script src="/js/script.js"></script>
</body>
</html>