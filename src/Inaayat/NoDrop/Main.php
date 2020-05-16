<?php

namespace Inaayat\NoDrop;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener {

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDrop(PlayerDropItemEvent $event)
    {
        $player = $event->getPlayer();
        if ($player instanceof Player) {
            if ($player->hasPermission("bypass.nodrop")) {
                return;
            } else {
                $event->setCancelled(true);
                $player->sendMessage("[" . TF::AQUA . "NoDrop" . TF::RESET . "] " . TF::YELLOW . "You cannot drop here.");
            }
        }
    }

    public function onDeath(PlayerDeathEvent $event){
        $player = $event->getPlayer();
        if($player instanceof Player){
            $event->setDrops([ ]);
        }
    }
}
