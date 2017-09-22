<?php

namespace Drupal\hello\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * Provides a hello block.
 *
 * @Block(
 *  id = "hello_block",
 *  admin_label = @Translation("Hello!")
 * )
 */
class HelloBlock extends BlockBase {

  /**
   * Implements Drupal\Core\Block\BlockBase::build().
   */
  public function build() {

    $build = array(
      '#markup' => $this->t('Welcome %name. It is %time.', array(
        '%time' => \Drupal::service('date.formatter')->format(REQUEST_TIME, 'custom', 'H:i s\s'),
      )),
      '#cache' => array(
        'keys' => ['hello_block'],
        'max-age' => '10',
      ),
    );

    return $build;
  }

}
