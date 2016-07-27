<?php

namespace ItBeaute\API;

use BeRest\API\Application;

class DevConfigs extends \BeRest\API\Configs
{
    public function preRun(Application $app)
    {
        parent::preRun($app);

        $app['redis.host'] = '127.0.0.1';
        $app['redis.port'] = '6379';

        $app['mysql.host'] = '127.0.0.1';
        $app['mysql.port'] = '3306';
        $app['mysql.user'] = 'root';
        $app['mysql.password'] = '123456';
        $app['mysql.db'] = 'berest';
    }
}