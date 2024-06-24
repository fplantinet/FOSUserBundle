<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Inject RememberMeServices into LoginManager.
 *
 * @author Vasily Khayrulin <sirianru@gmail.com>
 *
 * @internal
 */
final class InjectRememberMeServicesPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $firewallName = $container->getParameter('fos_user.firewall_name');
        \assert(\is_string($firewallName));
        $loginManager = $container->getDefinition('fos_user.security.login_manager');

        if ($container->has('security.authenticator.remember_me_handler.'.$firewallName)) {
            $loginManager->replaceArgument(4, new Reference('security.authenticator.remember_me_handler.'.$firewallName));
        }
    }
}
