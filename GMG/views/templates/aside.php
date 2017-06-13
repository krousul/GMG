<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="#"><span class="highlight">GMG</span> CPanel</a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
    
      <li class="dropdown <?php echo $secciones = ($secciones == 'active') ? active : '';?>">
        <a href="#">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Secci&oacute;nes</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Secci&oacute;nes</li>
            <li><a href="<?= URL_SECCIONES?>servicios.php">Servicios</a></li>
            <li><a href="<?= URL_SECCIONES?>equipo.php">Equipo</a></li>
            <li><a href="<?= URL_SECCIONES?>propiedades.php">Propiedades</a></li>
            <li><a href="<?= URL_SECCIONES?>Inversiones.php">Inversiones</a></li>
            <li class="line"></li>
          </ul>
        </div>
      </li>
      
       <li class="dropdown <?php echo $redes = ($redes == 'active') ? active : '';?>">
        <a href="#">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Redes Sociales</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Redes Sociales</li>
            <li><a href="<?= URL_REDES?>instagram.php"> Instagram</a></li>
            <li><a href="<?= URL_REDES?>twitter.php"> Twitter</a></li>
            <li class="line"></li>
          </ul>
        </div>
      </li>
      
     <li class="dropdown <?php echo $gereral = ($gereral == 'active') ? active : '';?>">
        <a href="#">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Configuraci&oacute;n Generales</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Configuraci&oacute;n Generales</li>
            <li><a href="<?= URL_CONF_GEN?>banner.php"> Banner Principal</a></li>
            <li><a href="<?= URL_CONF_GEN?>proyectos.php"> Proyectos</a></li>
            <li class="line"></li>
          </ul>
        </div>
      </li>
      
     <li class="dropdown <?php echo $admin = ($admin == 'active') ? active : '';?>">
        <a href="#">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Administraci&oacute;n</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Administraci&oacute;n</li>
            <li><a href="<?= URL_ADMIN?>idioma.php"> Idioma</a></li>
            <li><a href="<?= URL_ADMIN?>Cpanel.php"> Control Panel</a></li>
            <li><a href="<?= URL_ADMIN?>sistema.php"> Sistema</a></li>
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