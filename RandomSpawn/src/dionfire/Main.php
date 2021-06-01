<?php

/*
______ _ _____      ______ _          
|  _  (_)  _  |     |  ___(_)         
| | | |_| | | |_ __ | |_   _ _ __ ___ 
| | | | | | | | '_ \|  _| | | '__/ _ \
| |/ /| \ \_/ / | | | |   | | | |  __/
|___/ |_|\___/|_| |_\_|   |_|_|  \___|
                                      
*/

namespace dionfire;

use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\level\Position;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {
    public function onEnable() {
        $this->getLogger()->info("Plugin started!");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onDisable() {
        $this->getLogger()->info("Plugin stopped!");
    }
    public function onPlayerRespawn(PlayerRespawnEvent $event) {
        $player = $event->getPlayer();
        if ($player->getHealth() <= 0) {
            $event->setRespawnPosition(new Position(rand(-300, 300), rand(65, 70), rand(-300, 300)));
        }
    }
    public function onPlayerSpawn(PlayerJoinEvent $event, PlayerRespawnEvent $event_respawn) {
        $player = $event->getPlayer();
        $player_checker = $event_respawn->getPlayer();
        if ($player_checker->hasPlayedBefore() === false) {
            $event_respawn->setRespawnPosition(new Position(rand(-300, 300), rand(65, 70), rand(-300, 300)));
        }
    }
}

?>