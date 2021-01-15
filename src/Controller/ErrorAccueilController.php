<?php


namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;

class ErrorAccueilController
{
    public function info() {
        return new Response("url inaccessible");
    }
}