<?php
// src/AppBundle/Command/GreetCommand.php
namespace Wissend\Bundle\CustomBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\HttpKernel\KernelInterface;
use Sensio\Bundle\GeneratorBundle\Model\Bundle;



class AddrouteCommand extends ContainerAwareCommand
{
    
    protected $container;

    /*protected function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }*/

    protected function configure()
    {
        $this->setName('wissend:addroute');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {        
       // public ContainerBuilder $container
        try{
            $this->container = $this->getApplication()->getKernel()->getContainer();

            $yaml = Yaml::parse(file_get_contents($this->container->get('kernel')->getRootDir() .'/config/routing.yml'));
                $wissend_custom_array=array();
                $wissend_custom_array['resource']='@WissendCustomBundle/Resources/config/routing.yml';
                $wissend_custom_array['prefix']='/wissend';
                if(!array_key_exists('wissend_custom', $yaml)){
                    $yaml['wissend_custom'] =$wissend_custom_array;
                    $afteryaml = Yaml::dump($yaml);
                    file_put_contents($this->container->get('kernel')->getRootDir() .'/config/routing.yml', $afteryaml);
                    $output->writeln("Successfully saved into routing yml");
                }
            }catch(\Exception $e){
               $output->writeln("Exception in writing into routing yml reason : ".$e->getMessage()); 
            }
    }

    

}