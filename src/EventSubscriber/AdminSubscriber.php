<?php

namespace App\EventSubscriber;

use App\Entity\Article;
use App\Model\TimestampedInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use PhpParser\Node\Expr\Array_;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents():array
    {
        return [
            BeforeEntityPersistedEvent::class => ['setEntityCreatedAt'],
            BeforeEntityUpdatedEvent::class => ['setEntityUpdatedAt']
        ];
    }
    public function setEntityCreatedAt(BeforeEntityPersistedEvent $event) :void
    {
        /** @var Article $entity */
        $entity = $event->getEntityInstance();
        if(!$entity instanceof TimestampedInterface)
        {
            return;
        }
        $entity->setCreatedAt(new \DateTime());
        dump($entity);
    }

    public function setEntityUpdatedAt(BeforeEntityUpdatedEvent $event) :void
    {
        $entity = $event->getEntityInstance();

        if(!$entity instanceof TimestampedInterface)
        {
            return;
        }
        $entity->setUpdatedAt(new \DateTime());
    }
}