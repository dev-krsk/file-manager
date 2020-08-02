<?php


namespace Dev\Krsk\FileManager\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass()
 * @ORM\HasLifecycleCallbacks
 */
abstract class AbstractDirectory implements DirectoryInterface
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
     * @var string - Имя папки
     *
     * @ORM\Column(name="name", type="string", length=255, options={"comment": "Имя папки"})
     */
    protected $name;

    /**
     * @var string - Алиас папки для использования в системе
     *
     * @ORM\Column(name="alias", type="string", length=15, options={"comment": "Алиас папки для использования в системе"})
     */
    protected $alias;

    /**
     * @var AbstractDirectory|null - Родительская папка
     *
     * @ORM\ManyToOne(targetEntity="Dev\Krsk\FileManager\Entity\AbstractDirectory")
     * @ORM\JoinColumn(fieldName="directory_id", referencedColumnName="id", nullable=true)
     */
    protected $directory;

    /**
     * AbstractDirectory constructor.
     */
    public function __construct()
    {
        $this->directory = null;
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
    public function setId(int $id): DirectoryInterface
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
    public function setName(string $name): DirectoryInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     * @return self
     */
    public function setAlias(string $alias): DirectoryInterface
    {
        $this->alias = $alias;
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
    public function setDirectory(?DirectoryInterface $directory = null): DirectoryInterface
    {
        $this->directory = $directory;
        return $this;
    }
}