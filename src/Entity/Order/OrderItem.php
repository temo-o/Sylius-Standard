<?php

declare(strict_types=1);

namespace App\Entity\Order;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\OrderItem as BaseOrderItem;
use Sylius\Component\Order\Model\OrderItemUnitInterface;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_order_item')]
class OrderItem extends BaseOrderItem
{
    public function addUnit(OrderItemUnitInterface $itemUnit): void
    {
        if ($this !== $itemUnit->getOrderItem()) {
            throw new \LogicException('This order item unit is assigned to a different order item.');
        }

        if (!$this->hasUnit($itemUnit)) {
            $this->units->add($itemUnit);

            $batchSize = (int) $itemUnit->getOrderItem()->getProduct()->getBatchSize();

            if ($this->quantity == 0) {
                $this->quantity = $batchSize-1;
            }

            ++$this->quantity;

            $this->unitsTotal += $itemUnit->getTotal();
            $this->recalculateTotal();
        }
    }
}
