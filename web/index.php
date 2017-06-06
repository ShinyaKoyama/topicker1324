<?php

require('../vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

phpinfo();

$app = new Silex\Application();
$bot = new CU\LineBot();

$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => 'php://stderr',
));

$app->before(function (Request $request) use($bot) {
    // Signature validation
    $request_body = $request->getContent();
    $signature = $request->headers->get('X-LINE-CHANNELSIGNATURE');
    if (!$bot->isValid($signature, $request_body)) {
        return new Response('Signature validation failed.', 400);
    }
});

$app->post('/callback', function (Request $request) use ($app, $bot) {
    ob_start();
    $raw = file_get_contents('php://input');
    var_dump(json_decode($raw,1));
    $raw = ob_get_clean();
    file_put_contents('/tmp/dump.txt', $raw."\n=====================================\n", FILE_APPEND);
    echo "OK";
    
    // Let's hack from here!
    $body = json_decode($request->getContent(), true);

    foreach ($body['result'] as $obj) {
        $app['monolog']->addInfo(sprintf('obj: %s', json_encode($obj)));
        $from = $obj['content']['from'];
        $content = $obj['content'];

        if ($content['text']) {
            $bot->sendText($from, sprintf('%sじゃない', $content['text'])); 
        }
    }

    return 0;
});

$app->run();

