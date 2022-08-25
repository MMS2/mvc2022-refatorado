<?php

class Controles
{


    //variaveis publicas para chamar no MODEL e no VIEW
    public $modelo;
    public $html;
    public static $arr = array();



    //esse recupera a visualização do rolê
    public function html($html, $arr = array())
    {
        // esse role verifica se o arquivo existe na pasta
        $pastaHtml = "app/html/$html.php";
        if (file_exists($pastaHtml)) {
            // aqui pega os array que vao entrar
            self::$arr = array_merge(self::$arr, $arr);

            //extrai a caralha do array
            $ext = extract(self::$arr);

            //inclui a porra do arquivo se tiver
            require_once($pastaHtml);

            //retorna o Array
            return $ext;
        } else {
            //erro se o arquivo nao tiver la na pasta
            echo "<h1 class='error'>erro, arquivo $pastaHtml não encontrada</h1>";
        }
    }



    // aqui vem o modelo que puxa o mysql
    public function modelo($pasta = null, $modelo)
    {

        //pasta dos modelos
        $pastaModelo = "app/modelo/$pasta/$modelo.php";

        //se a parada existir mostra se nao da erro
        if (file_exists($pastaModelo)) {
            require_once($pastaModelo);

            //esse estancia a classe
            return new $modelo();
        } else {

            //erro se o arquivo nao tiver la na pasta ou se a classe nao existir
            echo "<h1 class='error'>erro, arquivo $pastaModelo não encontrada</h1>";
        }
    }
}
