<?php

use CodeIgniter\CodingStandard\CodeIgniter4;
use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$ci4Ruleset = new CodeIgniter4();

$finder = Finder::create()
    ->in(__DIR__ . '/modules');

$config = new Config();
$config->setRules($ci4Ruleset->getRules())
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setUsingCache(false);

return $config;
