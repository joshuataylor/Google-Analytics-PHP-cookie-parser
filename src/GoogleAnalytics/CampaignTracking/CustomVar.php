<?php

namespace GoogleAnalytics\CampaignTracking;

/**
 * The CustomVar class represents the custom variables stored in the __utmv
 * cookie.
 *
 * This cookie is only dropped when $scope == 1.
 */
class CustomVar
{

    /**
     *  The Slot Number.  An integer between 1 and 5.
     */
    private $slot_number;

    /**
     * The name of the variable.  This appears in the top-level Custom Variables report of the Analytics reports.
     */
    private $name;

    /**
     * Value
     */
    private $value;

    /**
     *  1 (visitor-level), 2 (session-level), or 3 (page-level)
     *
     *  Only variables set for scope 1 will result in a cookie being set.
     */
    private $scope;

    /**
     * @param array $v - Array containing parsed __utmv CustomVar information.
     */
    public function __construct($v)
    {
        if (is_array($v)) {
            $this->fromArray($v);
        }
    }

    public function fromArray(array $v_arr)
    {
        $this->setSlotNumber($v_arr[0]);
        $this->setName($v_arr[1]);
        $this->setValue($v_arr[2]);
        $this->setScope($v_arr[3]);
    }

    public function setSlotNumber($slot_number)
    {
        $this->slot_number = $slot_number;
    }

    public function getSlotNumber()
    {
        return $this->slot_number;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setScope($scope)
    {
        $this->scope = $scope;
    }

    public function getScope()
    {
        return $this->scope;
    }

}
