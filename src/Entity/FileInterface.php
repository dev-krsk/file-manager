<?php


namespace Dev\Krsk\FileManager\Entity;


interface FileInterface extends SuperClassInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): FileInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): FileInterface;

    /**
     * @return DirectoryInterface|null
     */
    public function getDirectory(): ?DirectoryInterface;

    /**
     * @param DirectoryInterface|null $directory
     * @return $this
     */
    public function setDirectory(?DirectoryInterface $directory): FileInterface;
}