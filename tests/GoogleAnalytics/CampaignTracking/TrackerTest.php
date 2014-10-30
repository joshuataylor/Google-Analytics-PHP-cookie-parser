<?php

class TrackerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider provider
     */
    public function testParse($utm)
    {
        $tracker = new GoogleAnalytics\CampaignTracking\Tracker($utm);

        $this->assertEquals('123456789', $tracker->getDomainHash());

        $this->assertEquals('1891678824', $tracker->getVisitorId());

        $this->assertEquals(
            1357877198,
            $tracker->getInitialVisit()->getTimestamp()
        );

        $this->assertEquals(
            1357877198,
            $tracker->getPreviousVisit()->getTimestamp()
        );

        $this->assertEquals(
            1357877198,
            $tracker->getCurrentVisit()->getTimestamp()
        );

        $this->assertEquals(1, $tracker->getPagesViewed());

        $this->assertEquals(
            1357877198,
            $tracker->getCurrentSessionStart()->getTimestamp()
        );

        $this->assertEquals(
            1345235917,
            $tracker->getDateTime()->getTimestamp()
        );

        $this->assertEquals(2, $tracker->getSessionNumber());

        $this->assertEquals(4, $tracker->getCampaignNumber());

        $this->assertEquals('google', $tracker->getCampaignSource());

        $this->assertEquals('organic', $tracker->getCampaignMedium());

        $this->assertEquals('keyword1 keyword2', $tracker->getCampaignTerm());

        $this->assertEquals(2, count($tracker->getKeywords()));
    }

    public function provider()
    {
        return array(
            array(
                array(
                    '__utma' => '123456789.1891678824.1357877198.1357877198.1357877198.1',
                    '__utmb' => '123456789.1.10.1357877198',
                    '__utmc' => '123456789',
                    '__utmv' => '123456789.|2=AnotherVar=AnotherValue=1',
                    '__utmz' => '123456789.1345235917.2.4.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=keyword1 keyword2'
                )
            )
        );
    }

}
