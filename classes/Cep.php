<?php
class Cep
{
    private static $conn;
    public static function getConnection()
    {
        if(empty(self::$conn))
        {
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
        $ini = parse_ini_file('config/cep.ini');
        $host = $ini['host'];
        $name = $ini['name'];
        $user = $ini['user'];
        $pass = $ini['pass'];
        $port = $ini['port'];
        self::$conn = new PDO("mysql:host={$host};port={$port};dbname={$name}",$user,$pass, $options);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }

    public static function validateCep($cep)
    {                       
        //o CEP deve ter 9 digitos(contando com o -)
        if( strlen($cep) != 9 )
        {
            $info             = new stdClass;
            $info->erro         = TRUE;
            $info->mensagem     = "CEP: <b>{$cep}</b> não possui 8 digitos!";    
            return (array) $info;                                    
        }

    }

    public static function getCep($cep)
    {    
        try
        {                                        
            $url = "http://viacep.com.br/ws/{$cep}/xml/";      
            $xml = simplexml_load_file($url);
                                                                                                    
            //checa se o cep não existe, neste caso o atributo erro será TRUE
            if( isset($xml->erro) )
            {
                $xml             = new stdClass;
                $xml->erro         = TRUE;
                $xml->mensagem = "CEP: <b>{$cep}</b> não existe na base de dados!";
            }
            
            return (array) $xml;            
        }
        catch (Exception $e)
        {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function findDb($cep)
    {
        try
        {
            $conn = self::getConnection();
            $result = $conn->prepare("select * from cep WHERE cep = :cep");
            $result->execute([':cep' =>$cep]);
            
            return $result->fetch();            

        $conn = null;
        }
        catch (PDOException $e)
        {
            print $e->getMessage();
        }
    }

    public static function save($dados_cep)
    {
        try
        {
            extract($dados_cep);
            if(!empty($cep))
            {
            $conn = self::getConnection();

            $cep = addslashes($cep);
            $uf = addslashes($uf);
            $localidade = addslashes($localidade);
            $bairro = addslashes($bairro);
            $logradouro = addslashes($logradouro);
            $ibge = addslashes($ibge);
            $ddd = addslashes($ddd);
            
                  
            $sql = "INSERT INTO cep (cep, uf, localidade, bairro, logradouro, ibge, ddd) 
            VALUES  ('$cep', '$uf', '$localidade', '$bairro',  '$logradouro', '$ibge', '$ddd') ;";
            
            return $conn->query($sql);
            }
                       

        $conn = null;
        }
        catch (PDOException $e)
        {
            print $e->getMessage();
        }
    }

    public static function all()
    {
        try
        {
            $conn = self::getConnection();
            
            $result = $conn->query("select * from cep ORDER BY id desc");
            return $result->fetchAll();
            

        $conn = null;
        }
        catch (PDOException $e)
        {
            print $e->getMessage();
        }
    }
    
}