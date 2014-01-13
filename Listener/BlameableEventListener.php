<?php

namespace DCS\DoctrineExtensionsBundle\Listener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Gedmo\Blameable\BlameableListener;

class BlameableEventListener
{
    /**
    * @var \Symfony\Component\Security\Core\SecurityContextInterface
    */
    private $securityContext;

    /**
    * @var \Gedmo\Blameable\BlameableListener
    */
    private $blameableListener;

    public function __construct(BlameableListener $blameableListener, SecurityContextInterface $securityContext = null)
    {
        $this->blameableListener = $blameableListener;
        $this->securityContext = $securityContext;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (null === $this->securityContext) {
            return;
        }

        $token = $this->securityContext->getToken();
        if (null !== $token && $this->securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $this->blameableListener->setUserValue($token->getUser());
        }
    }
}