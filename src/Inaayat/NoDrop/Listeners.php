<?php

namespace Inaayat\NoDrop;

use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use Inaayat\NoDrop\Main;

class Listeners implements Listener {
  
  private $plugin;
  
  public function __construct(Main $plugin){
        $this->plugin = $plugin;
  }

    public function onDeath(PlayerDeathEvent $event){
        $player = $event->getPlayer();
        if($player instanceof Player){
            $event->setDrops([ ]);
        }
    }
}
