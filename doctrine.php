#!/usr/bin/env php
<?php
use ImmediateSolutions\Console\Doctrine\Kernel;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

require __DIR__.'/bootstrap/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';


$kernel = $app->make(Kernel::class);

$status = $kernel->handle(
    $input = new ArgvInput(),
    new ConsoleOutput()
);

$kernel->terminate($input, $status);

exit($status);