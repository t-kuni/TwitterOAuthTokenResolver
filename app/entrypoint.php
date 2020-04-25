<?php
declare(ticks = 1);

namespace TKuni\TwitterOAuthTokenResolver;

require_once __DIR__ . '/vendor/autoload.php';

$app = new App();
$app->run();