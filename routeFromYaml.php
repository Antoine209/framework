<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

require_once "vendor/autoload.php";

$locator = new FileLocator(__DIR__);
$yaml = new YamlFileLoader($locator);
$collection = $yaml->load("routes.yaml");

$uncontexte = new RequestContext('', 'GET');
$analyser = new UrlMatcher($collection, $uncontexte);

$findRoute = $analyser->match('/toto/tu');

var_dump($findRoute);