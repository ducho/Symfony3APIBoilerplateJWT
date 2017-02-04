<?php

namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\Response;
use AppBundle\Event\EmailForgotPasswordEvent;

class MailForgotPasswordListener
{
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function onMailForgotPasswordEvent(EmailForgotPasswordEvent $event)
    {
        $user = $event->getUser();
        $email = $event->getUser()->getEmail();
        $password = $event->getUser()->getPassword();

        $message = \Swift_Message::newInstance()
            ->setSubject('Change Password Success!')
            ->setFrom($email)
            ->setTo($email)
            ->setBody('Change Password Success! This is your new password: ' . $password)
    /*
            ->setBody(
                $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                    'emails/forgotPassword.html.twig',
                    array('name' => $name)
                ),
                'text/html'
            )
    */
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/forgotPassword.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;

        $this->mailer->send($message);
    }
}
