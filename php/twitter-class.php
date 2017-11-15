<?php 

	require("banco-class.php");

	//incluindo biblioteca twitteroauth
	require "twitteroauth/autoload.php";

	//Usando a biblioteca a partir daqui, indo  para se conectara API
	use Abraham\TwitterOAuth\TwitterOAuth;
class ClassTwitter 
{
		private $banco;


		//chave e tokens
		private $consumer_key = '3W1qf2HttF4mw8HeAy0YCkKSn';
		private $consumer_secret = 'ppd9CeLKceizbiFwxt16qtaV9VAlj6DCKpt5KdhjRgGViTDBLE';
		private $access_token = '2912944447-RnKeqxhBh2CZr6CHGlFBH8tjdsV55SqWgiv1AGI';
		private $access_token_secret = 'dxkJtpPZvW3OI70OZnaNUqyRRxbnu7iUwCGKsUf10Rnm9';
		private $tweetsApi;
		private $connection;
		private $content;
		private $sequidor;

	public function twitterOAuth(){
		//conectar na API
		$this->connection = new TwitterOAuth ($this->consumer_key,$this->consumer_secret, $this->access_token, $this->access_token_secret);	
		$this->content = $this->connection->get('account/verify_credentials');
	}

	public function getPerfil($quantidade, $perfil){
		//pegar tweets
		 $this->tweetsApi = $this->connection->get('statuses/user_timeline', ['count' => $quantidade, 'exclude_replies' => true, 'screen_name' => $perfil, 'include_rts' => false]);

		return $this->tweetsApi;
	}

	public function getSeguidor($quantidade, $perfil){
		//pegar seguidores
		$this->sequidor = $this->connection->get('followers/ids', ['count' => $quantidade, 'id' => $perfil, 'exclude_replies' => true, 'include_rts' => false]);
		return $this->sequidor;

	}

	public function gravaDadoSeguidorSeguidor($id_perfil , $id_seguidores){

		$this->banco = new ClassBanco();

			$arrayIds = array();
			foreach ($id_seguidores as $key => $valueI) {

				if ($key == 'ids') {
					foreach ($valueI as $key => $value) {
						$arrayIds[] = array($value);
						$this->banco->gravaDadoSeguidor($id_perfil  ,$value);
					}
				}
	
/*			$perfil = $this->getPerfil(2, $value['id_seguidor']);
			$seguidor = $this->getSeguidor(2, $value['id_seguidor']);
			$this->gravaAll($perfil, $seguidor);
*/
			/*echo "<pre>";
			print_r($perfil );
			echo "</pre>";*/
			/*echo "<pre>";
			print_r($seguidor );
			echo "</pre>";*/

				//$id_seguidores = $this->banco->buscaDadoSeguidores($value['id_seguidor']);
/*
						echo "<pre>";
			print_r($id_seguidores );
			echo "</pre>";
		*/
				

			}
		return $arrayIds;
	}


	public function gravaAll($perfil, $seguidor){

		$this->banco = new ClassBanco();
		$aux = true;

		if ($perfil != '') {

			foreach ($perfil as $key => $value) {
				$id_tweets = $value->id;
				$tweets = $value->text;
				$data_criacao_tweets = $value->created_at;
				$lang = $value->lang;


				// foreach dos dados do usuario
				foreach ($value as $key => $userValue) {
					if ($key == 'user') {

						$id_user = $userValue->id;
						$nome = $userValue->name;
						$user = $userValue->screen_name;
						$seguidores = $userValue->followers_count;
						$seguindo = $userValue->friends_count;
						$quantidade_tweets = $userValue->statuses_count;
						$data_cadastro_user = $userValue->created_at;
						
						//verificao para gravar apenas uma vez no banco
						if ($aux == true) {
							// grava uma vez os dados do perfil do usuario
							$this->banco->gravaDadoUser($id_user,$nome,$user,$quantidade_tweets,$seguidores,$seguindo,$data_cadastro_user);

							// grava todos os seguidores do perfil
							if ($seguidor != '') {
								foreach ($seguidor as $key => $seguidorValue) {
									if ($key == 'ids') {
										foreach ($seguidorValue as $key => $id_seguidor) {

											$id_seguidor = $id_seguidor;

											$this->banco->gravaDadoSeguidor($id_user ,$id_seguidor);
										}
									}

								}
							}
							$aux = false;
						}
					}
				}//fim do foreach dos dados do usuario

				// grava os tweets do usuario
				$this->banco->gravaDadoTweets($id_tweets,$id_user,$tweets,$data_criacao_tweets);
			}
		}

	}
 
}?>