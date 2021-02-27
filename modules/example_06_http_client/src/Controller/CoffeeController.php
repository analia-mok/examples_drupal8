<?php

namespace Drupal\example_06_http_client\Controller;

use Drupal\Core\Controller\ControllerBase;
use GuzzleHttp\ClientInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Controller with dependency injection.
 */
class CoffeeController extends ControllerBase {

  /**
   * The HTTP Client Manager.
   *
   * @var \GuzzleHttp\Client
   */
  protected $httpClient;

  /**
   * {@inheritDoc}
   */
  public function __construct(ClientInterface $httpClient) {
    $this->httpClient = $httpClient;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('http_client')
    );
  }

  /**
   * Requests and displays coffees.
   *
   * @see https://sampleapis.com/api-list/coffee
   */
  public function list(Request $request) {

    $options['headers'] = [
      'Content-Type' => 'application/json',
    ];

    $url = 'https://api.sampleapis.com/coffee/hot';

    try {
      $response = $this->httpClient->request('GET', $url, $options);
      $coffees = json_decode($response->getBody(), TRUE) ?? [];
    }
    catch (\Exception $e) {
      $errors = $e->getMessage();
    }

    return [
      '#theme' => 'examples_coffees_list',
      '#coffees' => $coffees ?? [],
      '#errors' => $errors ?? '',
    ];
  }

}
