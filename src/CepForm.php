    <?php
    require_once './classes/Cep.php';

    class Cepform
    {
    private $html;
    private $data;

    public function __construct() 
    {
        $this->html = file_get_contents('html/form_cep.html');
        $this->data = [
        'cep' => null,
        'uf' => null,
        'localidade' => null,
        'bairro' => null,
        'logradouro' => null,
        'ibge' => null,
        'mensagem' => null,
        'ddd' => null,
        'cep_novo' => null
        ];
    }

        public function findCep($param)
        {
            try 
            {
                $cep = $param['cep'];
                $this->data = Cep::validateCep($cep);
                
                if(empty($this->data)) //verifica se deu erro ao validar validateCep
                {
                    $this->data = Cep::findDb($cep);//busca no Banco de dados
                    if (empty($this->data)) //Se não encontrou o cep no DB, busca no viacep
                    {
                        $this->data = Cep::getCep($cep);
                        if(Cep::save($this->data)) $this->data['cep_novo'] = "<font color='green'>(Cep novo)</font>";                    
                    } 

                }     

            } 
            catch (Exception $e) 
            {
                echo $e->getMessage();
            }
        }

        public function show()
        {
            if (isset($this->data['mensagem'])) 
            {
                $this->html  = file_get_contents('html/form_cep_error.html');
                $this->html  = str_replace('{mensagem}', $this->data['mensagem'], $this->html);
            }
            else 
            {
                $this->html  = file_get_contents('html/form_cep.html');
                $this->html  = str_replace('{cep2}', $this->data['cep'], $this->html);
                $this->html  = str_replace('{estado}', $this->data['uf'], $this->html);
                $this->html  = str_replace('{cidade}', $this->data['localidade'], $this->html);
                $this->html  = str_replace('{bairro}', $this->data['bairro'], $this->html);
                $this->html  = str_replace('{rua}', $this->data['logradouro'], $this->html);
                $this->html  = str_replace('{ibge}', $this->data['ibge'], $this->html); 
                $this->html  = str_replace('{ddd}', $this->data['ddd'], $this->html); 
                $this->html  = str_replace('{cep_novo}', $this->data['cep_novo'] ?? null, $this->html); 
            }            
            echo $this->html;           
        }
    }