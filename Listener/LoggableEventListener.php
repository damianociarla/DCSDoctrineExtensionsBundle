<?php

namespace DCS\DoctrineExtensionsBundle\Listener;

use Gedmo\Loggable\LoggableListener;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class LoggableEventListener
{
    private $loggableListener;
    private $container;

    public function __construct(LoggableListener $loggableListener, ContainerInterface $container = null)
    {
        $this->loggableListener = $loggableListener;
        $this->container = $container;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (null === $this->securityContext) {
            return;
        }

        if ($this->container->has('security.token_storage')) {
            // Symfony >= 2.6
            $token = $this->container->get('security.token_storage')->getToken();
            $checker = $this->get('security.authorization_checker');
        } else {
            // Symfony < 2.6
            $checker = $this->get('security.context');
            $token = $checker->getToken();
        }

        if (null !== $token && $checker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $this->loggableListener->setUsername($token);
        }
    }
}