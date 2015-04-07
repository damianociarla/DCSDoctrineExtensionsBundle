<?php

namespace DCS\DoctrineExtensionsBundle\Listener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Request;
use Gedmo\IpTraceable\IpTraceableListener;

class IpTraceableEventListener
{
    private $ipTraceableListener;
    private $request;

    public function __construct(IpTraceableListener $ipTraceableListener, Request $request = null)
    {
        $this->ipTraceableListener = $ipTraceableListener;
        $this->request = $request;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (null === $this->request) {
            return;
        }

        $ip = $this->request->getClientIp();

        if (null !== $ip) {
            $this->ipTraceableListener->setIpValue($ip);
        }
    }
}