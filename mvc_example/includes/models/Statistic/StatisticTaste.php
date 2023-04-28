<?php

/**
 * @file
 * Class implements statistic data
 */

class StatisticTaste implements StatisticInterface {

  /**
   * Get product and taste names from db
   *
   * @return array|null
   */
  public function request() {
    $result =  db_query("
      SELECT t.name,
             n.title
      FROM {taxonomy_term_data} t
      RIGHT JOIN {field_data_product_taste} ft ON t.tid = ft.product_taste_tid
      INNER JOIN {node} n ON n.nid = ft.entity_id
      ")->fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }
}
