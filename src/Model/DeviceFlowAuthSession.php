<?php

namespace Imper86\PhpAllegroApi\Model;

class DeviceFlowAuthSession implements DeviceFlowAuthSessionInterface
{
    /**
     * @var string
     */
    private $deviceCode;

    /**
     * @var string
     */
    private $userCode;

    /**
     * @var string
     */
    private $verificationUri;

    /**
     * @var int
     */
    private $expiresIn;

    /**
     * @var int
     */
    private $interval;

    /**
     * @var string
     */
    private $verificationUriComplete;

    /**
     * @param string $deviceCode
     * @param int $expiresIn
     * @param string $userCode
     * @param int $interval
     * @param string $verificationUri
     * @param string $verificationUriComplete
     */
    public function __construct(
        string $deviceCode,
        int    $expiresIn,
        string $userCode,
        int    $interval,
        string $verificationUri,
        string $verificationUriComplete)
    {
        $this->deviceCode = $deviceCode;
        $this->userCode = $userCode;
        $this->verificationUri = $verificationUri;
        $this->expiresIn = $expiresIn;
        $this->interval = $interval;
        $this->verificationUriComplete = $verificationUriComplete;
    }

    /**
     * @return string
     */
    public function getDeviceCode(): string
    {
        return $this->deviceCode;
    }

    /**
     * @return string
     */
    public function getUserCode(): string
    {
        return $this->userCode;
    }

    /**
     * @return string
     */
    public function getVerificationUri(): string
    {
        return $this->verificationUri;
    }

    /**
     * @return int
     */
    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    /**
     * @return int
     */
    public function getInterval(): int
    {
        return $this->interval;
    }

    /**
     * @return string
     */
    public function getVerificationUriComplete(): string
    {
        return $this->verificationUriComplete;
    }
}
