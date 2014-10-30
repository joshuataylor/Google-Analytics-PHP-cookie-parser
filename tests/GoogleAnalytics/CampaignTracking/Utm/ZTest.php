<?php

class ZTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider directProvider
     */
    public function testParseDirect($__utmz)
    {
        $utmz = new GoogleAnalytics\CampaignTracking\Utm\Z($__utmz);

        $this->assertEquals('123456789', $utmz->getDomainHash());

        $this->assertEquals(1357877198, $utmz->getDateTime()->getTimestamp());

        $this->assertEquals(1, $utmz->getSessionNumber());

        $this->assertEquals(2, $utmz->getCampaignNumber());

        $this->assertEquals('(direct)', $utmz->getCampaignSource());

        $this->assertEquals('(none)', $utmz->getCampaignMedium());
    }

    public function directProvider()
    {
        return array(
            array('123456789.1357877198.1.2.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)')
        );
    }

    /**
     * @dataProvider organicProvider
     */
    public function testParseOrganic($__utmz)
    {
        $utmz = new GoogleAnalytics\CampaignTracking\Utm\Z($__utmz);

        $this->assertEquals('123456789', $utmz->getDomainHash());

        $this->assertEquals(1345235917, $utmz->getDateTime()->getTimestamp());

        $this->assertEquals(2, $utmz->getSessionNumber());

        $this->assertEquals(4, $utmz->getCampaignNumber());

        $this->assertEquals('google', $utmz->getCampaignSource());

        $this->assertEquals('organic', $utmz->getCampaignMedium());

        $this->assertEquals('(organic)', $utmz->getCampaignName());

        $this->assertEquals(2, count($utmz->getKeywords()));
    }

    public function organicProvider()
    {
        return array(
            array('123456789.1345235917.2.4.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=keyword1 keyword2')
        );
    }

}
