<?php

class Kernel {
    protected $routeMiddleware = [
        //Add to your middleware
        'validateroute' => \App\Http\Middleware\ValidateRoute::class,
    ];
}