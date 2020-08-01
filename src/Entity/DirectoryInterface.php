<?php

namespace Dev\Krsk\FileManager\Entity;

use Doctrine\Common\Collections\Collection;

interface DirectoryInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): DirectoryInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): DirectoryInterface;

    /**
     * @return string
     */
    public function getAlias(): string;

    /**
     * @param string $alias
     * @return self
     */
    public function setAlias(string $alias): DirectoryInterface;

    /**
     * @return AbstractDirectory|null
     */
    public function getDirectory(): ?AbstractDirectory;

    /**
     * @param AbstractDirectory|null $directory
     * @return self
     */
    public function setDirectory(?AbstractDirectory $directory = null): DirectoryInterface;

    /**
     * @return Collection|AbstractFile[]
     */
    public function getFiles(): Collection;

    /**
     * @param AbstractFile $file
     * @return self
     */
    public function addFile(AbstractFile $file): DirectoryInterface;

    /**
     * @param AbstractFile $product
     * @return self
     */
    public function removeFile(AbstractFile $product): DirectoryInterface;
}