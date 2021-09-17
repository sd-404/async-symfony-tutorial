<?php

namespace App\MessageHandler;

use App\Message\SendEmailNotification;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class SendEmailNotificationHandler implements MessageHandlerInterface
{
    private $params;
    private $mailer;

    public function __construct(ContainerBagInterface $params, MailerInterface $mailer)
    {
        $this->params = $params;
        $this->mailer = $mailer;
    }

    public function __invoke(SendEmailNotification $message)
    {
        $email = (new TemplatedEmail())
            ->from($this->params->get('system_mail'))
            ->to($message->getEmail())
            ->subject('Thank you for your order!')
            ->htmlTemplate('emails/order_confirmation.html.twig')
        ;

        try {
            $this->mailer->send($email);
        }catch (TransportExceptionInterface $e){

        }
    }
}
