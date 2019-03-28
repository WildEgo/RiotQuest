<?php

namespace RiotQuest\Components\Framework\Collections;

/**
 * Class CurrentGameInfo
 *
 * @see https://developer.riotgames.com/api-methods/#spectator-v4/GET_getCurrentGameInfoBySummoner
 *
 * @property double $gameId Game ID for the live game
 * @property double $gameStartTime Unix timestamp for game start
 * @property string $platformId Platform game is being played on
 * @property string $gameMode Game mode which is being played
 * @property double $mapId Map which is being played
 * @property string $gameType Game type which is being played
 * @property BannedChampionList $bannedChampions List of banned champions
 * @property Observer $observers Observer for this game
 * @property CurrentGameParticipantList $participants List of participants in this game
 * @property double $gameLength Length this game has been going for
 * @property double $gameQueueConfigId Queue ID for this game
 *
 * @package RiotQuest\Components\Framework\Collections
 */
class CurrentGameInfo extends Collection
{



}