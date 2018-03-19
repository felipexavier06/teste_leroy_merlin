<?php
require_once ("Model/class-produto-model.php");
require_once ("DAO/class-produtos-dao.php");
require_once ("Library/simplexlsx-master/simplexlsx.class.php");

class ProdutosBLL {
  private $produtosDao;

  public function __construct() {
    $this->produtosDao = new ProdutosDao();
  }

  /**
  * Função para atualizar ou inserir de acordo com os dados vindos no arquivo xls
  * @author Felipe Xavier
  * @version 1.0
  */
  public function xlsxArq() {
    if ( $xlsx = SimpleXLSX::parse( file_get_contents('http://localhost/teste_pindorama/wordpress/wp-content/plugins/products_teste_webdev_leroy.xlsx'), true) ) {
      $array_produtos = $xlsx->rows();
      $category = $array_produtos[0][1];
      $array_produtos = $this->remove_index($array_produtos);

      foreach ($array_produtos as $key => $value) {
        if (isset($value[0])) {
          if (isset($value[1]) && isset($value[2]) && isset($value[3]) && isset($value[4])) {
            $obj_produto = new Produto($value[0], $value[1], $value[4], $value[2], $category, $value[3]);
          }

          $exist_id = $this->produtosDao->verify($obj_produto->getIm());
          if ($exist_id == false) {
            $this->produtosDao->insert($obj_produto);
          } else {
            $this->produtosDao->update($obj_produto);
          }
        }
      } die();
    } else {
      echo SimpleXLSX::parse_error();
    }
  }

  /**
  * Função para remover index que não serão utilizados
  * @author Felipe Xavier
  * @version 1.0
  */
  private function remove_index($array_produtos) {
    unset($array_produtos[0]);
    unset($array_produtos[1]);
    unset($array_produtos[2]);

    return $array_produtos;
  }
}

?>
