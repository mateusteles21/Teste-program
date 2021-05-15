<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<!--CSS bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--JS bootstrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body style="background-image: url(milky-way-2695569_960_720.jpg)">
<br>
	
	
	<!-- menu navbar -->
	<nav class="navbar navbar-expand-lg navbar-light  fixed-top opaque" id="antes">
  
  <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent" style="margin-left: 550px;">
    <ul class="navbar-nav mr-auto" >
      <li class="nav-item active">
        <a class="nav-link scroll" href="login.php" style="color: white;">Login</a>
      </li>
		
		<li class="nav-item">
        <a class="nav-link scroll" href="cadastro.php" style="color: white;">Cadastrar-se</a>
      </li>
		
		<li class="nav-item">
        <a class="nav-link scroll" href="home.php" style="color: white;">Usuários</a>
      </li>
		
		
	  </ul>
	  
	
	  
  </div>
</nav>
	<!-- fim do navbar -->
	
	

<!-- inicio da estrutura do login usuario -->
<div class="container" id="fuser" style="margin-top: 10%; border: solid #F9F9F9; border-radius: 20px; width: 50%; ">
	<div class="row">
		<div class="col-md-3"></div>
		<!-- inicio do formulario de login -->
		<div class="col-md-6">
		<!-- adicionar a logo -->
		<center><h1 style="color: white;">Login Usuário</h1></center><br>
<form method="post">
  <div class="form-group">
    <input type="email" placeholder="Digite seu email" class="form-control" name="emailcl" id="email">
  </div> <br>
  <div class="form-group">
    <input type="password" placeholder="Digite sua senha" class="form-control" name="senhacl" id="pwd">
  </div>
 <div class="form-group">

	<a href="cadastro.php">Cadastre-se</a>
	</div>
	
  <button type="submit" class="btn btn-primary" style="margin-left: 40%;">Login</button>
			</form>
		</div>
		<!-- fim do formulário de login -->
		<div class="col-md-3"></div>
	</div>
</div>
<!-- fim do login cliente -->




<?php
	include 'conexao.php';
	require_once 'usuario.php';
	$usuario =  new Usuario();
	//inicio login usuario
	if(isset($_POST['emailcl'])){
		// declarar campos obrigatorios
		try{
        $pdo = new PDO($host,$login,$senha);
		//declarando variaveis de cheq
			$usuario->setEmail($_POST['emailcl']);
			$usuario->setSenha($_POST['senhacl']);
			$email=$usuario->getEmail();
			$sen=$usuario->getSenha();
		//fim do método de erro
		if(!empty($email) and !empty($sen)){
	
		 //recebendo SQL para consulta do usuario
	 $sql="SELECT * FROM usuarios WHERE email=:e and senha=:s";
	 $stmt= $pdo->prepare($sql);
		$stmt->bindParam(':e',$email);
		$stmt->bindParam(':s',$sen);
		$stmt->execute();
		if($stmt->rowCount()>0){
			//entrar no sistema sessão
			$dado = $stmt->fetch();
			session_start();
			//passando instancias para objeto
			$usuario->setNome($dado['nome']);
			$usuario->setEmail($dado['email']);
			$usuario->setSenha($dado['senha']);
			
			//finalizando instancias
			//chmando informações de autenticação do método get
			$_SESSION['nome']=$usuario->getNome();
			$_SESSION['senha']=$usuario->getSenha();
			$_SESSION['email']=$usuario->getEmail();
			
			//finalizando autenticação do usuario
			// redirecionando para página inicial do sistema
			header("Location: home.php");
			
		}else{
			
			?>
				
			<p class="txt2"><?php echo "Email ou senha incorretos"; ?></p><?php
		}
	 }else{
		?><p class="txt3"><?php echo "Preencha os campos acima"; ?></p><?php
	 }
	 
 }catch(PDOException $ex){
	echo 'Erro: '.$ex->getMessage();
}
	 }
	
	?>
	
	
</body>
</html>