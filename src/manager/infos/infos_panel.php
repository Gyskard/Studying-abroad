<?php

$_SESSION['numberAdmin'] = implode(bddVerif('numberAdmin', ''));
$_SESSION['numberUser'] = implode(bddVerif('numberUser', ''));
$_SESSION['numberVisitor'] = implode(bddVerif('numberVisitor', ''));

$config_testimonies = json_decode(file_get_contents(__DIR__ . '/../manager/config.json'));

$_SESSION['targetTestimonies'] = $config_testimonies->{'target'};
$_SESSION['numberTestimonies'] = numberFiles($_SESSION['targetTestimonies']);