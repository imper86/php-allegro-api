<?php

namespace Imper86\PhpAllegroApi\Resource;



use Imper86\PhpAllegroApi\Resource\ShipmentManagement\DeliveryServices;
use Imper86\PhpAllegroApi\Resource\ShipmentManagement\Label;
use Imper86\PhpAllegroApi\Resource\ShipmentManagement\Protocol;
use Imper86\PhpAllegroApi\Resource\ShipmentManagement\Shipment;
use Imper86\PhpAllegroApi\Resource\ShipmentManagement\ShipmentCancelCommands;
use Imper86\PhpAllegroApi\Resource\ShipmentManagement\ShipmentCreateCommands;
use Imper86\PhpAllegroApi\Resource\ShipmentManagement\PickupCreateCommands;
use Imper86\PhpAllegroApi\Resource\ShipmentManagement\PickupProposals;

/**
 * Class ShipmentManagement
 *
 * @method DeliveryServices deliveryServices()
 * @method ShipmentCreateCommands shipmentCreateCommands()
 * @method ShipmentCancelCommands shipmentCancelCommands()
 * @method PickupCreateCommands pickupCreateCommands()
 * @method Shipment shipments()
 * @method Label labels()
 * @method Protocol protocols()
 * @method PickupProposals pickupProposals()
 *
 */
class ShipmentManagement extends AbstractResource {

}