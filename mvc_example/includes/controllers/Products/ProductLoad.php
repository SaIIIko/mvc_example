<?php

/**
 * @file
 * Class represents loader for hook menu callback
 */

class ProductLoad {

  /**
   * Create static method for specific hook_menu "page callback" requirements
   * @throws \Exception
   * @return array
   */
  public static function load($id) {
    $product = new ProductBuild($id);
    return $product->buildFieldsArray();
  }
}
