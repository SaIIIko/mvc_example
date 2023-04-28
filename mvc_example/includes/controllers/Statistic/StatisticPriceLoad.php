<?php

/**
 * @file
 * Class implements load data to template
 */

class StatisticPriceLoad implements StatisticLoadInterface {

  /**
   * Load data to template
   *
   * @return mixed|string
   * @throws \Exception
   */
  public static function load() {
    $get_arr = new StatisticIsPrice();
    return theme('statistic_price_template', array('data' => $get_arr->request()));
  }
}
