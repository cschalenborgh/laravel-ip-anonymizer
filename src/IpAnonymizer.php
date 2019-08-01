<?php

namespace Cschalenborgh\IpAnonymizer;

/**
 * Class IpAnonymizer.
 */
class IpAnonymizer
{
    /**
     * @var string
     */
    private $ip4_netmask = '255.255.255.0';

    /**
     * @var string
     */
    private $ip6_netmask = 'ffff:ffff:ffff:ffff:0000:0000:0000:0000';

    /**
     * Anonymize an IPv4 or IPv6 address.
     *
     * @param string $ip
     *
     * @return string
     */
    public function anonymize(string $ip): string
    {
        $packed_ip = inet_pton($ip);

        if (4 === strlen($packed_ip)) {
            return $this->anonymizeIPv4($ip);
        } elseif (16 === strlen($packed_ip)) {
            return $this->anonymizeIPv6($ip);
        }

        return $ip;
    }

    /**
     * Anonymize an IPv4 address.
     *
     * @param string $address
     * @param string $netmask
     *
     * @return string
     */
    public function anonymizeIPv4(string $address, string $netmask = null): string
    {
        $netmask = $netmask ?? $this->ip4_netmask;

        return inet_ntop(inet_pton($address) & inet_pton($netmask));
    }

    /**
     * Anonymize an IPv6 address.
     *
     * @param string $address
     * @param string $netmask
     *
     * @return string
     */
    public function anonymizeIPv6(string $address, string $netmask = null): string
    {
        $netmask = $netmask ?? $this->ip6_netmask;

        return inet_ntop(inet_pton($address) & inet_pton($netmask));
    }

    /**
     * Anonymize an IPv4 or IPv6 address.
     *
     * @param string $address
     * @param string $version
     * @param string $netmask
     *
     * @return string
     */
    public static function anonymizeIp(string $address, string $version = 'ipv4', $netmask = null): string
    {
        if ('ipv6' === $version) {
            return (new self())->anonymizeIPv6($address, $netmask);
        }

        return (new self())->anonymizeIPv4($address, $netmask);
    }
}
