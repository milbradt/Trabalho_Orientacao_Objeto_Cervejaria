<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="../estilos/login.css">
	</head>

	<?php 

		$DIR = $_SERVER['DOCUMENT_ROOT'];

		require_once( $DIR .'/controller/geral/ControllerSession.php'); 
		require_once( $DIR .'/controller/usuario/ControllerUsuario.php');

		new ControllerUsuario;

	?>

	<body>
	
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-2"></div>
				<div class="col-lg-6 col-md-8 login-box">
					<div class="col-lg-12 login-key">
						<i class="fa fa-key" aria-hidden="true"></i>
					</div>
					<div class="col-lg-12 login-title">
						PAINEL ADMIN
					</div>

					<div class="col-lg-12 login-form">
						<div class="col-lg-12 login-form">
							<form method ="post" action="../../controller/usuario/ControllerUsuario.php" id="form" name="form" onsubmit="validar(document.form); return false;">
								<div class="form-group">
									<label class="form-control-label">CPF</label>
									<input type="text" name="cpf" class="form-control">
								</div>
								<div class="form-group">
									<label class="form-control-label">SENHA</label>
									<input type="password" name="senha" class="form-control" i>
								</div>

								<div class="col-lg-12 loginbttm">
									<div class="col-lg-6 login-btm login-button">
										<button type="submit" name="submit" class="btn btn-outline-primary">ENTRAR</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-3 col-md-2"></div>
				</div>
			</div>
			
		</div>
		
		<script language="javascript" type="text/javascript">

			function validar(formulario) {

				for (i = 0; i <= formulario.length - 2; i++) {
					if ((formulario[i].value == "")) {
						alert("Preencha o campo " + formulario[i].name);
						formulario[i].focus();
						return false;
					}
				}

				formulario.submit();
				
			}

		</script>

	</body>

</html>