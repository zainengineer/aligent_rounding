<?php

/**
 * Created by PhpStorm.
 * User: zain
 * Date: 7/1/15
 * Time: 11:46 AM
 */
class Aligent_Rounding_Model_Tax_Sales_Total_Quote_Subtotal extends Mage_Tax_Model_Sales_Total_Quote_Subtotal
{
    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        $return = parent::collect($address);
        if ($address->hasData('rounding_deltas')) {
            Mage::getSingleton('aligent_rounding/collectRound')->addComputedDelta(
                'tax_sales_total-address-' . $address->getId(), $address->getRoundingDeltas());
        }
        return $return;
    }
}