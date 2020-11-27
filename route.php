<?php

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

require_once "vendor/autoload.php";

$routeIndex = new Route('/index');
$routeIndex->setMethods(['GET']);

$autreRoute = new Route('/toto/{suite}');
$autreRoute->setRequirement('suite', '[a-z]{2}');
$autreRoute->addDefaults(['cle'=>1, 'suite'=>'je']);

$collection = new RouteCollection();
$collection->add('home', $routeIndex);
$collection->add('autre', $autreRoute);

$uncontexte = new RequestContext('', 'GET');
$analyser = new UrlMatcher($collection, $uncontexte);

$findRoute = $analyser->match('/toto/tu');

var_dump($findRoute);