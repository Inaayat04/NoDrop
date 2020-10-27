<?php

namespace Inaayat\NoDrop\event;

use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use Inaayat\NoDrop\Main;

class PlayerDeathItemDropsEvent implements Listener {
    
    private $plugin;
    
    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }
    
    public function onDeath(PlayerDeathEvent $event){
        $player = $event->getPlayer();
        if (!$player->hasPermission("nodrop.bypass.deathdropitem")) {
            $event->setDrops([]);
        }
    }
    
}
