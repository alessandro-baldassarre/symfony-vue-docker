<?php

namespace App\Entity;

use App\Repository\PdfRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PdfRepository::class)]
class Pdf extends File
{

    #[ORM\Column]
    private ?int $page_number = null;

    #[ORM\Column(length: 255)]
    private ?string $orientation = null;


    public function getPageNumber(): ?int
    {
        return $this->page_number;
    }

    public function setPageNumber(int $page_number): self
    {
        $this->page_number = $page_number;

        return $this;
    }

    public function getOrientation(): ?string
    {
        return $this->orientation;
    }

    public function setOrientation(string $orientation): self
    {
        $this->orientation = $orientation;

        return $this;
    }
}
