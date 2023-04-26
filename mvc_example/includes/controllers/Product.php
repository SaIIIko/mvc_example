<?php

abstract class Product implements ProductInterface {

  /**
   * The product name.
   *
   * @var string
   */
  protected $name;

  /**
   * The product price.
   *
   * @var string
   */
  protected $price;

  /**
   * The product brand.
   *
   * @var string|null
   */
  protected $brand;

  /**
   * Produce constructor.
   *
   * @param string $name
   *   The product name
   * @param int $price
   *   The product name
   * @param null|string $brand
   *   The product value
   */
  public function __construct($name, $price, $brand = NULL) {
    $this->name = $name;
    $this->price = $price;
    $this->brand = $brand;
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @return int
   */
  public function getPrice() {
    return $this->price;
  }

  /**
   * @return string|null
   */
  public function getBrand() {
    return $this->brand;
  }

}
