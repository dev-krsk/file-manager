<?php

namespace Dev\Krsk\FileManager\Entity;

interface DirectoryInterface extends SuperClassInterface
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
     * @return DirectoryInterface|null
     */
    public function getDirectory(): ?DirectoryInterface;

    /**
     * @param DirectoryInterface|null $directory
     * @return self
     */
    public function setDirectory(?DirectoryInterface $directory = null): DirectoryInterface;
}