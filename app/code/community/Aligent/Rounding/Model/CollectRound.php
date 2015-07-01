<?php

class Aligent_Rounding_Model_CollectRound extends Varien_Object
{
    protected $aComputedDeltas = array();

    public function addComputedDelta($vKey, $aDelta)
    {
        $this->aComputedDeltas[$vKey] = $aDelta;
    }

    public function logComputedDeltas()
    {
        if ($this->aComputedDeltas) {
            $oQuote = Mage::getSingleton('checkout/cart')->getQuote();
            $vQuote = '';
            if ($oQuote && $oQuote->getId()) {
                $vQuote = ' for quote-id ' . $oQuote->getId() . ' ';
            }
            $vMessage = "Computed Delta $vQuote is " . print_r($this->aComputedDeltas, true);
            $this->log($vMessage);
        }
    }

    public function log($vMessage)
    {
        Mage::log($vMessage, null, 'rounding_delta.log');
    }
}