<?php
/**
 * Created by PhpStorm.
 * User: zain
 * Date: 7/1/15
 * Time: 12:15 PM
 */

class Aligent_Rounding_Model_Observer {

    public function ControllerActionPostdispatch($event)
    {
        Mage::getSingleton('aligent_rounding/collectRound')->logComputedDeltas();
    }
}