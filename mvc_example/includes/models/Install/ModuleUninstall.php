<?php

/**
 * @file
 * Implements module uninstall functions
 */

abstract class ModuleUninstall {

  /**
   * Delete node type and all nodes
   *
   * @param $type
   *
   * @return void
   * @throws \Exception
   */
  public static function deleteNodeType($type) {
    if ($type) {
      $query = db_select('node', 'n')
        ->fields('n', array('nid'))
        ->condition('n.type', $type);
      $nids = $query->execute()->fetchCol();

      if (!empty($nids)) {
        node_delete_multiple($nids);
      }

      node_type_delete($type);
      drupal_flush_all_caches();
      drupal_set_message('The content type "Products" has been deleted.');
    } else {
      throw new Exception('Type must not be empty');
    }
  }

  /**
   * Delete vocabulary and all terms
   *
   * @param $vocabulary_name
   *
   * @return void
   * @throws \Exception
   */
  public static function deleteTaxonomyVocabulary($vocabulary_name) {
    $vocabulary = taxonomy_vocabulary_machine_name_load($vocabulary_name);
    taxonomy_vocabulary_delete($vocabulary->vid);
  }
}
