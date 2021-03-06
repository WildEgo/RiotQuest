<?php

namespace RiotQuest\Components\Collections;

use Carbon\Carbon;
use Psr\Cache\InvalidArgumentException;
use RiotQuest\Client;
use RiotQuest\Components\DataProviders\Provider;
use RiotQuest\Contracts\LeagueException;

/**
 * Class MatchReference
 *
 * @see https://developer.riotgames.com/api-methods/#match-v4/GET_getMatchlist
 *
 * @property string $lane Which lane player player ( TOP, JUNGLE, MID, BOT, NONE )
 * @property double $gameId Game ID for game
 * @property int $champion Champion which player played
 * @property string $platformId Region game was played on
 * @property int $season Season game was played in
 * @property int $queue Queue game was played on
 * @property string $role Role player player ( SOLO, DUO, DUO_SUPPORT, DUO_CARRY, NONE )
 * @property double $timestamp UNIX timestamp for game end
 *
 * @package RiotQuest\Components\Framework\Collections
 */
class MatchReference extends Collection
{

    /**
     * Get champion icon URL
     *
     * @return string
     */
    public function getChampionIcon()
    {
        return Provider::getChampionSquare($this->champion);
    }

    /**
     * Get champion name
     *
     * @return string
     */
    public function getChampionName()
    {
        return Provider::getChampionName($this->champion);
    }

    /**
     * Get the current match for this reference
     *
     * @return mixed
     * @throws LeagueException
     * @throws InvalidArgumentException
     */
    public function getMatch()
    {
        return Client::match($this->region)->id($this->gameId);
    }

    /**
     * @return MatchTimeline
     * @throws LeagueException
     * @throws InvalidArgumentException
     */
    public function getTimeline()
    {
        return Client::match($this->region)->timeline($this->gameId);
    }

    /**
     * Get relative time since this game was ended in ms
     *
     * @return int
     */
    public function getRelativeStartTimeMs()
    {
        return Carbon::now()->diffInMilliseconds((int)$this->timestamp);
    }

}
