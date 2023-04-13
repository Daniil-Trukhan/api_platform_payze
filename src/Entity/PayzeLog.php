<?php

declare(strict_types=1);

namespace Trukhan\Payze\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(
            normalizationContext: ['groups' => ['log:read']],
        ),
    ],
    normalizationContext: ['groups' => ['logs:read', 'log:read']],
    denormalizationContext: ['groups' => ['log:write']]
)]
class PayzeLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['logs:read', 'log:read'])]
    private ?int $id = null;
    #[ORM\Column(type: Types::STRING)]
    #[Groups(['logs:read', 'log:read', 'log:write'])]
    private ?string $message;
    #[ORM\Column(type: Types::ARRAY)]
    #[Groups(['logs:read', 'log:read', 'log:write'])]
    private ?array $payload;
    #[ORM\ManyToOne()]
    #[Groups(['logs:read', 'log:read', 'log:write'])]
    private PayzeTransaction $transaction;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return array|null
     */
    public function getPayload(): ?array
    {
        return $this->payload;
    }

    /**
     * @return PayzeTransaction
     */
    public function getTransaction(): PayzeTransaction
    {
        return $this->transaction;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param array|null $payload
     */
    public function setPayload(?array $payload): self
    {
        $this->payload = $payload;
        return $this;
    }

    /**
     * @param PayzeTransaction $transaction
     */
    public function setTransaction(PayzeTransaction $transaction): self
    {
        $this->transaction = $transaction;
        return $this;
    }
}
