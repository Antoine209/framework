<?php

require_once '../vendor/autoload.php';

$validator = \Symfony\Component\Validator\Validation::createValidator();
$contrainte = new \Symfony\Component\Validator\Constraints\NotBlank();

$resultat = $validator->validate('', $contrainte);

if (count($resultat) > 0) {
    /** @var Symfony\Component\Validator\ConstraintViolation $error */
    foreach ($resultat as $error) {
        echo $error->getMessage();
    }
} else {
    echo "test passé avec succès";
}