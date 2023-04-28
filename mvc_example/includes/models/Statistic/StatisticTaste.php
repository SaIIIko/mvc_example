<?php

/**
 * @file
 * Class implements statistic data
 */

class StatisticTaste implements StatisticInterface {

  /**
   * Get product and taste variations
   *
   * @return array|null
   */
  public function request() {
    $result =  db_query("
      SELECT t.name, n.title
      FROM {taxonomy_term_data} t
      INNER JOIN {field_data_product_taste} ft ON t.tid = ft.product_taste_tid
      CROSS JOIN {node} n
      WHERE n.type = 'products'"
    )->fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }
}
