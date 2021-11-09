<?php


namespace App\Orders\CreateOrderBundle\Command;


use App\Orders\ChainCommandBundle\Concerns\ChainCommandTrait;
use App\Orders\ChainCommandBundle\Contracts\ChainCommandInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class CreateOrderCommand extends Command implements ChainCommandInterface
{
    use ChainCommandTrait;

    // For logging
    protected $logger;

    /**
     * Class constructor
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
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
        $this->setName('app:order-create')
            ->setDescription('Creates a new order.');

        $this->logger->info("app:order-create is a master command of a command chain that has registered member commands", []);
        $this->logger->info("app:order-confirm registered as a member of app:order-create command chain", []);

        // Register child as chain command
        $this->registerChainCommand('app:order-confirm');
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
        $output->writeln('New Order Created');

        $this->logger->info("Executing app:order-create command itself first:", []);
        $this->logger->info("New Order Created from CreateOrderCommand", []);

        // Now run chain command
        $this->triggerChainCommands($output, $this->logger);

        return Command::SUCCESS;
    }
}
