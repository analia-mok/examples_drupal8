<?php

/**
 * @file
 */

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * @file
 * A simple form example.
 */

/**
 * A simple form implementation.
 */
class SimpleForm extends FormBase {

  /**
   * {@inheritDoc}
   */
  public function getFormId() {
    return 'example_02_basic_form_simple_form';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // @todo implement basic form here.

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // @todo implement custom logic for when this form is submitted.
  }

}
