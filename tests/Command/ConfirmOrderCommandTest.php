<?php

namespace App\Tests\Command;

use App\Orders\ConfirmOrderBundle\Command\ConfirmOrderCommand;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ConfirmOrderCommandTest extends KernelTestCase
{
    /**
     * Test OrderConfirmCommand should not run by own expect Exception
     */
    public function testOrderConfirmCommandShouldNotRun(): void
    {
        $this->expectException("Exception");
        $this->expectExceptionMessage("app:order-confirm command is a member of app:order-create command chain and cannot be executed on its own.");
        $kernel = static::createKernel();
        $application = new Application($kernel);
        $application->setAutoExit(false);
        $command = $application->find('app:order-confirm');
        $commandTester = new CommandTester($command);
        $commandTester->execute([], []);
    }
}
