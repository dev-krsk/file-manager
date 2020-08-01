<?php


namespace Dev\Krsk\FileManager\Entity;


interface FileInterface
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
     * @return AbstractDirectory|null
     */
    public function getDirectory(): ?AbstractDirectory;

    /**
     * @param AbstractDirectory|null $directory
     * @return $this
     */
    public function setDirectory(?AbstractDirectory $directory): FileInterface;
}