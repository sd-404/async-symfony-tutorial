<?php

namespace App\Controller;

use App\Message\SendEmailNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Bridge\Amqp\Transport\AmqpStamp;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET", "POST"})
     */
    public function index(Request $request, ValidatorInterface $validator, MessageBusInterface $messageBus): Response
    {
        if($request->isMethod('POST') && $email = $request->request->get('email'))
        {
            $emailConstraint = new Assert\Email();
            $emailConstraint->message = 'Invalid email address';

            $errors = $validator->validate(
                $email,
                $emailConstraint
            );

            if (0 === count($errors))
            {
                $message = new SendEmailNotification($email);

                $envelope = new Envelope($message, [
                    new AmqpStamp('normal')
                ]);

                $messageBus->dispatch($envelope);
            }
            else
            {
                $errorMessage = $errors[0]->getMessage();
            }

        }

        return $this->render('home/index.html.twig');
    }
}
