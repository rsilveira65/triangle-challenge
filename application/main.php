#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use src\Command\TriangleCommand;

$application = new Application();
$application->add(new TriangleCommand());
$application->run();