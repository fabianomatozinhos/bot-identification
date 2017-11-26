<?php 

require 'config.php';


class ClassBanco{

	public function buscaDadoSeguidores($id){	
	//select 
		global $pdo;
	 	$sql =  "SELECT id_seguidor FROM relacionamento  WHERE id_relacionamento = $id";
		$sql = $pdo->query($sql);

		if ($sql->rowCount() > 0) {
			while ( $value = $sql->fetchAll()) {
				return ($value);
			}
		}else{
			echo "O banco esta vazio!";
		}
	}

	public function gravaDadoUser($id_user,$nome,$user,$quantidade_tweets,$seguidores,$seguindo,$data_cadastro_user){
	//insert
		global $pdo;
		 $sql = "INSERT INTO perfil  VALUES(".$id_user.",'".$nome."','".$user."','".$quantidade_tweets."',".$seguidores.",".$seguindo.",'".$data_cadastro_user."','".date('Y-m-d')."' )";
		$sql = $pdo->query($sql);
	}

	public function gravaDadoTweets($id_tweets,$id_user,$tweets,$data_criacao_tweets){
	//insert
		global $pdo;
		$sql = "INSERT INTO tweets  VALUES(".$id_tweets.",'".$id_user."','".$tweets."','".$data_criacao_tweets."')";
		$sql = $pdo->query($sql);
	}

	public function gravaDadoSeguidor($id_user,$id_seguidor){
		echo "tese33";
	//insert
		global $pdo;
		$sql = "INSERT INTO relacionamento (id_user, id_seguidor) VALUES( ".$id_user.", ".$id_seguidor.")";
		$sql = $pdo->query($sql);
	}
	public function gravaScreenNameSeguidor($id_user,$screen_name){

	//insert
		global $pdo;
		$sql = "UPDATE relacionamento 
					set screen_name = '".$screen_name."'
    				WHERE id_user = ".$id_user;
		$sql = $pdo->query($sql);
	}

	public function buscaidSeguidore($id){	
		//select 
		global $pdo;
	 	$sql =  "SELECT id_user,screen_name FROM relacionamento  WHERE id_relacionamento = $id";
	 	echo $sql;
		$sql = $pdo->query($sql);

		if ($sql->rowCount() > 0) {
			while ( $value = $sql->fetchAll()) {
				return ($value);
			}
		}else{
			echo "O banco esta vazio!";
		}
	}


	public function buscaJsonBotometerTodos(){	
		//select 
		global $pdo;
	 	$sql =  "SELECT * FROM json_botometer WHERE json_extra NOT LIKE '%error%'";
	
		$sql = $pdo->query($sql);

		if ($sql->rowCount() > 0) {
			while ( $value = $sql->fetchAll()) {
				return ($value);
			}
		}else{
			echo "O banco esta vazio!";
		}
	}
	public function buscaBotometer(){	
		//select 
		global $pdo;
	 	$sql =  "SELECT * FROM botometer";
		$sql = $pdo->query($sql);

		if ($sql->rowCount() > 0) {
			while ( $value = $sql->fetchAll()) {
				return ($value);
			}
		}else{
			echo "O banco esta vazio!";
		}
	}
	public function buscaBotometerId($id_user){	
		//select 
		global $pdo;
	 	$sql =  "SELECT * FROM botometer WHERE id_user = $id_user";
		
		$sql = $pdo->query($sql);
		if ($sql->rowCount() > 0) {
			while ( $value = $sql->fetchAll()) {
				return ('cheio');
			}
		}else{
			return ('vazio');
		}
	}
	public function gravaBotometer($id_user, $screen_name, $content, $friend, $network, $sentiment, $temporal, $user, $english, $universal){	
		//select 
		global $pdo;
	 	$sql =  "INSERT INTO botometer VALUES($id_user, '$screen_name', $content, $friend, $network, $sentiment, $temporal, $user, $english, $universal)";
/*	 	echo $sql;
	 	die;*/
		$sql = $pdo->query($sql);

		if ($sql->rowCount() > 0) {
			while ( $value = $sql->fetchAll()) {
				return ('cheio');
			}
		}else{
			return ('vazio');
		}
	}
}
?>