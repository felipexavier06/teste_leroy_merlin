<?php
class Produto {
  private $im;
  private $name;
  private $free_shipping;
  private $description;
  private $price;
  private $category;

  public function __construct($im = null, $name, $price, $free_shipping,  $category, $description) {
    $this->im = $im;
    $this->name = $name;
    $this->price = $price;
    $this->free_shipping = $free_shipping;
    $this->category = $category;
    $this->description = $description;
  }

  public function getIm() {
    return $this->im;
  }

  public function setIm( $im ) {
    $this->im = $im;
  }

  public function getName() {
    return $this->name;
  }

  public function setName( $name ) {
    $this->name = $name;
  }

  public function getFreeShipping() {
    return $this->free_shipping;
  }

  public function setFreeShipping() {
    $this->free_shipping = $free_shipping;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription( $description ) {
    $this->description = $description;
  }

  public function getPrice() {
    return $this->price;
  }

  public function setPrice( $price ) {
    $this->price = $price;
  }

  public function getCategory() {
    return $this->category;
  }

  public function setCategory( $category ) {
    $this->category = $category;
  }
}
?>
