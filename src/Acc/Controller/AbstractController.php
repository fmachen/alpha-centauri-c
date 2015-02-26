<?php

namespace Acc\Controller;

class AbstractController {

    /**
     *
     * @var Silex\Application
     */
    protected $app;

    public function __construct($app) {
        $this->app = $app;
    }

}
