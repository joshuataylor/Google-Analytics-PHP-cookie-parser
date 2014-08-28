<?php

class CTest extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider provider
     */
    public function testParse($__utmc) {
        $utmc = new GoogleAnalytics\CampaignTracking\Utm\C($__utmc);

        $this->assertEquals('123456789', $utmc->getDomainHash());
    }

    public function provider() {
        return array(
            array('123456789')
        );
    }

}
