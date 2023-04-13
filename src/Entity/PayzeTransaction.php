<?php

declare(strict_types=1);

namespace Trukhan\Payze\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Trukhan\Payze\Controller\PayzeInputAction;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Trukhan\Payze\Repository\PayzeTransactionRepository;

/**
 * Class PayzeTransaction
 *
 * @package Trukhan\Payze\Entity
 */
#[ApiResource(
    collectionOperations: [
        'post' => [
            'method'      => 'post',
            'path'        => 'payments/payze',
            'deserialize' => false,
            'controller'  => PayzeInputAction::class,
            'output'      => false
        ]
    ],
    itemOperations: [
        'get' => [
            'security'              => "is_granted('ROLE_ADMIN')",
            'normalization_context' => ['groups' => ['payzeTransactions:read']],
        ],
    ],
    denormalizationContext: ['groups' => ['payzeTransaction:write']],
    normalizationContext: ['groups' => ['payzeTransaction:read', 'payzeTransactions:read']],
)]
#[ORM\Entity(repositoryClass: PayzeTransactionRepository::class)]
class PayzeTransaction
{
    #[ORM\Column(type: Types::FLOAT)]
    private float $amount;
    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private bool $canBeCommitted;
    #[ORM\OneToOne()]
    private PayzeCardToken $card;
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $cardMask;
    #[ORM\Column(type: Types::FLOAT, nullable: true)]
    private ?float $commission;
    #[ORM\Column(type: Types::STRING)]
    private string $currency;
    #[ORM\Column(type: Types::FLOAT, nullable: true)]
    private ?float $finalAmount;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['logs:read', 'log:read'])]
    private ?int $id = null;
    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private bool $isCompleted;
    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private bool $isPaid;
    #[ORM\Column(type: Types::STRING)]
    private string $lang;
    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $log;
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $method;
    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $modelId;
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $modelType;
    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private bool $refundable;
    #[ORM\Column(type: Types::FLOAT, nullable: true)]
    private ?float $refunded;
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $resultCode;
    #[ORM\Column(type: Types::SIMPLE_ARRAY, nullable: true)]
    private ?array $split;
    #[ORM\Column(type: Types::STRING)]
    private string $status;
    #[ORM\Column(type: Types::STRING)]
    private string $transactionId;

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return PayzeCardToken
     */
    public function getCard(): PayzeCardToken
    {
        return $this->card;
    }

    /**
     * @return string|null
     */
    public function getCardMask(): ?string
    {
        return $this->cardMask;
    }

    /**
     * @return float|null
     */
    public function getCommission(): ?float
    {
        return $this->commission;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return float|null
     */
    public function getFinalAmount(): ?float
    {
        return $this->finalAmount;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @return array|null
     */
    public function getLog(): ?array
    {
        return $this->log;
    }

    /**
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->method;
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
     * @return float|null
     */
    public function getRefunded(): ?float
    {
        return $this->refunded;
    }

    /**
     * @return string|null
     */
    public function getResultCode(): ?string
    {
        return $this->resultCode;
    }

    /**
     * @return array|null
     */
    public function getSplit(): ?array
    {
        return $this->split;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
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
    public function isCanBeCommitted(): bool
    {
        return $this->canBeCommitted;
    }

    /**
     * @return bool
     */
    public function isCompleted(): bool
    {
        return $this->isCompleted;
    }

    /**
     * @return bool
     */
    public function isPaid(): bool
    {
        return $this->isPaid;
    }

    /**
     * @return bool
     */
    public function isRefundable(): bool
    {
        return $this->refundable;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param bool $canBeCommitted
     */
    public function setCanBeCommitted(bool $canBeCommitted): void
    {
        $this->canBeCommitted = $canBeCommitted;
    }

    /**
     * @param PayzeCardToken $card
     */
    public function setCard(PayzeCardToken $card): void
    {
        $this->card = $card;
    }

    /**
     * @param string|null $cardMask
     */
    public function setCardMask(?string $cardMask): void
    {
        $this->cardMask = $cardMask;
    }

    /**
     * @param float|null $commission
     */
    public function setCommission(?float $commission): void
    {
        $this->commission = $commission;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @param float|null $finalAmount
     */
    public function setFinalAmount(?float $finalAmount): void
    {
        $this->finalAmount = $finalAmount;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param bool $isCompleted
     */
    public function setIsCompleted(bool $isCompleted): void
    {
        $this->isCompleted = $isCompleted;
    }

    /**
     * @param bool $isPaid
     */
    public function setIsPaid(bool $isPaid): void
    {
        $this->isPaid = $isPaid;
    }

    /**
     * @param string $lang
     */
    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }

    /**
     * @param array|null $log
     */
    public function setLog(?array $log): void
    {
        $this->log = $log;
    }

    /**
     * @param string|null $method
     */
    public function setMethod(?string $method): void
    {
        $this->method = $method;
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
     * @param bool $refundable
     */
    public function setRefundable(bool $refundable): void
    {
        $this->refundable = $refundable;
    }

    /**
     * @param float|null $refunded
     */
    public function setRefunded(?float $refunded): void
    {
        $this->refunded = $refunded;
    }

    /**
     * @param string|null $resultCode
     */
    public function setResultCode(?string $resultCode): void
    {
        $this->resultCode = $resultCode;
    }

    /**
     * @param array|null $split
     */
    public function setSplit(?array $split): void
    {
        $this->split = $split;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId(string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }


//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected $fillable = [
//        'model_id',
//        'model_type',
//        'method',
//        'final_amount',
//        'refunded',
//        'status',
//        'is_paid',
//        'is_completed',
//        'transaction_id',
//        'amount',
//        'currency',
//        'lang',
//        'split',
//        'commission',
//        'can_be_committed',
//        'refundable',
//        'result_code',
//        'card_mask',
//        'log',
//    ];
//
//    /**
//     * The attributes that should be cast.
//     *
//     * @var array
//     */
//    protected $casts = [
//        'amount' => 'float',
//        'final_amount' => 'float',
//        'commission' => 'float',
//        'split' => 'array',
//        'can_be_committed' => 'boolean',
//        'refunded' => 'float',
//        'refundable' => 'boolean',
//        'log' => 'array',
//    ];
//
//    /**
//     * PayzeTranscation constructor.
//     *
//     * @param array $attributes
//     */
//    public function __construct(array $attributes = [])
//    {
//        parent::__construct($attributes);
//
//        $this->table = config('payze.transactions_table', 'payze_transactions');
//    }
//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
//     */
//    public function model(): MorphTo
//    {
//        return $this->morphTo();
//    }
//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasOne
//     */
//    public function card(): HasOne
//    {
//        return $this->hasOne(PayzeCardToken::class, 'transaction_id')->withInactive();
//    }
//
//    /**
//     * @param \Illuminate\Database\Eloquent\Builder $query
//     *
//     * @return \Illuminate\Database\Eloquent\Builder
//     */
//    public function scopePaid(Builder $query): Builder
//    {
//        return $query->where('is_paid', true);
//    }
//
//    /**
//     * @param \Illuminate\Database\Eloquent\Builder $query
//     *
//     * @return \Illuminate\Database\Eloquent\Builder
//     */
//    public function scopeUnpaid(Builder $query): Builder
//    {
//        return $query->where('is_paid', false);
//    }
//
//    /**
//     * @param \Illuminate\Database\Eloquent\Builder $query
//     *
//     * @return \Illuminate\Database\Eloquent\Builder
//     */
//    public function scopeCompleted(Builder $query): Builder
//    {
//        return $query->where('is_completed', true);
//    }
//
//    /**
//     * @param \Illuminate\Database\Eloquent\Builder $query
//     *
//     * @return \Illuminate\Database\Eloquent\Builder
//     */
//    public function scopeIncomplete(Builder $query): Builder
//    {
//        return $query->where('is_completed', false);
//    }
//
//    /**
//     * @param \Illuminate\Database\Eloquent\Builder $query
//     *
//     * @return \Illuminate\Database\Eloquent\Builder
//     */
//    public function scopeRefundable(Builder $query): Builder
//    {
//        return $query->where('refundable', true);
//    }
//
//    /**
//     * @param \Illuminate\Database\Eloquent\Builder $query
//     *
//     * @return \Illuminate\Database\Eloquent\Builder
//     */
//    public function scopeNonRefundable(Builder $query): Builder
//    {
//        return $query->where('refundable', false);
//    }
}
