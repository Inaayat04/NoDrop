<?php

namespace Inaayat\NoDrop;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use Inaayat\NoDrop\event\PlayerDropItemsEvent;
use Inaayat\NoDrop\event\PlayerDeathItemDropsEvent;

class Main extends PluginBase {

    public function onEnable(){
	$this->saveDefaultConfig();
	$this->config = $this->getConfig();
        if($this->config->get("NoDropWhenDie" === true)){
            $this->getServer()->getPluginManager()->registerEvents(new PlayerDropItemsEvent($this), $this);
        }
        if($this->config->get("NoItemDrop" === true)){
            $this->getServer()->getPluginManager()->registerEvents(new PlayerDeathItemDropsEvent($this), $this);
        }
    }

}
