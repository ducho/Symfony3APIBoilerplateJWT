<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class HelloController extends Controller
{
    /**
     * @Route("/", name="hello")
     */
    public function indexAction(Request $request)
    {
        return new JsonResponse(['hello' => 'This is a simple example of resource returned by your APIs']);
    }
}
