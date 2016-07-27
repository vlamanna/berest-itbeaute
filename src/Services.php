<?php

namespace ItBeaute\API;

use BeRest\API\Application;

class Services extends \BeRest\API\Services
{
    public function initialize(Application $app)
    {
        parent::initialize($app);

        $app->register(new \BeRest\API\Providers\MySqlServiceProvider());
        $app->register(new \BeRest\API\Providers\RedisServiceProvider());
    }
}