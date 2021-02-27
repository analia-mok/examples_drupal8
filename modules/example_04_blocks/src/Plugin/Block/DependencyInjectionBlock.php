<?php

namespace Drupal\example_04_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * A block showcasing dependency injection.
 *
 * @Block(
 *  id = "example_04_dependency_injection_block",
 *  admin_label = @Translation("Dependency Injection Block"),
 *  category = @Translation("Example 04"),
 * )
 */
class DependencyInjectionBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Current user.
   *
   * @var \Drupal\user\Entity\User
   */
  protected $currentUser;

  /**
   * {@inheritDoc}
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    AccountInterface $current_user,
    EntityTypeManagerInterface $entityTypeManager) {

    parent::__construct($configuration, $plugin_id, $plugin_definition);

    if ($current_user) {
      $this->currentUser = $entityTypeManager->getStorage('user')->load($current_user->id());
    }
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_defintion) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_defintion,
      $container->get('current_user'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritDoc}
   */
  public function build() {

    $currentUserName = $this->currentUser->getDisplayName();
    $currentUserEmail = $this->currentUser->getEmail();
    $markup = "Current User: {$currentUserName} / {$currentUserEmail}";

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
