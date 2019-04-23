<?php
if(!isset($_SESSION['Usuario'])){
	header("location:Inicio");
}
?>

<main class="profile-page">
    <section class="section-profile-cover section-shaped my-0" style="background-color: #F1F1F1">
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
<section class="section">
        <div class="container">
            <div class="card card-profile shadow mt--300">
                <div class="px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">

                                <form action="cargarFotoPerfilUsuario" method="POST" autocomplete="off" enctype="multipart/form-data">
                                	<?php
                                	require_once 'modelo/DTO/UsuarioDTO.php';
                                	$user = unserialize($_SESSION["Usuario"]);
                                	echo '<input type="hidden" value="' . $user->getId() . '" name="idUsuario" id="idUsuario" />
                                	<input type="hidden" value="' . $user->getFoto() . '" name="fotoActualUsuario" id="fotoActualUsuario" />
                                	<label id="fotoUsuario" for="imagen" data-toggle="tooltip" title="Cambiar Foto">
                                	<img src="' . $user->getFoto() . '" class="rounded-circle fotoPerfilUsuario">
                                	</label>';
                                	?>
                                    <input id="imagen" name="imagen" type="file" required />
                                    <div id="opcionesActualizarFoto">
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <button type="submit" id="btnActualizarFotoUsuario" class="btn btn-success ml-4"><i class="fas fa-check"></i></button>
                                        <a href="Perfil" id="btnCancelarActualizarFotoUsuario" class="btn btn-danger ml-4"><i class="fas fa-times-circle"></i></a>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                            <div class="card-profile-actions py-4 mt-lg-0">
                                <a href="#" class="btn btn-sm btn-info mr-4"><i class="fas fa-edit mr-2"></i>Editar</a>
                                <a href="Salir" class="btn btn-sm btn-default float-right"><i class="fas fa-power-off mr-2"></i> Salir</a>
                            </div>
                        </div>
                        <div class="col-lg-4 order-lg-1">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div>
                                    <span class="heading">0</span>
                                    <span class="description">Publicaciones</span>
                                </div>
                                <div>
                                    <span class="heading">0</span>
                                    <span class="description">Seguidores</span>
                                </div>
                                <div>
                                    <span class="heading">0</span>
                                    <span class="description">Seguidos</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                    	<?php
                    	require_once 'modelo/DTO/UsuarioDTO.php';
                    	$user = unserialize($_SESSION["Usuario"]);
                    	echo '
                    	<section>
                    	<h5>@'.$user->getUsuario().'</h5>
                    	<p><b>'.$user->getNombre().'</b></p>
                    	<p><b>'.$user->getCorreo().'</b></p>
                    	<br>
                    	<p>Descripción</p>
                    	</section>';
                    	?>
                    </div>

                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fas fa-images mr-2"></i>Mis Publicaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-tags mr-2"></i>Etiquetas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fas fa-edit mr-2"></i>Actualizar Datos</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active row" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <span class="alert-inner--icon"><i class="fas fa-info-circle"></i></span>
                                        <span class="alert-inner--text"><strong>Información!</strong> Ahora puedes empezar a publicar tus fotos para que tus amigos puedan verlas</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <p class="description">Fotos (Publicaciones)</p>
                                </div>
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <span class="alert-inner--icon"><i class="fas fa-info-circle"></i></span>
                                        <span class="alert-inner--text"><strong>Información!</strong> Si olvido su contraseña, cambiela por una más segura y facil de recordar.</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="col-lg-8 mx-auto">
                                        <form role="form" method="POST" id="formCambiarContrasenia">
                                            <div class="form-group mb-3">
                                                <?php
                                                echo '<input type="hidden" name="actualizarContraseniaId" id="actualizarContraseniaId" value="' . $user->getId() . '">';
                                                ?>
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                    </div>
                                                    <input class="form-control" name="contraseniaActual" id="contraseniaActual" placeholder="Contraseña Actual" type="password" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                    </div>
                                                    <input class="form-control" name="contraseniaNueva" id="contraseniaNueva" placeholder="Contraseña Nueva" type="password" required>
                                                </div>
                                            </div>
                                            <div class="text-muted font-italic" id="alertaSeguridad2">
                            </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary my-4"><i class="fas fa-sync-alt mr-2"></i> Cambiar</button>
                                    </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <span class="alert-inner--icon"><i class="fas fa-info-circle"></i></span>
                                        <span class="alert-inner--text"><strong>Información!</strong> Cambie los datos que desea actualizar, los cambios se reflejan al instante.</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="col-lg-8 mx-auto">
                                        <form role="form" method="POST" id="formActualizar">
                                            <div class="form-group mb-3">
                                                <?php
                                                require_once 'modelo/DTO/UsuarioDTO.php';
                                                $user = unserialize($_SESSION["Usuario"]);
                                                echo '<input type="hidden" name="actualizarId" id="actualizarId" value="' . $user->getId() . '">';
                                                ?>
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                                    </div>
                                                    <?php
                                                    echo '<input class="form-control" name="actualizarNombres" id="actualizarNombres" placeholder="Nombre" type="text" value="' . $user->getNombre() . '"  required>';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <?php
                                                    echo '<input class="form-control" name="actualizarCorreo" id="actualizarCorreo" placeholder="Correo" value="' . $user->getCorreo() . '" type="text" required>';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <?php
                                                    echo '<input class="form-control" name="actualizarUsuario" id="actualizarUsuario" placeholder="Usuario" value="' . $user->getUsuario() . '" type="text" required>';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary my-4"><i class="fas fa-sync-alt mr-2"></i> Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>