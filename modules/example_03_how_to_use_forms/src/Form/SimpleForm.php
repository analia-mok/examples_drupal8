<?php

namespace Drupal\example_03_how_to_use_forms\Form;

/**
 * @file
 * Defines a basic form.
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
    return 'example_03_how_to_use_form_simple_form';
  }

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#description' => $this->t('Enter your first name'),
    ];

    $form['email_address'] = [
      '#type' => 'email',
      '#title' => $this->t('Email Address'),
      '#description' => $this->t('Enter your email address'),
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // @todo implement custom logic for when this form is submitted.
    $this->messenger()->addMessage($this->t('Form has been successfully submitted!'));
  }

}
