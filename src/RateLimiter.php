<?php

namespace Cschalenborgh\RateLimiter;

use Cache;

/**
 * Class RateLimiter.
 */
class RateLimiter
{
    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var int
     */
    protected $max_requests;

    /**
     *
     * @var int
     */
    protected $period;

    /**
     * RateLimit constructor.
     *
     * @param string $name - prefix used in storage keys.
     * @param int $max_requests
     * @param int $period seconds
     */
    public function __construct($name, $max_requests, $period)
    {
        $this->name = $name;
        $this->max_requests = $max_requests;
        $this->period = $period;
    }

    /**
     * Rate Limiting
     * http://stackoverflow.com/a/668327/670662
     *
     * @param string $id
     * @param float $use
     *
     * @return boolean
     */
    public function check($id, $use = 1.0)
    {
        $rate = $this->max_requests / $this->period;

        $t_key = $this->keyTime($id);
        $a_key = $this->keyAllow($id);

        if (!Cache::has($t_key)) {
            // first hit; setup storage; allow.
            Cache::put($t_key, time(), $this->period);
            Cache::put($a_key, ($this->max_requests - $use), $this->period);
            return true;
        }

        $c_time = time();

        $time_passed = $c_time - Cache::pull($t_key);
        Cache::put($t_key, $c_time, $this->period);

        $allowance = Cache::pull($a_key);
        $allowance += $time_passed * $rate;

        if ($allowance > $this->max_requests) {
            $allowance = $this->max_requests; // throttle
        }

        if ($allowance < $use) {
            // need to wait for more 'tokens' to be in the bucket.
            Cache::put($a_key, $allowance, $this->period);
            return false;
        }

        Cache::put($a_key, $allowance - $use, $this->period);
        return true;
    }

    /**
     * Get allowance left.
     *
     * @param string $id
     *
     * @return int number of requests that can be made before hitting a limit.
     */
    public function getAllowance($id)
    {
        $this->check($id, 0.0);

        $a_key = $this->keyAllow($id);

        if (!Cache::has($a_key)) {
            return $this->max_requests;
        }

        return (int) max(0, floor(Cache::pull($a_key)));
    }

    /**
     * Purge rate limit record for $id
     *
     * @param string $id
     *
     * @return void
     */
    public function purge($id)
    {
        Cache::forget($this->keyTime($id));
        Cache::forget($this->keyAllow($id));
    }

    /**
     * @return string
     *
     * @param string $id
     */
    private function keyTime($id)
    {
        return $this->name . ":" . $id . ":time";
    }

    /**
     * @return string
     *
     * @param string $id
     */
    private function keyAllow($id)
    {
        return $this->name . ":" . $id . ":allow";
    }
}