<?php

/**
 * @file
 * Class implements statistic data
 */

class StatisticIsPrice implements StatisticInterface {

  /**
   * Get product price
   *
   * @return array|null
   */
  public function request() {
    /**
     * Как оказалось, в MariaDB, которая у меня развернута для теста,
     * не поддерживается FULL OUTER JOIN...
     * Поэтому как аналог можно объединить наборы c LEFT и RIGHT JOIN
     * через UNION.
     * Иначе запрос бы выглядел как:
     * SELECT ... FROM {node} n FULL OUTER JOIN ... pp ON n.nid = pp.entity_id
     */
    $result = db_query("
      SELECT n.type, n.title, pp.product_price_value
      FROM {node} n
      LEFT JOIN {field_data_product_price} pp ON n.nid = pp.entity_id
      UNION
      SELECT n.type, n.title, pp.product_price_value
      FROM {node} n
      RIGHT JOIN {field_data_product_price} pp ON n.nid = pp.entity_id
      ")->fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }
}
