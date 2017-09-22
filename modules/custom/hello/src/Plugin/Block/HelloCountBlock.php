<?php

namespace Drupal\hello\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a hello count block.
 *
 * @Block(
 *  id = "hello_count_block",
 *  admin_label = @Translation("Hello count")
 * )
 */
class HelloCountBlock extends BlockBase {

  /**
   * Implements Drupal\Block\BlockBase::build().
   */
  public function build() {
    /*
    $database = \Drupal::database();
    kint($database);
    $select = $database->select('sessions', 's');
    kint($select);
    $statement = $select->countQuery()->execute();
    kint($statement);
    $number = $statement->fetchField();
    */

    $database = \Drupal::database();
    $number = $database->select('sessions', 's')
      ->countQuery()
      ->execute()
      ->fetchField();

    return array(
      '#markup'  => $this->t('Session number: %number', array('%number' => $number)),
      '#cache' => array('keys' => ['hello:sessions'], 'max-age' => '60'),
    );
  }

}
