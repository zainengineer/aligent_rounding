<?php

/**
 * Created by PhpStorm.
 * User: zain
 * Date: 7/1/15
 * Time: 12:03 PM
 */
class Aligent_Rounding_Model_SalesRule_Validator extends Mage_SalesRule_Model_Validator
{
    public function process(Mage_Sales_Model_Quote_Item_Abstract $item)
    {
        $return = parent::process($item);
        if ($this->_roundingDeltas){
            Mage::getSingleton('aligent_rounding/collectRound')->addComputedDelta('validator-rounding-' . $item->getId(),$this->_roundingDeltas);
        }
        if ($this->_baseRoundingDeltas){
            Mage::getSingleton('aligent_rounding/collectRound')->addComputedDelta('validator-base-rounding-' . $item->getId(),$this->_baseRoundingDeltas);
        }
        return $return;
    }
}