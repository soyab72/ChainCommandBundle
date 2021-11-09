<?php

namespace App\Orders\ChainCommandBundle\Concerns;

use Symfony\Component\Console\Input\ArrayInput;

/**
 * Trait ChainCommandTrait
 *
 * This will be used for extend chain command functionality
 *
 */
trait ChainCommandTrait
{

    /**
     * List of all chain commands
     *
     * @var array
     */
    public array $chainCommands = [];

    /**
     * Register a master command
     *
     * @param string $command
     */
    public function registerChainCommand(string $command): void
    {
        $this->chainCommands[] = $command;
    }

    /**
     * Chaining Command
     *
     * @param $output
     * @param $logger
     * @return void
     * @throws \Exception
     */
    public function triggerChainCommands($output, $logger) :void
    {
        //Here used single child command so did not used loop
        if(empty($this->chainCommands[0])){
            return;
        }
        $command = $this->getApplication()->find($this->chainCommands[0]);
        $command->runCommand = true;
        $input = new ArrayInput([]);
        $command->run($input, $output);
        $logger->info("Execution of app:order-create chain completed.", []);
    }
}
