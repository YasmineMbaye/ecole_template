
<?php
    session_start();
     ?>
<div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            
           

            <ul class="nav user-menu">
                

                

                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list win-maximize">
                        <img src="assets/img/icons/header-icon-04.svg" alt="">
                    </a>
                </li>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="" width="31"
                                alt="">
                            <div class="user-text">
                                <h6><?php echo ($_SESSION['nom']);?></h6>
                                <p class="text-muted mb-0">Administrateur</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6><?php echo ($_SESSION['nom']);?></h6>
                                <p class="text-muted mb-0">Administrateur</p>
                            </div>
                        </div>
                        
                        <a class="dropdown-item" href="deconnection.php">Logout</a>
                    </div>
                </li>

            </ul>

        </div>