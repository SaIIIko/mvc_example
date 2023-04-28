<?php

/**
 * @file
 * Implements module disable functions
 */

abstract class ModuleDisable {

  /**
   * Add fields for node and terms
   *
   * @param $fields_array
   *
   * @return void
   * @throws \Exception
   */
  public static function removeFields($fields_array) {
    if ($fields_array) {
      foreach ($fields_array as $instance) {
        field_delete_instance($instance);
        field_delete_field($instance['field_name']);
      }
    } else {
      throw new Exception('Array must not be empty');
    }
  }
}
