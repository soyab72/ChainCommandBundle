<?php


namespace App\Orders\ChainCommandBundle\Contracts;


interface ChainCommandInterface
{
    /**
     * Chaining Command
     *
     * @param $output
     * @param $logger
     * @return void
     */
    public function triggerChainCommands($output, $logger) :void;

    /**
     * Register a master command
     *
     * @param string $command
     */
    public function registerChainCommand(string $command): void;
}
