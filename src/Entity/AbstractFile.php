<?php

namespace Dev\Krsk\FileManager\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Yuriy Yurinskiy <yuriyyurinskiy@yandex.ru>
 *
 * @ORM\MappedSuperclass()
 * @ORM\HasLifecycleCallbacks
 */
abstract class AbstractFile implements FileInterface
{
    use SuperClassTrait;

    /**
     * @var integer - Идентификатор
     *
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="decimal", unique=true, options={"comment": "Идентификатор"})
     */
    protected $id;

    /**
     * @var string - Имя файла
     *
     * @ORM\Column(name="name", type="string", length=255, options={"comment": "Имя класса"})
     */
    protected $name;

    /**
     * @var AbstractDirectory - Папка
     *
     * @ORM\ManyToOne(targetEntity="Dev\Krsk\FileManager\Entity\AbstractDirectory")
     * @ORM\JoinColumn(fieldName="directory_id", referencedColumnName="id", nullable=false)
     */
    protected $directory;

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
    public function setId(int $id): FileInterface
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
    public function setName(string $name): FileInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return DirectoryInterface|null
     */
    public function getDirectory(): ?DirectoryInterface
    {
        return $this->directory;
    }

    /**
     * @param DirectoryInterface|null $directory
     * @return self
     */
    public function setDirectory(?DirectoryInterface $directory): FileInterface
    {
        $this->directory = $directory;

        return $this;
    }
}