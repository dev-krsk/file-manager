<?php


namespace Dev\Krsk\FileManager\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass()
 */
abstract class AbstractDirectory implements DirectoryInterface
{
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
     * @ORM\ManyToOne(targetEntity="Dev\Krsk\FileManager\Entity\AbstractDirectory", inversedBy="directories")
     * @ORM\JoinColumn(fieldName="directory_id", referencedColumnName="id", nullable=true)
     */
    protected $directory;

    /**
     * @var ArrayCollection - Папки в директории
     *
     * @ORM\OneToMany(targetEntity="Dev\Krsk\FileManager\Entity\AbstractDirectory", mappedBy="directory")
     */
    protected $directories;

    /**
     * @var ArrayCollection - Файлы в директории
     *
     * @ORM\OneToMany(targetEntity="Dev\Krsk\FileManager\Entity\AbstractFile", mappedBy="directory")
     */
    protected $files;

    /**
     * AbstractDirectory constructor.
     */
    public function __construct()
    {
        $this->directory = null;
        $this->directories = new ArrayCollection();
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
     * @return AbstractDirectory|null
     */
    public function getDirectory(): ?AbstractDirectory
    {
        return $this->directory;
    }

    /**
     * @param AbstractDirectory|null $directory
     * @return self
     */
    public function setDirectory(?AbstractDirectory $directory = null): DirectoryInterface
    {
        $this->directory = $directory;
        return $this;
    }

    /**
     * @return Collection|AbstractFile[]
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    /**
     * @param AbstractFile $file
     * @return self
     */
    public function addFile(AbstractFile $file): DirectoryInterface
    {
        if (!$this->files->contains($file)) {
            $this->files[] = $file;
            $file->setDirectory($this);
        }

        return $this;
    }

    /**
     * @param AbstractFile $product
     * @return self
     */
    public function removeFile(AbstractFile $product): DirectoryInterface
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