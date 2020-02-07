<aside class="main-sidebar">
    <!-- Left side column. contains the logo and sidebar -->
    <section class="sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <div class="user-panel">
            <!-- Sidebar user panel -->
            <div class="pull-left image">
                <img src="images/profiles/<?php echo $profile_pic; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $fullname; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <br />
        <ul class="sidebar-menu">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <li class="header">NAVEGACIÓN</li>

            <li class="<?php if (isset($active1)) {
                            echo $active1;
                        } ?>">
                <a href="home.php"><i class="fa fa-user"></i> <span>Mi perfil</span></a>
            </li>

            <?php if (isset($is_admin) && $is_admin == 0) : ?>

            <li class="treeview" style="height: auto;">
                <a>
                    <i class="fa fa-users"></i>
                    <span>Usarios</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="newuser.php"><i class="fa fa-circle-o"></i> Crear</a></li>
                    <li><a  href="users.php"><i class="fa fa-circle-o"></i> Ver Usuarios</a></li>
                </ul>
         </li>
       
            <?php endif; ?>

            <?php if (isset($is_admin) && in_array($is_admin, array(0, 1))) : ?>
              
        <li class="treeview" style="height: auto;">
                <a>
                    <i class="fa fa-exchange"></i>
                    <span>seguimiento Archivos</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="outfile.php"><i class="fa fa-circle-o"></i> Salidas</a></li>
                    <li><a href="return_file.php"><i class="fa fa-circle-o"></i> Retornos</a></li>
                    <li><a href="file_recived.php"><i class="fa fa-circle-o"></i> Listado Archivos Recibidos</a></li>
                </ul>
         </li>

                <li class="">
                    <a href="newfile.php"><i class="fa fa-upload"></i> <span>Nuevo Archivo</span></a>
                </li>

            <?php endif; ?>

            <li class="">
                <a href="search.php"><i class="fa fa-search"></i> <span>Búsqueda Archivos</span></a>
            </li>



        </ul>
    </section>
</aside>