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
   * @return string
   */
  public function getName() {
    $result = db_query("
      SELECT title
      FROM {node}
      WHERE nid = :nid",
        array(':nid' => $this->id))->fetchField();

    return $result;
  }

  /**
   * @return null|int
   */
  public function getPrice() {
    $result = db_query("
      SELECT product_price_value
      FROM {field_data_product_price}
      WHERE entity_id = :nid",
      array(':nid' => $this->id))->fetchField();
    return $result;
  }

  /**
   * @return null|array
   */
  public function getBrand() {
    $result =  db_query("
      SELECT name
      FROM {field_data_product_brand} pb
      INNER JOIN {taxonomy_term_data} t ON pb.product_brand_tid = t.tid
      WHERE entity_id = :nid",
      array(':nid' => $this->id))->fetchAll();

    return $result;
  }
}
