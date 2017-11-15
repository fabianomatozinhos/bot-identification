<!-- <!DOCTYPE html>
<html>
<head>
    <title></title>

<script type="text/javascript">

var count = new Number();
var count = 11;

function start (){
    if ((count - 1) >= 0){
        count = count -1;
        tempo.innerText=count;
        setTimeout('start();', 1000);
    }
}    

</script>


</head>
<body onload="start();">
    <div id="tempo"></div>
</body>
</html> -->


<?php 

sant
require("twitter-class.php");


$twitter = new ClassTwitter();
$banco = new ClassBanco();

//$perfil = "cnn";
$id_perfil = "313648213";

//$perfil = "917388836828700672";


//chamada da biblioteca
$twitter->twitterOAuth();

//chamada para buscar os dados do perfil
//perfil = $twitter->getPerfil(1,$perfil);




/*foreach ($perfil as $key => $value) {
        $id_tweets = $value->id;
        $tweets = $value->text;
        $cordination = $value->coordinates;
        $favorited = $value->favorited;
        $geo =  $value->geo;
        $in_reply_to_user_id_str =  $value->in_reply_to_user_id_str;
        $created_at =  $value->created_at;  
        $place =  $value->place; 
        $retweeted =  $value->retweeted;
        $retweet_count =  $value->retweet_count;
        $is_quote_status =  $value->is_quote_status;
        $in_reply_to_status_id =  $value->in_reply_to_status_id;
        $contributors =  $value->contributors;
     
        // foreach dos dados do usuario
        foreach ($value as $key => $userValue) {
        if ($key == 'user') {
            $id = $userValue->id_str;
            $user = $userValue->screen_name;
            $favourites_count = $userValue->favourites_count;
            $time_zone = $userValue->time_zone;
            $following = $userValue->following;
            $followers_count = $userValue->followers_count;
            $default_profile_image = $userValue->default_profile_image;
            $description = $userValue->description;
            $url = $userValue->url;
            $profile_background_color = $userValue->profile_background_color;
            $profile_background_color = $userValue->profile_background_color;
            $statuses_count = $userValue->statuses_count;
            $follow_request_sent = $userValue->follow_request_sent;
            $notifications = $userValue->notifications;
            $created_at = $userValue->created_at;
            $profile_image_url_https = $userValue->profile_image_url_https;
            $friends_count = $userValue->friends_count;
            $profile_image_url = $userValue->profile_image_url;
            $profile_background_image_url_https = $userValue->profile_background_image_url_https;
            $has_extended_profile = $userValue->has_extended_profile;
            $profile_sidebar_fill_color = $userValue->profile_sidebar_fill_color;
            $verified = $userValue->verified;
        }
        if ($key == 'entities') {
            foreach ($userValue as $keyII => $mentionsValue) {
    
                if ($keyII == 'user_mentions') {
                    foreach ($mentionsValue as $key => $value) {
                        $mentions = $value->id;
                    }
            
                }

            }
                //$mentions = $userValue->user_mentions;
                # code...
        }
    }


}*////fim do foreach dos dados do usuario

    # code...



//die;
//chamada para buscar os seguidores
$seguidor = $twitter->getSeguidor(2, $id_perfil);



//chamada para gravar os dados do perfil e seguidor
//$twitter->gravaAll($perfil, $seguidor);

// Hora atual
echo date('h:i:s') . "\n";

// Dorme por 10 segundos



$arrayIds = array();
$arrayIdsSeguidor = array();
            foreach ($seguidor as $key => $valueI) {

                if ($key == 'ids') {
                    foreach ($valueI as $key => $value) {
                        $arrayIds[] = array('user' => $value) ;
                    }
                }
            }
/*                     echo "<pre>";
print_r($arrayIds);
echo "</pre>";*/
sleep(5);
// Acorde!
echo date('h:i:s') . "\n";
echo'teste';
/*                     echo "<pre>";
print_r($arrayIds);
echo "</pre>";*/

            foreach ($arrayIds as $keyI => $value) {

                foreach ($value as $keyII => $valueI) {

                    $seguidor = $twitter->getSeguidor(4, $value);
                
                        foreach ($seguidor as $key => $valueII) {

                            if ($key == 'ids') {
                                foreach ($valueII as $key => $valueIII) { 
                                    if ($keyII == 'user') {
                                        # code...
                                    $arrayIds[$keyI] = array_merge($arrayIds[$keyI],  array($valueIII));
                                    }
                                //$arrayIdsSeguidor[] = ;
                       

                                }
                                
/*                     echo "<pre>";
print_r($arrayIdsSeguidor);
echo "</pre>";*/                    
              

                                                           
                                //   $arrayIds[] = $arrayIds[]  $arrayIdsSeguidor ;

                            }
                        }

                

                }     
     
            }
                     echo "<pre>";
print_r($arrayIds);
echo "</pre>";
      

//$seguidor = $twitter->getSeguidor(5, $arrayIds[0]);

//$arrayId = $twitter->gravaDadoSeguidorSeguidor($id_perfil, $seguidor);

/*echo "<pre>";
print_r($id_seguidores );
echo "</pre>";

/*foreach ($id_seguidores as $key => $value) {
		//$perfil = $twitter->getPerfil(2, $value['id_seguidor']);
		//$seguidor = $twitter->getSeguidor(2, $value['id_seguidor']);
		//$twitter->gravaAll($perfil, $seguidor);
echo "<pre>";
print_r($perfil );
echo "</pre>";
/*echo "<pre>";
print_r($seguidor );
echo "</pre>";

	$id_seguidores = $banco->buscaDadoSeguidores( $value['id_seguidor']);
	echo "<pre>";
print_r($id_seguidores );
echo "</pre>";
}*/

/*

require_once 'unirest-php/src/Unirest.php';
require_once 'vendor/autoload.php';




 $arrayName = array('user' => array('id' => "313648213", 
                                    'screen_name' => 'wowsant' ) ,
                    'timeline' =>  $timeline,
                    'mentions' =>  array( )
           );



 echo (json_encode($arrayName));


$headers = array("X-Mashape-Key" => "Xje4PFhdajmshABz22V9xAyYiey6p1EjUHzjsnXCcotBP7xnR7",   'Accept' => 'application/json');
$data = array('name' => 'ahmad', 'company' => 'mashape');

$body = Unirest\Request\Body::json($arrayName, JSON_FORCE_OBJECT);



$response = Unirest\Request::post("https://osome-botometer.p.mashape.com/2/check_account", $headers, $body);*/

// These code snippets use an open-source library. http://unirest.io/php
/*$response = Unirest\Request\Body::Json("https://osome-botometer.p.mashape.com/2/check_account",
  array(
    "X-Mashape-Key" => "Xje4PFhdajmshABz22V9xAyYiey6p1EjUHzjsnXCcotBP7xnR7",
    "Content-Type" => "application/json",
    "Accept" => "application/json"
  ),json_encode($arrayName)
  
);*/

// These code snippets use an open-source library. http://unirest.io/php
/*$response = Unirest\Request::post("https://osome-botometer.p.mashape.com/2/check_account",
    array(
    "X-Mashape-Key" => "UtsZRmBoUemshJJgNodC6470QQmvp1ipISfjsnqmNnrtwbplzB",
    "Content-Type" => "application/x-www-form-urlencoded",
    "Accept" => "application/json"
  ),
  array(
    "txt" => "Today is  a good day"
  )
  
);*/

/* echo "<pre>";
print_r( $response);
 echo "</pre>";
*/



?>
