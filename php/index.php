<?php 

require("twitter-class.php");


$twitter = new ClassTwitter();
$banco = new ClassBanco();

//$perfil = "cnn";
//$id_perfil = "313648213";

//$perfil = "@whindersson";
$id_perfil = "230186518";


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
    while ($j <= 10) {

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
                }

            }
        }


        foreach ($seguidor as $keyIV => $valueIV) {

            if ($keyIV == 'ids') {
                
                foreach ($valueIV as $keyV => $valueV) {

                    $arrayIds[] = array('user' => $valueV) ;
                    echo ($banco->gravaDadoSeguidor($valueIII, $valueV));
                }
            }
        }
        $aux++;
        $i++;
        $j++;
    }
    $j = 1;
    sleep(900);

   # code...
}




?>
