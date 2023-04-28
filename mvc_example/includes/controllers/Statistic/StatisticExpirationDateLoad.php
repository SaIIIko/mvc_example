<?php

/**
 * @file
 * Class implements load data to template
 */

class StatisticExpirationDateLoad implements StatisticLoadInterface {

  /**
   * Load data to template
   *
   * @return mixed|string
   * @throws \Exception
   */
  public static function load() {
    $get_arr = new StatisticIsExpirationDate();
    return theme('statistic_expiration_date_template', array('data' => $get_arr->request()));
  }
}
