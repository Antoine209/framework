<?php
require_once "../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Response;

$maReponse = new Response();

$maReponse->setStatusCode(Response::HTTP_OK);
$maReponse->headers->set('Content-Type', 'text/html');
$maReponse->setContent('<html><title>reponse</title><body>resultat d\'un objet reponse</body></html>');

$maReponse->send();