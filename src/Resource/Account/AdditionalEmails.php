<?php


namespace Imper86\PhpAllegroApi\Resource\Account;


use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class AdditionalEmails extends AbstractResource
{
    public function get(?string $emailId = null): ResponseInterface
    {
        return $this->apiGet(sprintf('/account/additional-emails%s', $emailId ? "/{$emailId}" : ''));
    }

    /**
     * @param mixed[] $body
     * @return ResponseInterface
     */
    public function post(array $body): ResponseInterface
    {
        return $this->apiPost('/account/additional-emails', $body);
    }

    public function delete(string $emailId): ResponseInterface
    {
        return $this->apiDelete("/account/additional-emails/{$emailId}");
    }
}
