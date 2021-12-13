<?php

$rules = require __DIR__ . '/.php-cs-fixer.rules.php';

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude([
        'var',
        'src/Entity'
    ])
;

return (new PhpCsFixer\Config())
    ->setRules($rules)
    ->setFinder($finder)
;
