<?php

namespace DCS\DoctrineExtensionsBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Gedmo\Blameable\BlameableListener;

class BlameableEventListener
{
    private $blameableListener;
    private $container;

    public function __construct(BlameableListener $blameableListener, ContainerInterface $container = null)
    {
        $this->blameableListener = $blameableListener;
        $this->container = $container;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (null === $this->container) {
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
            $this->blameableListener->setUserValue($token->getUser());
        }
    }
}