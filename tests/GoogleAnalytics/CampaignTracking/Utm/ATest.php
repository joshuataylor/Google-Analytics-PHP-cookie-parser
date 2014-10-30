<?php

class ATest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider provider
     */
    public function testParse($__utma)
    {
        $utma = new GoogleAnalytics\CampaignTracking\Utm\A($__utma);

        $this->assertEquals('123456789', $utma->getDomainHash());

        $this->assertEquals(1891678824, $utma->getVisitorId());

        $this->assertEquals(
            1357877198,
            $utma->getInitialVisit()->getTimestamp()
        );

        $this->assertEquals(
            1357877198,
            $utma->getPreviousVisit()->getTimestamp()
        );

        $this->assertEquals(
            1357877198,
            $utma->getCurrentVisit()->getTimestamp()
        );

        $this->assertEquals(1, $utma->getSessionCount());
    }

    public function provider()
    {
        return array(
            array('123456789.1891678824.1357877198.1357877198.1357877198.1')
        );
    }

}
