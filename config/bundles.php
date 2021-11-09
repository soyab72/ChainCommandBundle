<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class => ['all' => true],
    App\Orders\CreateOrderBundle\OrderCreateBundle::class => ['all' => true],
    App\Orders\ConfirmOrderBundle\OrderConfirmBundle::class => ['all' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class => ['dev' => true],
];
