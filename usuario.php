
	
	<?php
        class Usuario{
           public $nome;
		public $email;
			private $senha;
			
			function Usuario(){
				$this->nome;
				$this->senha;
				$this->email;
			}
			
			public function getNome(){
		return $this->nome;
	}
			public function setNome($nome){
		$this->nome = $nome;
	}
			
			public function getEmail(){
		return $this->email;
	}
			public function setEmail($email){
		$this->email = $email;
	}
			
			public function getSenha(){
		return $this->senha;
	}
			public function setSenha($senha){
		$this->senha = $senha;
	}
			
				
        } 
	
	?>
