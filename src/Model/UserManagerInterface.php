<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Model;

/**
 * Interface to be implemented by user managers. This adds an additional level
 * of abstraction between your application, and the actual repository.
 *
 * All changes to users should happen through this interface.
 *
 * The class also contains ACL annotations which will only work if you have the
 * SecurityExtraBundle installed, otherwise they will simply be ignored.
 *
 * @author Gordon Franke <info@nevalon.de>
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
interface UserManagerInterface
{
    /**
     * Creates an empty user instance.
     */
    public function createUser(): UserInterface;

    /**
     * Deletes a user.
     */
    public function deleteUser(UserInterface $user): void;

    /**
     * Finds one user by the given criteria.
     *
     * @param array<string, mixed> $criteria
     */
    public function findUserBy(array $criteria): ?UserInterface;

    /**
     * Find a user by its username.
     *
     * @param string $username
     */
    public function findUserByUsername($username): ?UserInterface;

    /**
     * Finds a user by its email.
     *
     * @param string $email
     */
    public function findUserByEmail($email): ?UserInterface;

    public function findUserByClient($client): ?UserInterface;

    /**
     * Finds a user by its username or email.
     *
     * @param string $usernameOrEmail
     */
    public function findUserByUsernameOrEmail($usernameOrEmail): ?UserInterface;

    /**
     * Finds a user by its confirmationToken.
     *
     * @param string $token
     */
    public function findUserByConfirmationToken($token): ?UserInterface;

    /**
     * Returns a collection with all user instances.
     *
     * @return iterable<UserInterface>
     */
    public function findUsers(): iterable;

    /**
     * Returns the user's fully qualified class name.
     *
     * @phpstan-return class-string<UserInterface>
     */
    public function getClass(): string;

    /**
     * Reloads a user.
     */
    public function reloadUser(UserInterface $user): void;

    /**
     * Updates a user.
     */
    public function updateUser(UserInterface $user): void;

    /**
     * Updates the canonical username and email fields for a user.
     */
    public function updateCanonicalFields(UserInterface $user): void;

    /**
     * Updates a user password if a plain password is set.
     */
    public function updatePassword(UserInterface $user): void;
}
