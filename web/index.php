<?php
    declare(strict_types = 1);

    require __DIR__ . '/../vendor/autoload.php';

    $dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
    $dotenv->load();

    /*
     * Load configuration
     */
    $configPath = __DIR__ . '/../bootstrap';
    $services = require $configPath . '/services.php';
    $middleware = require $configPath . '/middleware.php';

    require __DIR__ . '/../framework/core.php';

    /*
     * Build container
     */
    $containerBuilder = new DI\ContainerBuilder();
    $containerBuilder->addDefinitions($services);
    $container = $containerBuilder->build();

    /*
     * Included the routes after building the container.
     * So, dependency injections can be auto-fixed by route resolver.
     */
    require __DIR__ . '/../src/routes.php';

    /*
     * Build application middleware pipeline
     */
    $relayBuilder = $container->get(Relay\RelayBuilder::class);
    $app = $relayBuilder->newInstance($middleware);

    /*
     * Run application middleware pipeline
     */
    $request = $container->get('initial_request');
    $response = $container->get('initial_response');
    $response = $app($request, $response);

    /*
     * Emit response
     */
    $emitter = $container->get(Zend\Diactoros\Response\EmitterInterface::class);
    $emitter->emit($response);