<?php

namespace Drupal\example_03_how_to_use_forms\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\example_03_how_to_use_forms\Form\SimpleForm;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * A simple controller that defines route callbacks.
 */
class SimpleController extends ControllerBase {

  /**
   * Route callback.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The incoming request.
   *
   * @return array
   *   A render array containing the page's content.
   */
  public function index(Request $request) {

    $renderedForm = $this->formBuilder()->getForm(SimpleForm::class);

    return $renderedForm;
  }

}
