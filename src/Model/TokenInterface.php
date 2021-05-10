<?php


namespace Imper86\PhpAllegroApi\Model;


use DateTimeImmutable;
use DateTimeInterface;

interface TokenInterface
{
    public function __toString();

    public function getAccessToken(): string;

    public function getRefreshToken(): ?string;

    public function getGrantType(): string;

    public function getUserId(): ?string;

    public function getExpiry(): DateTimeImmutable;

    public function isExpired(?DateTimeInterface $now = null): bool;

    /**
     * @return string[]|null
     */
    public function getScope(): ?array;

    /**
     * @return mixed[]
     */
    public function serialize(): array;
}
