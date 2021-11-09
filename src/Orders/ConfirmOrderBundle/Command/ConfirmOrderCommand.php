<?php


namespace App\Orders\ConfirmOrderBundle\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class ConfirmOrderCommand extends Command
{

    // This var will decide command run by own or not by default false for child command
    public bool $runCommand;

    // For logging
    protected LoggerInterface $logger;

    /**
     * Class constructor
     * @param LoggerInterface $logger
     * @param bool $runCommand
     */
    public function __construct(LoggerInterface $logger,$runCommand = false)
    {
        $this->runCommand = $runCommand;
        $this->logger = $logger;

        parent::__construct();
    }

    /**
     * This function used for configuration of command
     * @return void
     */
    protected function configure(): void
    {
        // Register command
        $this->setName('app:order-confirm')
            ->setDescription('Confirm a order.');
    }

    /**
     * This function will execute command
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($this->runCommand) {
            $output->writeln('Order Confirmed');
            $this->logger->info("Executing app:order-confirm chain members:", []);
            $this->logger->info("Order Confirmed from ConfirmOrderCommand", []);
            return Command::SUCCESS;
        } else {
            throw new \Exception('app:order-confirm command is a member of app:order-create command chain and cannot be executed on its own.');
        }
    }
}
