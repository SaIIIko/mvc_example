<?php

/**
 * Class represents loader for hook menu callback
 */
class ProductYogurtLoad {

  /**
   * Create static method for specific hook_menu "page callback" requirements
   * @throws \Exception
   * @return array
   */
  public static function load($id) {
    $product = new ProductYogurtBuild($id);
    return $product->buildFieldsArray();
  }
}
