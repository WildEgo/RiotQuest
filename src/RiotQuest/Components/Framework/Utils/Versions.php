<?php

namespace RiotQuest\Components\Framework\Utils;

use RiotQuest\Components\Framework\Client\Client;

class Versions
{

    /**
     * Get latest Game Version and caches for 2 hours
     *
     * @return string
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public static function current(): string
    {
        if (!Client::getCache()->has('riotquest.framework.version')) {
            $versions = json_decode(file_get_contents('https://ddragon.leagueoflegends.com/api/versions.json'), 1);
            Client::getCache()->set('riotquest.framework.version', json_encode([
                'latest' => $versions[0],
                'all' => $versions
            ]), 7200);
        }
        return json_decode(Client::getCache()->get('riotquest.framework.version'), 1)['latest'];
    }

}