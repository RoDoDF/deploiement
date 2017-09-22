<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class HelloRssController extends ControllerBase {

  public function content() {
    // Option 1
    $response = new Response();
    $response->headers->set('Content-Type', 'application/json');
    $response->setContent(json_encode(array('pim', 'pam', 'poum' => 4)));


    // Option 2
    $response = new JsonResponse(array('pim', 'pam', 'poum' => 4));

    return $response;
  }
}
