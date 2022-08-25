<?php

class Init
{


    //variaveis privadas para pegar a url que o cracudo vai acessar
    private $controle = "web";
    private $metodo = "index";
    private $adicional = []; //isso vai pegar oque vier depois do metodo, seja oque for... POST, GET e muito mais



    // essa parte vai fazer o tratamento das rotas com controle, metodo e os adicionais

    function tratamento()
    {
        $url = $this->pegandoUrl();

        // aqui verifica se o arquivo existe na pasta
        $pasta = 'app/controles/' . $url[0] . '.php';
        if (file_exists($pasta)) {

            //essa parte estancia se o rolê existe mesmo
            $this->controle = $url[0];
            unset($url[0]);
        }

        if (isset($url[0])) {

            // aqui mostra o erro se o controle nao existir
            echo "<h1 class='error'>Erro no controle: <em>$url[0]</em>, arquivo não encontrado na pasta $pasta </h1>";
            //erro url 0
        } else {
            require_once 'app/controles/' . $this->controle . '.php';

            $this->controle = new $this->controle;
        }

        if (isset($url[1])) {
            if (method_exists($this->controle, $url[1])) {
                $this->metodo = $url[1];
                unset($url[1]);
            } else {
                echo "<h1 class='error'>Erro no metodo: <em>$url[1]</em></h1>";

                // erro url 1
            }
        } else {
        }


        // aqui entra os adicionais 
        $this->adicional = $url ? array_values($url) : array();
        call_user_func_array(array(
            $this->controle,
            $this->metodo
        ), $this->adicional);
    }




    // essa função vai pegar toda a url, inclusive oque vode digitar nela ex: xvideos.com.br/novinah-sapeca
    function pegandoUrl()
    {

        $url = $_GET['url'];
        if (isset($url)) {

            return $url =  explode("/", filter_var(rtrim($url, "/"), FILTER_SANITIZE_URL));
        } else {

            //   die('algo deu errado nessa porra, olha o codigo novamente');
        }
    }




    function foi()
    {

        $this->tratamento();
    }
}
