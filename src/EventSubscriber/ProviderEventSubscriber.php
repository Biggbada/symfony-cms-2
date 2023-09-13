<?php

namespace App\EventSubscriber;

use App\Events\ProviderCreatedEvent;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ProviderEventSubscriber implements EventSubscriberInterface
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function onProviderCreated(ProviderCreatedEvent $event): void
    {
        $email = (new Email())
            ->from('hello@example.com')
            ->to('biggbadaboom@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');
        try {
            $this->mailer->send($email, null);
        } catch (TransportExceptionInterface $e) {
            dd($e);
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ProviderCreatedEvent::NAME => 'onProviderCreated',
        ];
    }
}
