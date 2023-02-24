<?php

namespace Tests;

use App\Gateway;

class FakeGateway implements Gateway
{
    public function create()
    {
        // performs the Stripe HTTP request
        var_dump('Fake Gateway HTTP request in progress');
        ob_flush();
    }
}