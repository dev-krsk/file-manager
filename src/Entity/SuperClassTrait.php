<?php


namespace Dev\Krsk\FileManager\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Yuriy Yurinskiy <yuriyyurinskiy@yandex.ru>
 */
trait SuperClassTrait
{
    /**
     * @var DateTimeImmutable - Дата создания
     *
     * @ORM\Column(name="created_at", type="datetime_immutable", options={"comment": "Дата создания"})
     */
    protected $createdAt;

    /**
     * @var string|null - Причина создания
     *
     * @ORM\Column(name="created_reason", type="string", length=255, nullable=true, options={"comment": "Причина создания"})
     */
    protected $createdReason;

    /**
     * @var string - Пользователь создавший
     *
     * @ORM\Column(name="created_user", type="string", length=100, options={"comment": "Пользователь создавший"})
     */
    protected $createdUser;

    /**
     * @var DateTimeImmutable|null - Дата изменения
     *
     * @ORM\Column(name="updated_at", type="datetime_immutable", nullable=true, options={"comment": "Дата изменения"})
     */
    protected $updatedAt;

    /**
     * @var string|null - Причина изменения
     *
     * @ORM\Column(name="updated_reason", type="string", length=255, nullable=true, options={"comment": "Причина изменения"})
     */
    protected $updatedReason;

    /**
     * @var string|null - Пользователь изменивший
     *
     * @ORM\Column(name="updated_user", type="string", length=100, nullable=true, options={"comment": "Пользователь изменивший"})
     */
    protected $updatedUser;

    /**
     * @var DateTimeImmutable|null - Дата удаления
     *
     * @ORM\Column(name="deleted_at", type="datetime_immutable", nullable=true, options={"comment": "Дата удаления"})
     */
    protected $deletedAt;

    /**
     * @var string|null - Причина удаления
     *
     * @ORM\Column(name="deleted_reason", type="string", length=255, nullable=true, options={"comment": "Причина удаления"})
     */
    protected $deletedReason;

    /**
     * @var string|null - Пользователь удаливший
     *
     * @ORM\Column(name="deleted_user", type="string", length=100, nullable=true, options={"comment": "Пользователь удаливший"})
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