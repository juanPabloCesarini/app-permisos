<?php require RUTA_APP .'/views/inc/header_sugar.php';?>
	<div class="container-fluid">
		<div class="row no-gutter">
			<div class="d-none d-md-flex col-md-4 col-lg-8 bg-image1" style="background-image: url('<?php echo RUTA_URL;?>/img/imgsugar.jpg');"></div>
				<div class="col-md-8 col-lg-4" style="background: rgba(235,170,245,0.7);">
					<div class="row justify-content-center px-3">
						<a href="<?php echo RUTA_URL;?>/FSF/login/" target="_blank" class="btn btn-dark">Acceso sugarAPP</a>
					</div>
					<div class="row justify-content-center px-3">
						 <img id="logo" src="<?php echo RUTA_URL;?>/img/logoSugar.png">
					</div>
					<div class="login d-flex align-items-center py-2">
						<div class="container">
							<div class="row">
								<div class="col-md-9 col-lg-8 mx-auto">
									<h3 class="login-heading mb-3 text-center display-4">Bienvenidos</h3>
										<div class="contenedor-formulario">
										<div class="wrap">
											<form class="formulario" action="usuarioAPP/controladores/login.php" method="POST" name="Nform">
												<div class="input-group">
													<input type="text" name="usuario" id="usuario">
													<label class="label" for="usuario">Usuario</label>
												</div>
												<div class="input-group">
													<input type="password" id="pass"  name="clave">
													<label class="label" for="pass">Contraseña</label>
												</div>
												<div class="text-center">
													<a class="small" href="usuarioAPP/vistas/blanqueo_clave.php">Olvidé mi contraseña</a>
												</div>
											<button class="btn btn-lg btn-block btn-submit text-uppercase font-weight-bold mb-2" type="submit">Iniciar Sesión</button>
											<?php require RUTA_APP .'/views/inc/errores.php';?>
										</form>
										<a href="usuarioAPP/vistas/form_crear_usuario.php" class="btn btn-lg btn-block btn-href text-uppercase font-weight-bold mb-2">Soy nuevo</a>
									</div>
								</div>
								
							</div>
							
							
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo RUTA_URL;?>/js/jquery-3.5.1.min.js"></script>
	<script src="<?php echo RUTA_URL;?>/js/formulario.js"></script>
	<script src="<?php echo RUTA_URL;?>/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>
