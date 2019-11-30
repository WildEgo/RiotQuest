<?php

namespace RiotQuest\Components\Collections;

/**
 * Class LeagueItemList
 *
 * @see https://developer.riotgames.com/api-methods/#league-v4/GET_getLeagueById
 *
 * @list LeagueItem
 *
 * @package RiotQuest\Components\Framework\Collections
 */
class LeagueItemList extends Collection
{

    /**
     * Get every user in this league where winrate is over given percentage
     *
     * @param float $percentage
     * @return LeagueItemList
     */
    public function getWhereWinrateMoreThan($percentage)
    {
        return new static(array_values($this->filterArr(fn (LeagueItem $e) => $e->getWinrate() > $percentage)));
    }

}
