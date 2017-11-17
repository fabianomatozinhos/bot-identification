<?php 

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





//chamada para buscar os seguidores
$seguidor = $twitter->getSeguidor(200, $id_perfil);


//chamada para gravar os dados do perfil e seguidor
//$twitter->gravaAll($perfil, $seguidor);


// Hora atual
echo date('h:i:s') . "\n";




$arrayIds = array();
$arrayIdsSeguidor = array();
$id_seguidor ='';
$id_perfil_user = '';

//busca os seguidores do 1 perfl 
foreach ($seguidor as $key => $valueI) {

    if ($key == 'ids') {
        foreach ($valueI as $key => $value) {
            $arrayIds[] = array('user' => $value) ;
            echo($banco->gravaDadoSeguidor($id_perfil, $value));
        }
    }
}

$i = 1;
$aux = 1;
while ($i <= 10) {
     # code...


echo   'teste'; 
$teste[] = $banco->buscaDadoSeguidores($aux);

$aux++;
// Hora atual
echo (date('h:i:s') . "\n");

sleep(900);
echo (date('h:i:s') . "\n");
foreach ($teste as $keyI => $valueI) {
    
    foreach ($valueI as $keyII => $valueII) {
        
        foreach ($valueII as $keyIII => $valueIII) {
            
            if ($keyIII==='id_seguidor') {
   
 
                print_r ($seguidor = $twitter->getSeguidor(200, $valueIII));
                

            }
            # code...
        }

        # code...
    }
}

/*                                 echo "<pre>";
print_r($seguidor);
echo "</pre>";*/

foreach ($seguidor as $keyIV => $valueIV) {

    if ($keyIV == 'ids') {
        
        foreach ($valueIV as $keyV => $valueV) {

            $arrayIds[] = array('user' => $valueV) ;
            echo ($banco->gravaDadoSeguidor($valueIII, $valueV));
        }
    }
}

   # code...
}

die;
// Dorme por 10 segundos
sleep(5);

// Hora atual
echo (date('h:i:s') . "\n");
echo 'teste';

//busca os seguidores dos seguidores
foreach ($arrayIds as $keyI => $value) {
    foreach ($value as $keyII => $valueI) {

        $seguidor = $twitter->getSeguidor(2, $value);

        foreach ($seguidor as $key => $valueII) {
            if ($key == 'ids') {
                foreach ($valueII as $key => $valueIII) { 
                    if ($keyII == 'user') {

                    }
                        $teste['seguidor'][] = $valueIII;
                        $arrayIds[$keyI] = array_merge($arrayIds[$keyI],  $teste);
                }
            }
        }
    }     
}

echo "<pre>";
print_r($arrayIds);
echo "</pre>";

/*
//grava no banco de dados os seguidores dos seguidores
foreach ($arrayIds as $key => $value) {
    foreach ($value as $keyI => $valueII) {

 /*           echo '<pre>';
             print_r($valueII);
            echo '</pre>';
*/
 /*       if ($keyI === 'user') {
            $id_perfil_user = $valueII;
        }
            $id_seguidor = $valueII;
        
        

            echo 'user '.$id_perfil_user;
            echo '<br>';
            echo 'seguidor '.$id_seguidor;
            echo '<br>';
        //$twitter->gravaDadoSeguidorSeguidor($id_perfil_user, $id_seguidor);
    }
}
      
*/

//$arrayId = $twitter->gravaDadoSeguidorSeguidor($id_perfil, $seguidor);


?>
