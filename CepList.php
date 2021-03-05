<?php
require_once 'classes/Cep.php';

class CepList
{
    private $html;

    public function __construct()
    {
        $this->html = file_get_contents('html/list_cep.html');
    }

   
    public function load()
    {
        try 
        {
                     
            

           $Ceps = Cep::all();

            $items = '';
            foreach ($Ceps as $Cep)
            {     
                $item = file_get_contents('html/item_cep.html');
                $item = str_replace('{cep}', $Cep['cep'], $item);
                $item = str_replace('{estado}', $Cep['uf'], $item);
                $item = str_replace('{cidade}', $Cep['localidade'], $item);
                $item = str_replace('{bairro}', $Cep['bairro'], $item);
                $item = str_replace('{rua}', $Cep['logradouro'], $item);
                $item = str_replace('{ibge}', $Cep['ibge'], $item);
                $item = str_replace('{ddd}', $Cep['ddd'], $item);
                
                $items .= $item;

            }
            $this->html = str_replace('{items}', $items, $this->html);

        } 
        catch (Exception $e) 
        {
            echo $e->getMessage();
        }
    }

    public function show()
    {
        $this->load();
        echo $this->html;
    }


}
