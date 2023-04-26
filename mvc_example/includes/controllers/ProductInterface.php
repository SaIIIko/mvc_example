<?php

/**
 * Interface for Product.
 */
interface ProductInterface {

  /**
   * Get product name
   *
   * @return string
   *   The product name
   */
  public function getName();

  /**
   * Get product price
   *
   * @return int
   *   The product price
   */
  public function getPrice();

  /**
   * Get product brand
   *
   * @return string|null
   *   The product brand
   */
  public function getBrand();
}
