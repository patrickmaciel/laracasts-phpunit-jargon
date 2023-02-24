<?php

namespace tests;

class GatewayStub implements \App\Gateway
{

    public function create()
    {
        return 'receipt-stub';
    }
}