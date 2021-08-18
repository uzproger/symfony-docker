<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController.
 */
final class DefaultController extends AbstractController
{
    /**
     * @return Response
     */
    public function home(): Response
    {
        return new Response('<h1>Hello Symfony!!!</h1>');
    }
}
