<?php

namespace DCS\DoctrineExtensionsBundle\Listener;

use Gedmo\Translatable\TranslatableListener;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class TranslatableEventListener
{
    /**
     * @var \Gedmo\Translatable\TranslatableListener
     */
    private $translatableListener;

    public function __construct(TranslatableListener $translatableListener)
    {
        $this->translatableListener = $translatableListener;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $this->translatableListener->setTranslatableLocale($event->getRequest()->getLocale());
    }
}