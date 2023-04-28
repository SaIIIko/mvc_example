<?php

/**
 * @file
 * Class implements load data to template
 */

class StatisticTasteLoad implements StatisticLoadInterface {

  /**
   * Load data to template
   *
   * @return mixed|string
   * @throws \Exception
   */
  public static function load() {
    $get_arr = new StatisticTaste();
    return theme('statistic_taste_template', array('data' => $get_arr->request()));
  }
}
