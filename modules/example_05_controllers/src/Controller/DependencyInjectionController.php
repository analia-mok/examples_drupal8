<?php

namespace Drupal\example_05_controllers\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller with dependency injection.
 */
class DependencyInjectionController extends ControllerBase {

  /**
   * The current user.
   *
   * @var \Drupal\user\Entity\User
   */
  protected $currentUser;

  /**
   * {@inheritDoc}
   */
  public function __construct(AccountInterface $currentUser, EntityTypeManager $entityTypeManager) {
    if ($currentUser) {
      $this->currentUser = $entityTypeManager->getStorage('user')->load($currentUser->id());
    }
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('current_user'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * Shows information related to the current user.
   */
  public function show(Request $request) {

    $username = $this->currentUser->getAccountName();
    $email = $this->currentUser->getEmail();

    $markup = "Current User: {$username} / {$email}";

    if ($this->currentUser->hasField('field_some_custom_field') && $this->currentUser->get('field_some_custom_field')->isEmpty()) {
      $customField = $this->currentUser->get('field_some_custom_field')->getString();
      $markup .= $customField;
    }

    return [
      '#type' => 'markup',
      '#markup' => $markup,
    ];
  }

}
