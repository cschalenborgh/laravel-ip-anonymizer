<?php

namespace Cschalenborgh\IpAnonymizer\Tests;

use PHPUnit\Framework\TestCase;
use Cschalenborgh\IpAnonymizer\IpAnonymizer;

class IpAnonymizerTest extends TestCase
{
    /** @test */
    public function anonymize_ipv4()
    {
        $ia = new IpAnonymizer();

        $this->assertEquals('133.242.241.0', $ia->anonymizeIPv4('133.242.241.12'));
        $this->assertEquals('133.242.0.0', $ia->anonymizeIPv4('133.242.241.12', '255.255.0.0'));
        $this->assertEquals('133.0.0.0', $ia->anonymizeIPv4('133.242.241.12', '255.0.0.0'));
    }

    /** @test */
    public function anonymize_ipv6()
    {
        $ia = new IpAnonymizer();

        $this->assertEquals('2001:db8:85a3::', $ia->anonymizeIPv6('2001:db8:85a3::1319:8a2e:370:7344'));
        $this->assertEquals('2001:db8::', $ia->anonymizeIPv6('2001:db8:85a3::1319:8a2e:370:7344', 'ffff:ffff:0000:0000:0000:0000:0000:0000'));
        $this->assertEquals('2001::', $ia->anonymizeIPv6('2001:db8:85a3::1319:8a2e:370:7344', 'ffff:0000:0000:0000:0000:0000:0000:0000'));
    }

    /** @test */
    public function anonymize()
    {
        $ia = new IpAnonymizer();

        $this->assertEquals('133.242.241.0', $ia->anonymize('133.242.241.12'));
        $this->assertEquals('2001:db8:85a3::', $ia->anonymize('2001:db8:85a3::1319:8a2e:370:7344'));
    }

    /**
     * @test
     * @expectedException \ArgumentCountError
     */
    public function check_arguments()
    {
        $ia = new IpAnonymizer();
        $ia->anonymizeIPv4();
        $ia->anonymizeIPv6();
        $ia->anonymize();
    }

    /** @test */
    public function static_anonymize_ip()
    {
        $this->assertEquals('133.242.241.0', IpAnonymizer::anonymizeIp('133.242.241.12'));
        $this->assertEquals('133.242.241.0', IpAnonymizer::anonymizeIp('133.242.241.12', 'ipv4'));
        $this->assertEquals('133.242.0.0', IpAnonymizer::anonymizeIp('133.242.241.12', 'ipv4', '255.255.0.0'));
        $this->assertEquals('133.0.0.0', IpAnonymizer::anonymizeIp('133.242.241.12', 'ipv4', '255.0.0.0'));

        $this->assertEquals('2001:db8:85a3::', IpAnonymizer::anonymizeIp('2001:db8:85a3::1319:8a2e:370:7344', 'ipv6'));
        $this->assertEquals('2001:db8::', IpAnonymizer::anonymizeIp('2001:db8:85a3::1319:8a2e:370:7344', 'ipv6', 'ffff:ffff:0000:0000:0000:0000:0000:0000'));
        $this->assertEquals('2001::', IpAnonymizer::anonymizeIp('2001:db8:85a3::1319:8a2e:370:7344', 'ipv6', 'ffff:0000:0000:0000:0000:0000:0000:0000'));
    }
}
