<?php

abstract class Product implements ProductInterface {

  /**
   * The product id.
   *
   * @var int
   */
  protected $id;

  /**
   * The product name.
   *
   * @var string
   */
  protected $name;

  /**
   * The product price.
   *
   * @var null|int
   */
  protected $price;

  /**
   * The product brand.
   *
   * @var null|string
   */
  protected $brand;

  /**
   * Produce constructor.
   *
   * @param int $id
   *   The product id
   */
  public function __construct($id) {
    $this->id = $id;
  }

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @return null|string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @return null|int
   */
  public function getPrice() {
    return $this->price;
  }

  /**
   * @return null|string
   */
  public function getBrand() {
    return $this->brand;
  }
}
