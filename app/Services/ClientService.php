<?php

namespace App\Services;

use App\Repositories\ClientRepository;
use App\Enums\ClientType;

class ClientService 
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function getClientTypeList(){
        return [
            ClientType::SHOPEE => trans('client.shopee'),
            ClientType::ADVERTISEMENT => trans('client.advertisement'),
            ClientType::SHOPE => trans('client.shop'),
            ClientType::UBEREAT => trans('client.ubereat'),
            ClientType::FOODPANDA => trans('client.foodpanda')
        ];
    }
    

}
