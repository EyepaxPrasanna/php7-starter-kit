<?php

    use Phroute\Phroute\RouteCollector;

    $router = new RouteCollector();

    $router->get('/users', ['App\controllers\UsersController', 'getUsersListing']);
    $router->get('/users/{user_id}',
        ['App\controllers\UsersController', 'getUserDetail']);
    $router->post('/users/create', ['App\controllers\UsersController', 'store']);



    try {
        // Custom route resolver to handle DI issues
        $resolver = new RouterResolver($container);
        $dispatcher = new Phroute\Phroute\Dispatcher($router->getData(), $resolver);

        $response = $dispatcher->dispatch(
            $_SERVER['REQUEST_METHOD'],
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );

        // Print the output
        echo json_encode($response);
    } // Handle the route not found exception
    catch (Phroute\Phroute\Exception\HttpRouteNotFoundException $ex) {
        die('Route not found');
    } // Handle the route method not accepted exception
    catch (Phroute\Phroute\Exception\HttpMethodNotAllowedException $ex) {
        die('Route method not allowed');
    } // Handle any other exceptions
    catch (\Exception $ex) {
        die($ex->getMessage());
    }