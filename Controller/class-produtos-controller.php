<?php
require_once ("BLL/class-produtos-bll.php");

class ProdutosController {
  private $produtosBLL;

  /**
  * Função para iniciar todo o processo de inserção ou atualização de dados no banco
  * @author Felipe Xavier
  * @version 1.0
  */
  public function initProduto() {
    $this->produtosBLL = new ProdutosBLL();
    return $this->produtosBLL->xlsxArq();
  }
}

?>
