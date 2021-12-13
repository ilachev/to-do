<?php

$rules = require __DIR__ . '/.php-cs-fixer.rules.php';

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__.'/src/Entity')
;

return (new PhpCsFixer\Config())
    ->setRules(array_merge($rules, ['final_class' => false]))
    ->setFinder($finder)
;
