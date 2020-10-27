<?php

namespace Inaayat\NoDrop\event;

use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\utils\TextFormat as TF;
use Inaayat\NoDrop\Main;

class PlayerDropItemsEvent implements Listener {
  
    private $plugin;
  
    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }

    public function onDrop(PlayerDropItemEvent $event){
        $player = $event->getPlayer();
        if ($player->hasPermission("nodrop.bypass.dropitem")) {
            return;
        } else {
            $event->setCancelled(true);
            $nodropmsg = $this->plugin->config->get("NoDropMsg");
            $player->sendMessage("[" . TF::AQUA . "NoDrop" . TF::RESET . "] " . TF::YELLOW . $nodropmsg);
        }
    }

}
