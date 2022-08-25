"LEMBRETES DO DESENVOLVEDOR, ACABOU O CAFÉ... NAO VOU FAZER PORQUE ESTA CARO DE MAIS 18 REAIS UM PACOTE DE MEIO KILO, NINGUEM MERECE"

DOCUMENTAÇÃO DA REFATORAÇÃO DE UM MVC DE MAIS DE 5 ANOS
ALGUNS PALAVRIADOS CHULOS ESTÃO PRESENTE NOS COMENTÁRIOS DESSA OBRA PRIMA.

 * ERROS DE PORTUGUÊS SÃO BEM VINDOS!

FEFATORAÇÃO NÚMERO 1


essa merda sempre vai ter dois erros iniciais

Warning: Undefined array key "url" in sistema\base\inicializacao.php on line 68
Warning: Trying to access array offset on value of type null in sistema\base\inicializacao.php on line 21

quem souber arrumar da um alo


Refatoração de um mvc que fiz faz um tempo, nao tenho paciencia e o sistema estava crescendo de mais
então decidi refatorar essa desgraça

iniciando com o index simples somente chamando a caralha do inicializador da porra toda
" $init = new Init "
Dessa string ele inicia com url amigavel, espero que funcione 


1 - Foi feita toda a caralhada de iniciar a aplicação no arquivo sistema/inicializacao.php
onde a url foi toda trabalhada no luxo, funcionou? logico que simples
2 - fizemos o controle que busca o Modelo e o Html da porra toda, podendo recuperar tambem o array que forem introduzidos sem vasilina,
o arquivo de modelo tbm ja esta funcionando conforme o modelo... pegadinha do malandro nao tem modelo funcionando ainda so pega o arquivo
na porra da pasta e exibe uma mensagem


TEMOS ATE AGORA

O inicializador
O Controle extendido, tipo pente de ak47 do cod mobile... nao nao gosto de frifais

Controle WEB de teste

"
class Web extends Controles{
   function index(){
        $modelo = $this->modelo("se tiver pasta vai aqui nessa praga","testeModelo");
        $modelo->gettest();
        echo "TESTE DO METODO ASD";
        $arr = ['teste'=>"testando Arraay"];
        $this->html('teste',$arr);
    }
}
"

Pronto a porra das classes de ajuda ja esta configurado pode chamar com o seguinde codigo
VENHA CODIGO DA CLASSE VENHAAAA
aconselho a usar sempre metodo estatico, porque? porque eu sou preguiçoso e nao quero por um monte de codigo
e no estatico ficou mais bunitinho

"
funcao qualqueruma(){
    ...
    Classe::cls(['aqui vai a classe, ela ta chamando em array entao se adapte a situação']);

    continua seu codigo de bosta
    ...
}
"
arquivo da classe
"
classe ClasseDeAjuda{


static function t(){
.... bla bla bla a porra do seu codigo
}

}
"
chamando a classe nos arquivos de html

"
<?php $ClasseDeAjuda::t()?>
"
Fazendo isso oque estiver na sua classe vai exibir para os mongos que estao acessando sua pagina porno



Pronto agora o Banco de dados ta de boa, a configuracao dessa caceta vc encontra no tre "sistema/configuracao.php"
nele tem a bagaca de colocar os dados do seu banco de dados falido

"
$h = ""; //HOST
$u = ""; // USUARIO
$p = ""; // SENHA
$b = ""; // BANCO DE DADOS
"

Preenchendo essa bosta ja vai funcionar

No arquivo MODELOS que fica no "sistema/core/modelo.php tem somente um coiso que vc vai coisar

"busca" que chama a Cuerie
e chama que executa a Cuerie


ta aqui como voce, cabaço, cu de apertar linguica vai usar

class TesteModelo extends Modelos{
"
public function gettest()
{
  $this->busca("aqui voce coloca aquela query duvidosa, pode por oque quiser até update se where");
  return $this->chama(); // como o nome ja diz... CHAMAAAAA!!!
}

}
"
como chama ele no controller ta la em cima so procurar


e assim termino esse frameworki maroto


