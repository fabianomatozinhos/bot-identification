<?php 

require("banco-class.php");

$banco = new ClassBanco();


$json_extra = $banco->buscaJsonBotometerTodos();


/*echo "<pre>";
print_r($json_extra);
echo "</pre>";
*/



foreach ($json_extra as $key => $arrayJson) {
	foreach ($arrayJson as $key => $arrayJsonII) {
		if ($key === 'id_user') {

echo "<pre>";
print_r($arrayJsonII);
echo "</pre>";



			if (($banco->buscaBotometerId($arrayJsonII)) === 'vazio' ) {

				//echo(json_decode(str_replace ("'", '"',$arrayJson['json_extra'])));
				
				$jasonBotometer =	json_decode(str_replace ("'", '"',$arrayJson['json_extra']));

				foreach ($jasonBotometer as $key => $value) {
					if ($key === 'categories') {

						$content = $value->content;
						$friend = $value->friend;
						$network = $value->network;
						$sentiment = $value->sentiment;
						$temporal = $value->temporal;
						$user = $value->user;
						# code...
					}else if($key === 'scores'){

						$english = $value->english;
						$universal = $value->universal;
					}else{

						$id_user = $value->id_str;
						$screen_name = $value->screen_name;
					}
					# code...
/*				echo "<pre>";
				print_r($value);
				echo "</pre>";*/
				}

				$banco->gravaBotometer($id_user, $screen_name, $content, $friend, $network, $sentiment, $temporal, $user, $english, $universal);

			}else{
				echo "<pre>";
				echo "ja possui o user $arrayJsonII no banco ";
				echo "</pre>";
			}

		}
	}
		# code...
}



 ?>