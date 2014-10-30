<?php

class VTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider provider
     */
    public function testParse($__utmv)
    {
        $utmv = new GoogleAnalytics\CampaignTracking\Utm\V($__utmv);

        $this->assertEquals('123456789', $utmv->getDomainHash());

        $this->assertEquals(2, count($utmv->getCustomVars()));

        $custom_vars = $utmv->getCustomVars();

        $this->assertEquals(1, $custom_vars[0]->getSlotNumber());
        $this->assertEquals('MyVar', $custom_vars[0]->getName());
        $this->assertEquals('TheValue', $custom_vars[0]->getValue());
        $this->assertEquals(1, $custom_vars[0]->getScope());
    }

    public function provider()
    {
        return array(
            array('123456789.|1=MyVar=TheValue=1^2=AnotherVar=AnotherValue=1'),
        );
    }

}
