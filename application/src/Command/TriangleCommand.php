<?php

namespace src\Command;

use src\Helper\CommandLineError;
use src\Logger\ApplicationLogger;
use src\Serializer\TableSerializer;
use src\Triangle\Triangle;
use src\Triangle\TriangleBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class TriangleCommand
 * @package src\Command
 */
class TriangleCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('run:calculate')
            ->addOption('sideA', 'sideA', InputOption::VALUE_REQUIRED)
            ->addOption('sideB', 'sideB', InputOption::VALUE_REQUIRED)
            ->addOption('sideC', 'sideC', InputOption::VALUE_REQUIRED);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return mixed
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            /** @var TriangleBuilder $triangleBuilder */
            $triangleBuilder = new TriangleBuilder();
            $triangleBuilder
                ->createTriangle()
                ->addSides([
                    $this->validateParameters($input->getOption('sideA')),
                    $this->validateParameters($input->getOption('sideB')),
                    $this->validateParameters($input->getOption('sideC')),
                ]);

            /** @var Triangle $triangle */
            $triangle = $triangleBuilder->getTriangle();

            $triangle->calculateType();

            $tableSerializer = new TableSerializer($triangle, new Table($output));

            $tableSerializer->serialize();

        } catch (\Exception $e) {
            $logger = new ApplicationLogger();
            $logger->log($e->getMessage(), $e->getCode());
            $output->writeln($e->getMessage());
        }
    }

    /**
     * @param $parameter
     * @return mixed
     * @throws \Exception
     */
    protected function validateParameters($parameter)
    {
        if (empty($parameter) or $parameter == 0) {
            throw new \Exception('Please add a valid argument.', CommandLineError::INVALID_ARGUMENT);
        }

        return $parameter;
    }
}