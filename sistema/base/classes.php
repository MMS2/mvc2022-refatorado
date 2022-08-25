<?php

class Classes 
{
    public function __construct() {
        spl_autoload_register(array($this, 'carrega'));
    }

    private function carrega($classe) {

        // a pasta que ta os arquivos da classe
 $carrega = "./app/classes/$classe.php";

 //verifica se a praga existe
        if (file_exists($carrega)) {
            require_once($carrega);
        } else {
            // erro se nao existir
            echo '<h1 class="error">Erro ao carregar ', $classe, ' via ', __METHOD__, "()\n</b>";
        }
    }

    // aqui chama o array das classes que vao estar nos arquivios, é melhor chamar direto no controler ao
    //invez de tudo no inicio  
    static function cls($array) {

        foreach ($array as $arrayClasse) {
            new $arrayClasse();
        }
    }

}

new Classes();