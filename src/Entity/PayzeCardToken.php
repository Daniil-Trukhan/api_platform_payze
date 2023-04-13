<?php

declare(strict_types=1);

namespace Trukhan\Payze\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

class PayzeCardToken
{
    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private bool $active;
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $brand;
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $cardMask;
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $cardholder;
    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private bool $default;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $modelId;
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $modelType;
    #[ORM\Column(type: Types::STRING)]
    private string $token;
    #[ORM\Column(type: Types::STRING)]
    private string $transactionId;

    /**
     * @return string|null
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * @return string|null
     */
    public function getCardMask(): ?string
    {
        return $this->cardMask;
    }

    /**
     * @return string|null
     */
    public function getCardholder(): ?string
    {
        return $this->cardholder;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getModelId(): ?int
    {
        return $this->modelId;
    }

    /**
     * @return string|null
     */
    public function getModelType(): ?string
    {
        return $this->modelType;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @param string|null $brand
     */
    public function setBrand(?string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @param string|null $cardMask
     */
    public function setCardMask(?string $cardMask): void
    {
        $this->cardMask = $cardMask;
    }

    /**
     * @param string|null $cardholder
     */
    public function setCardholder(?string $cardholder): void
    {
        $this->cardholder = $cardholder;
    }

    /**
     * @param bool $default
     */
    public function setDefault(bool $default): void
    {
        $this->default = $default;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param int|null $modelId
     */
    public function setModelId(?int $modelId): void
    {
        $this->modelId = $modelId;
    }

    /**
     * @param string|null $modelType
     */
    public function setModelType(?string $modelType): void
    {
        $this->modelType = $modelType;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId(string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }
}
