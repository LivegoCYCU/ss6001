<?php

namespace App\Repositories;

use App\Client;

class ClientRepository
{
    protected $album;

    // 透過 DI 注入 Model
    public function __construct(Client $client)
    {
        $this->model = $client;
    }


}
