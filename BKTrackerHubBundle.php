<?php

namespace BK\TrackerHubBundle;

use BK\TrackerHubBundle\DependencyInjection\CompilerPass\ClientPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class BKTrackerHubBundle extends Bundle
{

    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new ClientPass());
    }

}
