<?php

declare(strict_types=1);

namespace Conceptive\CustomCommand\Console\Command;

use Magento\Framework\Exception\LocalizedException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Demo extends Command
{
    private const NAME = 'name';

    protected function configure(): void
    {
        $this->setName('conceptive:demo');
        $this->setDescription('This is my first console command.');
        $this->addOption(
            self::NAME,
            null,
            InputOption::VALUE_REQUIRED,
            'Name'
        );

        parent::configure();
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $exitCode = 0;

        if ($name = $input->getOption(self::NAME)) {
            $output->writeln('<info>Provided name is `' . $name . '`</info>');
        }

        $output->writeln('simple message');
        // green text
        $output->writeln('<info>Success message.</info>');

        // yellow text
        $output->writeln('<comment>Some comment.</comment>');

        // black text on a cyan background
        $output->writeln('<question>foo</question>');

        // white text on a red background
        $output->writeln('<error>foo</error>');

        // progress bar
        $progressBar = new ProgressBar($output, 10);
        for($i = 0 ; $i < 10 ; $i++) {
            $progressBar->advance();
            sleep(1);
        }

        try {
            if (rand(0, 1)) {
                throw new LocalizedException(__('An error occurred.'));
            }
        } catch (LocalizedException $e) {
            $output->writeln(sprintf(
                '<error>%s</error>',
                $e->getMessage()
            ));
            $exitCode = 1;
        }

        return $exitCode;
    }
}
