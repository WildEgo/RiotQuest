<?php

namespace RiotQuest\Components\Collections;

/**
 * Class GameCustomizationObjectList
 *
 * @see https://developer.riotgames.com/api-methods/#spectator-v4/GET_getCurrentGameInfoBySummoner
 *
 * @list GameCustomizationObject
 *
 * @package RiotQuest\Components\Framework\Collections
 */
class GameCustomizationObjectList extends Collection
{

    /**
     * Get list of categories
     *
     * @return array
     */
    public function getCategories()
    {
        return $this->mapArr(fn (GameCustomizationObject $e) => $e->category);
    }

}
