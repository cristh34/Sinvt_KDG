<?php
$headrole = $_session->get_user_role();
if($headrole == 1)
  $as = 'Administrador';
elseif($headrole == 2)
  $as = 'General Supervisor';
elseif($headrole == 3)
  $as = 'Supervisor';
elseif($headrole == 4)
  $as = 'Vendedor';
?>


     

<!-- partial:index.partial.html -->
<div class="dashboard-container">
  <div class="sidebar">
      <div class="sidebar-avatar">
        <div class="sidebar-avatar-photo avatar">
        <a href="http://localhost/Sinvt_KDG/index.php" target='_blank'><img src="media/img/icono.png" width="90" height="60" alt="Inventario" /></a>
        </div>
        <div class="sidebar-avatar-user">
          <span class="sidebar-avatar-name"><?php echo $as; ?></span>
          <i class="arrow bottom"></i>
        </div>
      </div>
      <div class="sidebar-menu main">
        <h3 class="sidebar-title">Menu</h3>
        <ul class="sidebar-items">
          <?php
        // Home only for Admin and General Supervisor (Stats)
              if($headrole == 1 || $headrole == 2) {
              ?>     
                <li class="sidebar-item"><a href="home.php" title="Inicio" class="sidebar-link"><i class="fa fa-home icon-sidebar"></i><span class="sidebar-link-concept"> Inicio</span></a></li>
              <?php
              }
              ?>
              
              <li class="sidebar-item"><a href="items.php" title="Productos" class="sidebar-link"><i class="fa fa-briefcase icon-sidebar"></i><span class="sidebar-link-concept">Productos</span></a></li>
          <?php
        // Add Item only for Admin, General Supervisor and Supervisor
        if($headrole == 1 || $headrole == 2 || $headrole == 3){
        ?>
          
            <label for="">  <span class="sidebar-link-concept">Anexar Prod</span></label>
            
            
              <li class="sidebar-item"><a href="new-item.php" title="Nuevo Producto" class="sidebar-link"><i class="fa fa-plus"></i><span class="sidebar-link-concept">New Product</a></span></li>
             <?php
              }
              ?>
              <label for=""><span class="sidebar-link-concept">Detalles</span></label>
                        
              <li class="sidebar-item"><a href="check-in.php" title="Ver Entradas" class="sidebar-link"><i class="fa fa-arrow-down"></i><span class="sidebar-link-concept">Entradas</span></a></li>

              <li class="sidebar-item"><a href="check-out.php" title="CVer Salidas" class="sidebar-link"><i class="fa fa-arrow-up"></i><span class="sidebar-link-concept">Salidas</span></a></li>

            <?php
        // Add Item only for Admin, General Supervisor and Supervisor
            if($headrole == 1 || $headrole == 2 || $headrole == 3){
            ?>

            <li class="sidebar-item"><a href="logs.php" title="Logs" class="sidebar-link"><i class="fa fa-file-text-o"></i><span class="sidebar-link-concept">HistE/S</span></a></li>
                     
            <?php
            }
            ?>
            <li class="sidebar-item"><a href="categories.php" title="Categorias" class="sidebar-link"><i class="fa fa-folder"></i><span class="sidebar-link-concept">Categorias</span></a></li>
          
        </ul>
      </div>
      <div class="sidebar-menu admin">
        <h3 class="sidebar-title">Admin</h3>
        <ul class="sidebar-items">
          <li class="sidebar-item">
            <a href="#" class="sidebar-link">
              <i class="fa fa-users icon-sidebar"></i>
              <span class="sidebar-link-concept">user</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link">
              <i class="fa fa-map-marker icon-sidebar"></i>
              <span class="sidebar-link-concept">locations</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link">
              <i class="fa fa-sitemap icon-sidebar"></i>
              <span class="sidebar-link-concept">workflows</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link">
              <i class="fa fa-file-o icon-sidebar"></i>
              <span class="sidebar-link-concept">jobboards</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a href="#" class="sidebar-link">
              <i class="fa fa-share-alt icon-sidebar"></i>
              <span class="sidebar-link-concept">social</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="sidebar-menu admin">
        <h3 class="sidebar-title">Categories</h3>
        <ul class="sidebar-items">
          <li class="sidebar-item">
            <label class="field-checkbox is-yellow">
              <input class="checkbox" type="checkbox" />
              <i class="checkbox-tip"></i> Administrative
            </label>
          </li>
          <li class="sidebar-item">
            <label class="field-checkbox is-blue">
              <input class="checkbox" type="checkbox" />
              <i class="checkbox-tip"></i> Design
            </label>
          </li>
          <li class="sidebar-item">
            <label class="field-checkbox is-pink">
              <input class="checkbox" type="checkbox" />
              <i class="checkbox-tip"></i> Executive
            </label>
          </li>
          <li class="sidebar-item">
            <label class="field-checkbox is-green">
              <input class="checkbox" type="checkbox" />
              <i class="checkbox-tip"></i> Human Resource
            </label>
          </li>
        </ul>
      </div>
    
    <div class="content">
      
    </div>
   
    
</div>
<div id="conten">
 <ul class="toolbar">
        <li class="toolbar-item">
          <button class="button button-toolbar">
            <i class="icon-content icon-hamburguer fa fa-bars"></i>
            
          </button>
        </li>
        <li class="toolbar-item long">
          <input type="text" class="field-text field-text-search" value=""></input>
        </li>
        <li class="toolbar-item">
          <button class="button button-toolbar">
            <i class="icon-content icon-user fa fa-user-plus"></i>
          </button>
        </li>
        <li class="toolbar-item">
          <button class="button button-toolbar">
            <i class="icon-content icon-calendar fa fa-calendar-times-o"></i>
          </button>
        </li>
        <li class="toolbar-item border-right">
          <button class="button button-toolbar">
            <i class="icon-content icon-grid toolbar-item-icon fa fa-th"></i>
          </button>
        </li>
      </ul>
      <div class="header">
        <div class="header-intro"> 
          <div class="header-left">
            <h1 class="header-left-title">SISTEMA DE GESTIÓN DE INVENTARIO</h1>
            <i class="fa fa-map-marker icon-content"></i>
            <span class="header-left-city">KDG, CA</span>
            <a class="header-left-link" href="#">kdg.com</a>
          </div>
          <ul class="header-right">
            <li class="header-right-item">
              <button class="button button-header-right-item-open">open</button>
            </li>
            <li class="header-right-item">
              <button class="button button-header-right-item">
                <i class="icon-content fa fa-flag"></i>
              </button>
            </li>
            <li class="header-right-item">
              <button class="button button-header-right-item">
                <i class="icon-content fa fa-pencil"></i>
              </button>
            </li>
            <li class="header-right-item">
              <button class="button button-header-right-item">
                <i class="icon-content fa fa-trash"></i>
              </button>
            </li>
          </ul>
        </div>
        <ul class="header-navigation">
          <li class="navigation-item">
            
            <input type="hidden" placeholder="..................." />...................
            
          </li>
          <li class="navigation-item">
            <input type="hidden" placeholder="..................." />...................
          </li>
          <li class="navigation-item">

            <input type="hidden" placeholder="..................." />...................
          </li>
          <li class="navigation-item">
            <input type="hidden" placeholder="..................." />...................
          </li>

          <li class="navigation-item">
            <?php
        if($headrole == 1 || $headrole == 2 || $headrole == 3)
          echo '<a href="users.php" class="navigation-item-link" title="Users">Usuarios</a>';
        ?>
          </li>
          <li class="navigation-item">
            <a href="settings.php" class="navigation-item-link" title="Settings">Configuración</a>
          </li>
          <li class="navigation-item">
            <a href="logout.php" class="navigation-item-link" title="Logout">Salir</a>
          </li>
        </ul>

</div>
<div class="data-information">

       <div>
          <span hidden="hidden">Error oculto</span>

        </div>
    