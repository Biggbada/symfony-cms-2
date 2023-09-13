<?php

namespace App\Events;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Contracts\EventDispatcher\Event;

class ProviderCreatedEvent extends Event
{
    public const NAME = "provider.created";
}