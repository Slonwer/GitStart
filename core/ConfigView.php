<?php
 
 namespace Core;

 class ConfigView{
    private string $nome;
    
    private string $dados;

    public function __construct(string $nome, array $dados){
        $this->nome = $nome;
        $this->dados = $dados;
        //var_dump($this->nome);
        //var_dump($this->dados);

    }

    public function rendernizar(){
        if (file_exist( 'app/' . $this->nome . 'php')){
            include 'app/' . $this->nome . '.php';
        
        }else {

            echo "Erro Por favor se tente novamente.
            se o erro persistir entre em contato com um 
            administrador";
        }
    }
 }


?>