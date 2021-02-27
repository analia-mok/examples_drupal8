<?php

namespace Drupal\example_04_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * A simple block class.
 *
 * @Block(
 *  id = "example_04_simple_block",
 *  admin_label = @Translation("Simple Block"),
 *  category = @Translation("Example 04"),
 * )
 */
class SimpleBlock extends BlockBase {

  /**
   * {@inheritDoc}
   */
  public function defaultConfiguration() {
    // NOTE: This method (along with blockForm and blockSubmit) is not
    // required if you do not need this block to be configurable.
    return [
      // @todo your custom additions
      'description' => '',
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritDoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    // NOTE: This method (along with defaultConfiguration and blockSubmit) is not
    // required if you do not need this block to be configurable.
    $form['description'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Description'),
      '#default_value' => $this->configuration['description'],
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    // NOTE: This method (along with defaultConfiguration and blockForm) is not
    // required if you do not need this block to be configurable.
    $this->configuration['description'] = $form_state->getValue('description');
  }

  /**
   * {@inheritDoc}
   */
  public function build() {
    return [
      '#type' => 'markup',
      '#markup' => $this->configuration['description'] ?? 'nothing saved here',
    ];
  }

}
