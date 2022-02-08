<?php

namespace App\Twig;

use App\Entity\Plat;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PlatExtension extends AbstractExtension
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('plat',[$this,'getPlats'])
        ];
    }

    public function getPlats()
    {
        return $this->em->getRepository(Plat::class)->findAll();
    }
}