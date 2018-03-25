<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) kcloze <pei.greet@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Coroutine\Queue\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class  RabbitmqCommand extends Command
{
    protected function configure()
    {
        $this->setName('rabbitmq:listen')
            ->setDescription('rabbitmq queue listen');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello World');
        $config=[
            'host'          => '192.168.9.24',
            'user'          => 'phpadmin',
            'pass'          => 'phpadmin',
            'port'          => '5671',
            'vhost'         => 'php',
            'exchange'      => 'php.amqp.ext',
        ];
        $queue=new \Coroutine\Queue\Driver\RabbitMQ\Queue($config);
        $queue->listen();
        
    }
}