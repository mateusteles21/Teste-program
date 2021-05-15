<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro Cliente</title>
</head>
   <!--CSS bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--JS bootstrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
<body style="background-image: url(milky-way-2695569_960_720.jpg);">

	
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
	
	
	
<!-- criando formulário de teste    -->

<div class="container-fluid form-group" style="margin-top: 10%; border: solid #F9F9F9; border-radius: 20px; width: 50%; ">
<form method="post" class="fuser" style="margin-left: 40%; padding: 5px;">
<h1 style="color: white; margin-left: -120px;">Cadastro de usuário</h1><br>
	<input type="text" name="nomeus" placeholder="Nome:" class="form-control" style="margin-left: -120px;"><br>
	<input type="text" name="email" placeholder="Email:" class="form-control" style="margin-left: -120px;;"><br>
	<input type="text" name="senha" placeholder="Senha:" class="form-control" style="margin-left: -120px;"><br>
	<input type="submit" value="cadastrar" class=".btn-info btn btn-primary" style="margin-left: 5%;">
</form>
</div>

	
<!-- cadastro do usuario -->
<?php
		// inicando conexão
	include 'conexao.php';
	//chamando class
	require_once 'usuario.php';
	// criando obj
	$obj = new Usuario();
	if(isset($_POST['nomeus'])){

try{
$pdo = new PDO($host,$login,$senha);
	$sql ='INSERT INTO `usuarios`( `nome`, `senha`, `email` ) VALUES (?,?,?)';
	//chamando os métodos sets para receber os valores
	$obj->setNome($_POST['nomeus']);
	$obj->setSenha($_POST['senha']);
	$obj->setEmail($_POST['email']);
	
	// retornando valores com get
		$usuario=array($obj->getNome(), $obj->getSenha(),$obj->getEmail());
	
	
	//preparando a estrutura do SQL
	$stmt = $pdo->prepare($sql);
	
	//criando um for para retornar o array
	$x=0; //contador geral
	$y=1; //posicionamento do sql
	for($x;$x<count($usuario);$x++){
	
	$stmt->bindParam($y, $usuario[$x]); //de acordo com os parametros armazenar as informações
		$y++; // inclemento do posicionamento
	}
	if($stmt->execute()){
		echo 'Salvo com sucesso';
	}else{
		echo 'Errou com sucesso';
	}
	}catch(PDOException $ex){
	echo 'Erro: '.$ex->getMessage();
}
	}
?>
<!-- fim do cadastro do usuario -->


</body>
</html>