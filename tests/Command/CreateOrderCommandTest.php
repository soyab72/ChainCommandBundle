<?php

namespace App\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class CreateOrderCommandTest extends KernelTestCase
{
    /**
     * Test order created or not
     */
    public function testOrderCreatedUsingMainCommand(): void
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);
        $application->setAutoExit(false);
        $command = $application->find('app:order-create');
        $commandTester = new CommandTester($command);
        $commandTester->execute([], []);
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('New Order Created', $output);
    }

    /**
     * Test order created or not
     */
    public function testOrderConfirmedFromChainCommand(): void
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);
        $application->setAutoExit(false);
        $command = $application->find('app:order-create');
        $commandTester = new CommandTester($command);
        $commandTester->execute([], []);
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('Order Confirmed', $output);
    }
}
