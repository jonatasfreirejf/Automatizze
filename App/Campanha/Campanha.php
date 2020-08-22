<?php
    namespace App\Campanha;
    
    use App\Config\Banco\Bdados;
    
    class Campanha extends Bdados
    {
        private $dadosCampanha;
        
        public function setDadosCampanha($dados)
        {
            foreach ($dados as $key => $value) {
                $this->treat($value);
                $dados[$key] = $this->getDados();
            }
            $this->dadosCampanha = $dados;
        }
        
        public function createCampanha()
        {
            $nameCampanha = $this->dadosCampanha['name'];
            $idCampanha = rand("111111", "999999999999999999");
            
            $result = $this->execSql("INSERT INTO `campanhas` (`id`, `id_campanha`, `name`) VALUES (NULL, '$idCampanha', '$nameCampanha');");
            if($result)
            {
                return array(
                    "status" => 0,
                    "message" => "Campanha Criada",
                    "id_campanha" => $idCampanha,
                );
            }else{
                return array(
                    "status" => 1,
                    "message" => "Erro ao Criar Campanha",
                    "error" => mysqli_error($this->connection),
                );
            }
        }
        
        public function deleteCampanha()
        {
            $idCampanha = $this->dadosCampanha['id_campanha'];
            $result = $this->execSql("DELETE FROM campanhas WHERE id_campanha='$idCampanha'");
            if($result){
                return array(
                    "status" => 0,
                    "message" => "Campanha Deletada",
                );
            }else{
                return array(
                    "status" => 1,
                    "message" => "Erro ao Deletar Campanha",
                    "error" => mysqli_error($this->connection),
                );
            }
        }
        
        public function listCampanha() 
        {
            $result = $this->execSql("SELECT * FROM campanhas");
            $qtdAll = mysqli_num_rows($result);
            
            $numPage = ceil($qtdAll / $this->dadosCampanha['limit']);
            
            $inicio = ($this->dadosCampanha['limit'] * $this->dadosCampanha['page']) - $this->dadosCampanha['limit'];
            
            $result = $this->execSql("SELECT * FROM campanhas LIMIT $inicio," . $this->dadosCampanha['limit']. "");
            $quant = mysqli_num_rows($result);
            
            return array(
                'numPage' => $numPage,
                'qtdAll' => $qtdAll,
                'qtdPage' => $quant,
                'data' => $result,
            );
        }
    }

