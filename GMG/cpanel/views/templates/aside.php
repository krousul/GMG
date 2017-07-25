<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="<?= URL_VIEWS."principal.php"?>"><span class="highlight">GMG</span> CPanel</a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
    
      <li class="dropdown <?php echo $secciones = ($secciones == 'active') ? 'active' : '';?>">
        <a href="#">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Secci&oacute;nes</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Secci&oacute;nes</li>
            <li><a href="#" onclick="xajax_redirect('servicios');">Servicios</a></li>
            <li><a href="#" onclick="xajax_redirect('equipo');">Equipo</a></li>
            <li><a href="#" onclick="xajax_redirect('propiedades');">Propiedades</a></li>
            <li><a href="#" onclick="xajax_redirect('inversiones');">Inversiones</a></li>
            <li class="line"></li>
          </ul>
        </div>
      </li>
      
     <li class="dropdown <?php echo $gereral = ($gereral == 'active') ? 'active' : '';?>">
        <a href="#">
          <div class="icon">
            <i class="fa fa-cube" aria-hidden="true"></i>
          </div>
          <div class="title">Configuraci&oacute;n Generales</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Configuraci&oacute;n Generales</li>
            <li><a href="#" onclick="xajax_redirect('banner');"> Banner Principal</a></li>
            <li class="line"></li>
          </ul>
        </div>
      </li>
      
     <li class="dropdown <?php echo $admin = ($admin == 'active') ? 'active' : '';?>">
        <a href="#">
          <div class="icon">
            <i class="fa fa-file-o" aria-hidden="true"></i>
          </div>
          <div class="title">Administraci&oacute;n</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Administraci&oacute;n</li>
            <li><a href="#" onclick="xajax_redirect('idioma');"> Idioma</a></li>
            <li><a href="#" onclick="xajax_redirect('usuario');"> Usuarios</a></li>
            <li class="line"></li>
          </ul>
        </div>
      </li>
        
    </ul>
  </div>
  <div class="sidebar-footer">
    <ul class="menu">
      <li><a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a></li>
    </ul>
  </div>
</aside>