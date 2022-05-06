<header class="encabezado">
        <a href="home.php" class="logo"><img src="../../../imagenes/skateordielogo3.png" width="70px" height="70px" alt="SK8 OR DIE"></a>
        <div class="navigation">
            <ul class="menu">
                <div class="close-btn"></div>
                <!-- Items del menu -->
                <li class="menu-item">
                    <a href="home.php" class="btn-noList">Inicio</a></li>
                <li class="menu-item">
                    <a href="#" class="sub-btn">Skates&nbsp;<i class="fas fa-angle-down"></i></a>
                    <ul class="sub-menu">
                        <li class="sub-item more">
                            <a href="#" class="more-btn">Skateboards <i class="fas fa-angle-right"></i></a>
                            <ul class="more-menu">
                                <li class="more-item"><a href="../Pagina/CatalogoSkateBoardsCompleto.php"><img src="../../../imagenes/Skateboard-Logo-Vector.png" width="20px" height="20px" alt=""> Completos</a></li>
                                <li class="more-item"><a href="../Pagina/CatalogoSkateBoardsTablas.php"><img src="../../../imagenes/Tabla.png" width="20px" height="20px" alt=""> Tablas</a></li>
                                <li class="more-item"><a href="../Pagina/CatalogoSkateBoardsEjes.php"><img src="../../../imagenes/logoEje.png" width="20px" height="20px" alt=""> Ejes</a></li>
                                <li class="more-item"><a href="../Pagina/CatalogoSkateBoardsRuedas.php"><img src="../../../imagenes/ruedaIcon.png" width="20px" height="20px" alt=""> Ruedas</a></li>
                            </ul>
                        </li>
                        <li class="sub-item more">
                            <a href="#" class="more-btn">Longboards <i class="fas fa-angle-right"></i></a>
                            <ul class="more-menu">
                                <li class="more-item"><a href="../Pagina/CatalogoLongBoardsCompletos.php"><img src="../../../imagenes/longboard.png" width="20px" height="20px" alt=""> Completos</a></li>
                                <li class="more-item"><a href="../Pagina/CatalogoLongBoardsTablas.php"><img src="../../../imagenes/longboardTabla.png" width="20px" height="20px" alt=""> Tablas</a></li>
                                <li class="more-item"><a href="../Pagina/CatalogoLongBoardsEjes.php"><img src="../../../imagenes/logoEje.png" width="20px" height="20px" alt=""> Ejes</a></li>
                                <li class="more-item"><a href="../Pagina/CatalogoLongBoardsRuedas.php"><img src="../../../imagenes/ruedaIcon.png" width="20px" height="20px" alt=""> Ruedas</a></li>
                            </ul>
                        </li>
                        <li class="sub-item"><a href="../Pagina/CatalogoWaveboards.php">Waveboards</a></li>
                    </ul>
                </li>
                
               
                
                <li class="menu-item">
                    <a href="../Pagina/CatalogoAccesorios.php" class="btn-noList">Accesorios</a>
                </li>
                <li class="menu-item">
                    <a href="#" class="btn-noList" >Sobre nosotros</a>
                </li>
                    <li class="menu-item iconoAcceder">
                    <?php if($_SESSION['usuarioConectado']==true){ ?> 
                        <a href="#" class="sub-btn " style="font-size: 25px; margin-top: 10px;"> <i class="fas fa-user" ></i> <span id="usuarioMenu" style="font-size: 0.67em;"></span> <i class="fas fa-circle" style="color:rgb(0, 255, 0); font-size:0.4em;"></i></a>
                    <?php } else { ?>   
                        <a href="#" class="sub-btn " style="font-size: 25px; margin-top: 10px;"><i class="far fa-user" ></i></a>
                    <?php } ?>  
                        <ul class="sub-menu">
                            
                            <?php if($_SESSION['usuarioConectado']==true){ ?>
                                <li class="sub-item sub-menuUsuarios"><a href="../Pagina/PerfilUsuario.php"><span>Perfil</span> <span><i class="fas fa-user-cog"></i></span></a></li>
                            <?php if($_SESSION['Rol']=='Admin'){ ?>
                                <li class="sub-item sub-menuUsuarios"><a href="../Pagina/Adminitracion.php"><span>Administración</span><span><i class="fas fa-cog"></i></span></a></li>
                            <?php } ?>  
                                <li class="sub-item sub-menuUsuarios"><a href="../Login/desloguearse.php"><span>LogOut</span><span><i class="fas fa-sign-out-alt"></i></span></a></li>                           
                            <?php } else { ?>
                                <li class="sub-item"><a href="../Login/login.php">Login <i class="fas fa-sign-in-alt"></i></a></li>
                                <li class="sub-item"><a href="../Login/registro.php">Registro</a></li>
                            <?php } ?>    
                        </ul>
                    </li>
                    <li class="menu-item iconoCarrito">
                    <?php if($_SESSION['usuarioConectado']==true){ ?> 
                        <a href="Carrito.php" class="btn-noList"  style="font-size: 25px; margin-top: 10px;"><i class="fas fa-shopping-cart"><span style="font-size: 15px;background-color: red;border-radius: 20px;text-align:center;">&nbsp;&nbsp;<span id="numeroCarrito"></span>&nbsp;&nbsp;</span></i></a>
                        <?php } else { ?>
                        <a href="#" class="btn-noList carritoNoConectado"  style="font-size: 25px; margin-top: 10px;"><i class="fas fa-shopping-cart"></i></a>
                    <?php } ?> 
                    </li>
                    
            </ul>
        </div>
        <div class="menu-btn"></div>
    </header>

    <script>


    </script>