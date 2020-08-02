<?php

namespace Dev\Krsk\FileManager\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

interface SuperClassInterface
{
    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable;

    /**
     * @param DateTimeImmutable|null $createdAt
     * @return self
     *
     * @ORM\PrePersist
     */
    public function setCreatedAt(?DateTimeImmutable $createdAt = null): self;

    /**
     * @return string|null
     */
    public function getCreatedReason(): ?string;

    /**
     * @param string|null $createdReason
     * @return self
     */
    public function setCreatedReason(?string $createdReason): self;

    /**
     * @return string
     */
    public function getCreatedUser(): string;

    /**
     * @param string $createdUser
     * @return self
     */
    public function setCreatedUser(string $createdUser): self;

    /**
     * @return DateTimeImmutable|null
     */
    public function getUpdatedAt(): ?DateTimeImmutable;

    /**
     * @param DateTimeImmutable|null $updatedAt
     * @return self
     *
     * @ORM\PreUpdate
     */
    public function setUpdatedAt(?DateTimeImmutable $updatedAt = null): self;

    /**
     * @return string|null
     */
    public function getUpdatedReason(): ?string;

    /**
     * @param string|null $updatedReason
     * @return self
     */
    public function setUpdatedReason(?string $updatedReason): self;

    /**
     * @return string|null
     */
    public function getUpdatedUser(): ?string;

    /**
     * @param string|null $updatedUser
     * @return self
     */
    public function setUpdatedUser(?string $updatedUser): self;

    /**
     * @return DateTimeImmutable|null
     */
    public function getDeletedAt(): ?DateTimeImmutable;

    /**
     * @param DateTimeImmutable|null $deletedAt
     * @return self
     *
     * @ORM\PreRemove
     */
    public function setDeletedAt(?DateTimeImmutable $deletedAt = null): self;

    /**
     * @return string|null
     */
    public function getDeletedReason(): ?string;

    /**
     * @param string|null $deletedReason
     * @return self
     */
    public function setDeletedReason(?string $deletedReason): self;

    /**
     * @return string|null
     */
    public function getDeletedUser(): ?string;

    /**
     * @param string|null $deletedUser
     * @return self
     */
    public function setDeletedUser(?string $deletedUser): self;
}