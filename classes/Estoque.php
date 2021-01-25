<?php 
require_once 'db/Conexao.php';

class Estoque 
{

private $conn;
private $buscar;
private $id;

public function __construct()
{
    $this->conn = new Conexao();
}

    public function mostrar($id)
    {
        $this->id = $id;    
        $this->buscar = $this->conn->conectar()->prepare("SELECT * FROM venda WHERE id_produto=:id");
        $this->buscar->bindValue(":id",$this->id);
        $this->buscar->execute();

            $resultados = array();

            $resultados = $this->buscar->fetchAll(PDO::FETCH_ASSOC);

            if (!$resultados) {
				throw new Exception("Nenhum pruduto no estoque!");
			}
                        
                return $resultados;

    }
}


?>