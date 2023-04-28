<?php

/**
 * @file
 * Implements module enable functions
 */

abstract class ModuleEnable {

  /**
   * Add fields for node and terms
   *
   * @param $fields_array
   *
   * @return void
   * @throws \FieldException
   */
  public static function addFields($fields_array) {
    foreach ($fields_array as $field) {
      field_create_field($field);

      $instance = array(
        'field_name' => $field['field_name'],
        'entity_type' => $field['entity'],
        'bundle' => $field['bundle'],
        'label' => $field['label'],
      );

      field_create_instance($instance);
    }
  }
}
