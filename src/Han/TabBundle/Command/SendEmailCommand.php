<?php
/**
 * Created by IntelliJ IDEA.
 * User: tabhan
 * Date: 2018/5/28
 * Time: 1:01
 */

namespace Han\TabBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendEmailCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('tabhan:send-email')
            ->setDescription('send email')
            ->addArgument('email', InputArgument::REQUIRED, 'to email')
            ->addArgument('message', InputArgument::REQUIRED, 'the message');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('take_wave@163.com')
            ->setTo($input->getArgument('email'))
            ->setBody($input->getArgument('message'));

        $this->getContainer()->get('mailer')->send($message);

    }
}