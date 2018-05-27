<?php

namespace Han\TabBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductListCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('product:list')
            ->setDescription('List all products');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('HanTabBundle:Product')->findAll();

        $output->writeln("id\tname\tprice\tdescription");
        $output->writeln('----------------------------');
        foreach ($products as $product) {
            $output->writeln($product->getId() . "\t" . $product->getName() . "\t" . $product->getPrice() . "\t" . $product->getDescription());
        }
    }

    /**
     * Shortcut to return the Doctrine Registry service.
     *
     * @return Registry
     *
     * @throws \LogicException If DoctrineBundle is not available
     */
    public function getDoctrine()
    {
        if (!$this->getContainer()->has('doctrine')) {
            throw new \LogicException('The DoctrineBundle is not registered in your application.');
        }

        return $this->getContainer()->get('doctrine');
    }
}
