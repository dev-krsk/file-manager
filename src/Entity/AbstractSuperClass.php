<?php


namespace Dev\Krsk\FileManager\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class AbstractSuperClass
{
    /**
     * @var DateTimeImmutable - Дата создания
     */
    protected $createdAt;

    /**
     * @var string|null - Причина создания
     */
    protected $createdReason;

    /**
     * @var string - Пользователь создавший
     */
    protected $createdUser;

    /**
     * @var DateTimeImmutable|null - Дата изменения
     */
    protected $updatedAt;

    /**
     * @var string|null - Причина изменения
     */
    protected $updatedReason;

    /**
     * @var string|null - Пользователь изменивший
     */
    protected $updatedUser;

    /**
     * @var DateTimeImmutable|null - Дата удаления
     */
    protected $deletedAt;

    /**
     * @var string|null - Причина удаления
     */
    protected $deletedReason;

    /**
     * @var string|null - Пользователь удаливший
     */
    protected $deletedUser;

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable|null $createdAt
     * @return self
     *
     * @ORM\PrePersist
     */
    public function setCreatedAt(?DateTimeImmutable $createdAt = null): self
    {
        $this->createdAt = $createdAt ?? new DateTimeImmutable();
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreatedReason(): ?string
    {
        return $this->createdReason;
    }

    /**
     * @param string|null $createdReason
     * @return self
     */
    public function setCreatedReason(?string $createdReason): self
    {
        $this->createdReason = $createdReason;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedUser(): string
    {
        return $this->createdUser;
    }

    /**
     * @param string $createdUser
     * @return self
     */
    public function setCreatedUser(string $createdUser): self
    {
        $this->createdUser = $createdUser;
        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTimeImmutable|null $updatedAt
     * @return self
     *
     * @ORM\PreUpdate
     */
    public function setUpdatedAt(?DateTimeImmutable $updatedAt = null): self
    {
        $this->updatedAt = $updatedAt ?? new DateTimeImmutable();
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdatedReason(): ?string
    {
        return $this->updatedReason;
    }

    /**
     * @param string|null $updatedReason
     * @return self
     */
    public function setUpdatedReason(?string $updatedReason): self
    {
        $this->updatedReason = $updatedReason;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdatedUser(): ?string
    {
        return $this->updatedUser;
    }

    /**
     * @param string|null $updatedUser
     * @return self
     */
    public function setUpdatedUser(?string $updatedUser): self
    {
        $this->updatedUser = $updatedUser;
        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDeletedAt(): ?DateTimeImmutable
    {
        return $this->deletedAt;
    }

    /**
     * @param DateTimeImmutable|null $deletedAt
     * @return self
     *
     * @ORM\PreRemove
     */
    public function setDeletedAt(?DateTimeImmutable $deletedAt = null): self
    {
        $this->deletedAt = $deletedAt ?? new DateTimeImmutable();
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeletedReason(): ?string
    {
        return $this->deletedReason;
    }

    /**
     * @param string|null $deletedReason
     * @return self
     */
    public function setDeletedReason(?string $deletedReason): self
    {
        $this->deletedReason = $deletedReason;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeletedUser(): ?string
    {
        return $this->deletedUser;
    }

    /**
     * @param string|null $deletedUser
     * @return self
     */
    public function setDeletedUser(?string $deletedUser): self
    {
        $this->deletedUser = $deletedUser;
        return $this;
    }
}