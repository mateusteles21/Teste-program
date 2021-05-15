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
	
	
	
	
	<div style="margin-top: 10%; border: solid #F9F9F9; border-radius: 20px; width: 50%; margin-left: 25%; padding: 10px;">
		
	<center><h1 style="color: white;">Usuários</h></center><br>
		
	<table style="margin-left: 22%; width: 60%;">
	<tr>
		<th style="color: white;">Nome:</th> 
		<th style="color: white;">Email:</th>
		<th style="color: white;">Senha:</th>
	</tr>
		
	<?php
	include 'conexao.php';
	try{
    $pdo = new PDO($host,$login,$senha);
	$sql ="SELECT * FROM usuarios";
	$stmt = $pdo->prepare($sql);
	
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach($result as $value){
		?>
    	<tr>
		<td style="color: white;"><?php echo $value['nome']; ?></td> 
		<td style="color: white;"><?php echo $value['email']; ?></td>
		<td style="color: white;"><?php echo $value['senha']; ?></td>
		</tr>
	<?php
		
	}
	}catch(PDOException $ex){
	echo 'Erro: '.$ex->getMessage();
}
?>
			
	</table>
	</div>
</body>
</html>