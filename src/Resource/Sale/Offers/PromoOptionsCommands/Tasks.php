<?php

namespace Imper86\PhpAllegroApi\Resource\Sale\Offers\PromoOptionsCommands;

use Imper86\PhpAllegroApi\Resource\AbstractResource;
use Psr\Http\Message\ResponseInterface;

class Tasks extends AbstractResource
{
    public function get(string $commandId): ResponseInterface
    {
        return $this->apiGet(sprintf('/sale/offers/promo-options-commands/%s/tasks', $commandId));
    }
}
