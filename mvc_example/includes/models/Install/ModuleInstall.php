<?php

/**
 * @file
 * Implements module install functions
 */

abstract class ModuleInstall {

  /**
   * Crete new node type
   *
   * @param $type
   * @param $name
   * @param $title_label
   *
   * @return void
   */
  public static function createNodeType($type, $name, $title_label) {
    if (!in_array($type, node_type_get_names())) {
      $type = array(
        'type' => $type,
        'name' => st($name),
        'base' => 'node_content',
        'custom' => 1,
        'modified' => 1,
        'locked' => 0,
        'title_label' => $title_label
      );

      $type = node_type_set_defaults($type);
      node_type_save($type);
      node_add_body_field($type);
    }
  }

  /**
   * Create new taxonomy vocabulary
   *
   * @param $type
   * @param $name
   *
   * @return void
   */
  public static function createTaxonomyVocabulary($type, $name) {
    if(!in_array($type, taxonomy_get_vocabularies())) {
      $vocabulary = new stdClass();
      $vocabulary->name = $name;
      $vocabulary->machine_name = $type;
      $vocabulary->module = 'taxonomy';
      taxonomy_vocabulary_save($vocabulary);
    }
  }
}
