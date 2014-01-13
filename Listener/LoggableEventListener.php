<?php

namespace DCS\DoctrineExtensionsBundle\Listener;

use Gedmo\Loggable\LoggableListener;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\SecurityContextInterface;

class LoggableEventListener
{
    /**
     * @var \Symfony\Component\Security\Core\SecurityContextInterface
     */
    private $securityContext;

    /**
     * @var \Gedmo\Loggable\LoggableListener
     */
    private $loggableListener;

    public function __construct(LoggableListener $loggableListener, SecurityContextInterface $securityContext = null)
    {
        $this->loggableListener = $loggableListener;
        $this->securityContext = $securityContext;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (null === $this->securityContext) {
            return;
        }

        $token = $this->securityContext->getToken();
        if (null !== $token && $this->securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $this->loggableListener->setUsername($token);
        }
    }
}