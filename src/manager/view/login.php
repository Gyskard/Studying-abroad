<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="author" content="el pepito">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Etudes à l'étranger - Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../public/login/css/main.css">
    <link rel="stylesheet" type="text/css" href="../public/login/css/my-login.css">
    <link rel=icon href="../public/login/img/earth.png" type="image/png">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<a href="https://iut1.univ-grenoble-alpes.fr/">
                            <img src="../public/login/img/iut_1.png" alt="logo_iut1">
                        </a>
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Connexion</h4>
							<form method="POST" action="../controller/controller_co.php" class="my-login-validation" novalidate="">
								<div class="form-group" id="user-part">
									<label for="user">Nom d'utilisateur</label>
									<input id="user" class="form-control" name="user" value="" required autofocus>
									<div class="invalid-feedback">
										Un nom d'utilisateur est requis!
									</div>
								</div>
								<div class="form-group" id="password-part">
									<label for="password">Mot de passe</label>
									<input id="password" type="password" class="form-control" name="password" value="" required data-eye>
								    <div class="invalid-feedback">
								    	Un mot de passe est requis!
							    	</div>
								</div>
								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Se souvenir</label>
									</div>
								</div>
								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block is-invalid">
										Connexion
									</button>
                                    <div id="notValid" class="erreur">
                                        Le nom d'utilisateur et/ou le mot de passe est invalide!
                                    </div>
                                    <div id="notActif" class="erreur">
                                        Cet utilisateur est désactivé!
                                    </div>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						License MIT &mdash; IUT 1 de Grenoble
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="../public/login/js/main.js"></script>
</body>
</html>