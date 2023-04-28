<?php

/**
 * @file
 * Class implements statistic data
 */

class StatisticIsExpirationDate implements StatisticInterface {

  /**
   * Get products expiration date info
   *
   * @return array|null
   */
  public function request() {
    $result =  db_query("
      SELECT *
      FROM {node} n
      LEFT JOIN {field_data_product_expiration_date} ed ON n.nid = ed.entity_id
      ")->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
  }
}
