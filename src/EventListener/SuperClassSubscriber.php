<?php


namespace Dev\Krsk\FileManager\EventListener;

use Dev\Krsk\FileManager\Entity\SuperClassInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @author Yuriy Yurinskiy <yuriyyurinskiy@yandex.ru>
 */
class SuperClassSubscriber
{
    /** @var TokenStorageInterface $tokenStorage */
    protected $tokenStorage;

    /**
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $token = $this->tokenStorage->getToken();

        if ($entity instanceof SuperClassInterface && !$entity->getCreatedAt()) {
            $entity->setCreatedAt();
        }

        if ($entity instanceof SuperClassInterface && $token instanceof TokenInterface && !$entity->getCreatedUser()) {
            $entity->setCreatedUser($token->getUser()->getUsername());
        }

    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $token = $this->tokenStorage->getToken();

        if ($entity instanceof SuperClassInterface && !$entity->getUpdatedAt()) {
            $entity->setUpdatedAt();
        }

        if ($entity instanceof SuperClassInterface && $token instanceof TokenInterface && !$entity->getUpdatedUser()) {
            $entity->setUpdatedUser($token->getUser()->getUsername());
        }
    }

    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        $token = $this->tokenStorage->getToken();

        if ($entity instanceof SuperClassInterface && !$entity->getDeletedAt()) {
            $entity->setDeletedAt();
        }

        if ($entity instanceof SuperClassInterface && $token instanceof TokenInterface && !$entity->getDeletedUser()) {
            $entity->setDeletedUser($token->getUser()->getUsername());
        }
    }
}