<?php

namespace Imper86\PhpAllegroApi\Model;

interface DeviceFlowAuthSessionInterface
{
    /**
     * @return string
     */
    public function getVerificationUri(): string;

    /**
     * @return string
     */
    public function getUserCode(): string;

    /**
     * @return int
     */
    public function getInterval(): int;

    /**
     * @return int
     */
    public function getExpiresIn(): int;

    /**
     * @return string
     */
    public function getDeviceCode(): string;

    /**
     * @return string
     */
    public function getVerificationUriComplete(): string;
}
