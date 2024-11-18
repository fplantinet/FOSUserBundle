<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Security;

use FOS\UserBundle\Model\UserInterface;

class ClientProvider extends UserProvider
{
    protected function findUser($client): ?UserInterface
    {
        return $this->userManager->findUserByClient($client);
    }
}
