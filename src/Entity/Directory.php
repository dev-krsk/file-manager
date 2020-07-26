<?php

namespace Dev\Krsk\FileManager\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="NULL")
 */
class Directory extends Superclass
{
    /**
     * @var integer - Идентификатор
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id_directory", type="decimal", unique=true, nullable=false, options={"comment":"Идентификатор"})
     */
    private $id;

    /**
     * @var string - Имя файла
     *
     * @ORM\Column(name="directory", type="string", length=255, nullable=false, options={"comment":"Имя файла"})
     */
    private $name;

    /**
     * @var ArrayCollection - Файлы в директории
     *
     * @ORM\OneToMany(targetEntity="Dev\Krsk\FileManager\Entity\File", mappedBy="directory", orphanRemoval=true)
     */
    private $files;

    /**
     * File constructor.
     */
    public function __construct()
    {
        $this->files = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Collection|File[]
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    /**
     * @param File $file
     * @return $this
     */
    public function addFile(File $file): self
    {
        if (!$this->files->contains($file)) {
            $this->files[] = $file;
            $file->setDirectory($this);
        }

        return $this;
    }

    /**
     * @param File $product
     * @return $this
     */
    public function removeFile(File $product): self
    {
        if ($this->files->contains($product)) {
            $this->files->removeElement($product);
            if ($product->getDirectory() === $this) {
                $product->setDirectory(null);
            }
        }

        return $this;
    }
}