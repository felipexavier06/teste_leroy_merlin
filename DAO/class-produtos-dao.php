<?php
require_once ("DAO/class-database.php");

class ProdutosDao {

  private $connection;

  public function __construct() {
    $this->connection = new mySQL();
    $this->connection->connect('localhost', 'root', '', 'produtos_leroy_merlin');
  }

  /**
  * Função para inserir dados no banco
  * @author Felipe Xavier
  * @version 1.0
  */
  public function insert( $obj_produto ) {
    $query = "INSERT INTO produtos (id, name, price, free_shipping, category, description) VALUES ('" . $obj_produto->getIm() . "', '" . $obj_produto->getName() . "', " . $obj_produto->getPrice() . ", '" . $obj_produto->getFreeShipping() . "', '" . $obj_produto->getCategory() . "', '" . $obj_produto->getDescription() . "')";
    $result = $this->connection->query($query);
    $this->message($result, 'Erro ao inserir a informação<br>', 'Informação inserida com sucesso<br>');
  }

  /**
  * Função para atualizar dados no banco
  * @author Felipe Xavier
  * @version 1.0
  */
  public function update($obj_produto) {
    $query = "UPDATE produtos SET name = '" . $obj_produto->getName() . "', price = " . $obj_produto->getPrice() . ", free_shipping = '" . $obj_produto->getFreeShipping() . "', category = '" . $obj_produto->getCategory() . "', description = '" . $obj_produto->getDescription() . "' WHERE id = " . $obj_produto->getIm();
    $result = $this->connection->query($query);
    $this->message($result, 'Erro ao atualizar a informação<br>', 'Informação atualizada com sucesso<br>');
  }

  /**
  * Função para mostrar mensagem de acordo com o resultado
  * @author Felipe Xavier
  * @version 1.0
  */
  public function message($result, $erro, $sucess) {
    if ($result == false) {
      echo $erro;
    } else {
      echo $sucess;
    }
  }

  /**
  * Função para verificar se existe o id no banco
  * @author Felipe Xavier
  * @version 1.0
  */
  public function verify( $id ) {
    $query = "SELECT * FROM produtos WHERE id =" . $id;
    $check = $this->connection->fetch($query);
    $verify = false;

    if ($check) {
      $verify = true;
    }

    return $verify;
  }

}

 ?>
