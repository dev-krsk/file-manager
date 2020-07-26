<?php

namespace Dev\Krsk\FileManager\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
class Superclass
{
    /**
     * @var DateTimeImmutable - Дата создания
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false, options={"comment":"Дата создания"})
     */
    private $createdAt;

    /**
     * @var string|null - Причина создания
     *
     * @ORM\Column(name="created_reason", type="string", length=255, nullable=true, options={"comment":"Причина создания"})
     */
    private $createdReason;

    /**
     * @var string - Пользователь создавший
     *
     * @ORM\Column(name="created_user", type="string", length=255, nullable=false, options={"comment":"Пользователь создавший"})
     */
    private $createdUser;

    /**
     * @var DateTimeImmutable|null - Дата изменения
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true, options={"comment":"Дата изменения"})
     */
    private $updatedAt;

    /**
     * @var string|null - Причина изменения
     *
     * @ORM\Column(name="updated_reason", type="string", length=255, nullable=true, options={"comment":"Причина изменения"})
     */
    private $updatedReason;

    /**
     * @var string|null - Пользователь изменивший
     *
     * @ORM\Column(name="updated_user", type="string", length=255, nullable=true, options={"comment":"Пользователь изменивший"})
     */
    private $updatedUser;

    /**
     * @var DateTimeImmutable|null - Дата удаления
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true, options={"comment":"Дата удаления"})
     */
    private $deletedAt;

    /**
     * @var string|null - Причина удаления
     *
     * @ORM\Column(name="deleted_reason", type="string", length=255, nullable=true, options={"comment":"Причина удаления"})
     */
    private $deletedReason;

    /**
     * @var string|null - Пользователь удаливший
     *
     * @ORM\Column(name="deleted_user", type="string", length=255, nullable=true, options={"comment":"Пользователь удаливший"})
     */
    private $deletedUser;

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @return self
     *
     * @ORM\PrePersist
     */
    public function setCreatedAt(): self
    {
        $this->createdAt = new DateTimeImmutable();
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
     * @return self
     *
     * @ORM\PreUpdate
     */
    public function setUpdatedAt(): self
    {
        $this->updatedAt = new DateTimeImmutable();
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
     * @return self
     *
     * @ORM\PreRemove
     */
    public function setDeletedAt(): self
    {
        $this->deletedAt = new DateTimeImmutable();
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