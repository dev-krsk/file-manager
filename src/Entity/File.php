<?php

namespace Dev\Krsk\FileManager\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="NULL")
 */
class File extends Superclass
{
    /**
     * @var integer - Идентификатор
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id_file", type="decimal", unique=true, nullable=false, options={"comment":"Идентификатор"})
     */
    private $id;

    /**
     * @var string - Имя файла
     *
     * @ORM\Column(name="file", type="string", length=255, nullable=false, options={"comment":"Имя файла"})
     */
    private $name;

    /**
     * @var Directory - Папка
     *
     * @ORM\ManyToOne(targetEntity="Dev\Krsk\FileManager\Entity\Directory", inversedBy="files")
     * @ORM\JoinColumn(name="directory_id", referencedColumnName="id_directory", nullable=true)
     */
    private $directory;

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
     * @return Directory|null
     */
    public function getDirectory(): ?Directory
    {
        return $this->directory;
    }

    /**
     * @param Directory|null $directory
     * @return $this
     */
    public function setDirectory(?Directory $directory): self
    {
        $this->directory = $directory;

        return $this;
    }
}