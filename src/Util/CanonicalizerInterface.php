<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Util;

interface CanonicalizerInterface
{
    /**
     * @param string|null $string
     *
     * @return string|null
     *
     * @phpstan-return ($string is null ? null : string)
     */
    public function canonicalize($string);
}
