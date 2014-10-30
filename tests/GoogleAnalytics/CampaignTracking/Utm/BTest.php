<?php

class BTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider provider
     */
    public function testParse($__utmb)
    {
        $utmb = new GoogleAnalytics\CampaignTracking\Utm\B($__utmb);

        $this->assertEquals('123456789', $utmb->getDomainHash());

        $this->assertEquals(1, $utmb->getPagesViewed());

        $this->assertEquals(
            1357877198,
            $utmb->getCurrentSessionStart()->getTimestamp()
        );
    }

    public function provider()
    {
        return array(
            array('123456789.1.10.1357877198')
        );
    }

}
