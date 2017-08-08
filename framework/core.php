<?php

    /**
     * This function will get the values from .env file
     * and store it to environment variables
     *
     * @param string $key
     * @param string $value
     * @return string
     */
    function env($key = '', $value = ''): string
    {
        if (!empty($key)) {
            $configValue = getenv($key);
            $value = !empty($configValue) ? $configValue : $value;
        }

        return $value;
    }

    /**
     * Print and die with a given data
     *
     * @param $data
     * @return void
     */
    function dd($data): void
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die;
    }

    /**
     * Read file and get config values inside the /config folder
     *
     * @param $keys
     * @param string $default
     * @return array|mixed|null
     */
    function config($keys, $default = '')
    {
        $parts = explode('.', $keys);
        $fileName = $parts[0] . '.php';
        $config = new \Requtize\Config\Config();
        $config = $config->import(__DIR__ . '/../config/' . $fileName);

        if (count($parts) == 1) {
            return $config->all();
        } else {
            unset($parts[0]);

            return $config->get(implode('.', $parts), $default);
        }
    }

    /**
     * Build the application URL, with an optional appended part
     *
     * @param string $append
     * @return string
     */
    function url($append = ''): string
    {
        $url = env('APP_PATH');

        if(strpos($append, '/') === 0) {
            $url .= substr($append, 1);
        } else {
            $url .= $append;
        }

        return $url;
    }

    /**
     * Get the relative path of the document root
     *
     * @return string
     */
    function public_path(): string
    {
        $globals = \Zend\Diactoros\ServerRequestFactory::fromGlobals()->getServerParams();

        return $globals['DOCUMENT_ROOT'];
    }

    /**
     * Get the relative path of the storage folder
     *
     * @return string
     */
    function storage_path(): string
    {
        $publicPath = public_path();

        return dirname($publicPath) . '/storage';
    }

    /**
     * Route resolver to auto fix dependency injection issues with PHP-DI.
     *
     * Class RouterResolver
     */
    class RouterResolver implements Phroute\Phroute\HandlerResolverInterface
    {
        private $container;

        public function __construct(DI\Container $container)
        {
            $this->container = $container;
        }

        public function resolve($handler)
        {
            if (is_array($handler) && is_string($handler[0])) {
                $handler[0] = $this->container->get($handler[0]);
            }

            return $handler;
        }
    }