<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpKernel\Exception\HttpException;
use AppBundle\Form\ForgotPasswordType;
use AppBundle\Entity\User;
use AppBundle\Utils\PasswordGenerator;
use AppBundle\Event\EmailForgotPasswordEvent;

class ForgotPasswordController extends FOSRestController
{
    /**
     * @Route(path="api/forgotPassword", name="forgot_password")
     * @Method("POST")
     */
    public function postForgotPasswordAction(Request $request)
    {
        $user = new User();
        $passwordGenerator = new PasswordGenerator();
        $form = $this->createForm(ForgotPasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $email = $request->request->get('email');
            $em = $this->getDoctrine()->getManager();
            $userRepository = $em->getRepository(User::class)->findOneBy(['email' => $email]);
            $userRepository->setPassword($passwordGenerator->generatePassword());

			$event = new EmailForgotPasswordEvent($userRepository);
            $dispatcher = $this->get('event_dispatcher');
			$dispatcher->dispatch(EmailForgotPasswordEvent::NAME, $event);

			$em->persist($userRepository);
            $em->flush();

            return new JsonResponse(['status' => 'ok']);
        }

        throw new HttpException(400, "Invalid data");
    }
}
