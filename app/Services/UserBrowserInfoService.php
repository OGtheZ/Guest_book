<?php

namespace App\Services;

use Jenssegers\Agent\Agent;

class UserBrowserInfoService
{
    public function getBrowserInfo()
    {
        $agent = new Agent();
        $browser = $agent->browser();
        $version = $agent->version($browser);
        return $browser . " v" . $version;
    }
}
