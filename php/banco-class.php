<?php 

require 'config.php';


class ClassBanco{

	public function buscaDadoSeguidores($id){	
	//select 
		global $pdo;
	 	$sql =  "SELECT id_seguidor FROM relacionamento  WHERE id_relacionamento = $id";
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
	//insert
		global $pdo;
		$sql = "INSERT INTO relacionamento (id_user, id_seguidor) VALUES( ".$id_user.", ".$id_seguidor.")";
		//echo $sql;
		$sql = $pdo->query($sql);
	}

}
?>