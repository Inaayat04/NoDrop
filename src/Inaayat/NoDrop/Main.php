<?php

namespace Inaayat\NoDrop;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use Inaayat\NoDrop\EventListener;
use Inaayat\NoDrop\Listener;

class Main extends PluginBase {

    public function onEnable(){
        @mkdir($this->getDataFolder());
	$this->saveDefaultConfig();
	$this->config = $this->getConfig();
        if($this->config->get("NoDropWhenDie" === true)){
            $this->getServer()->getPluginManager()->registerEvents(new Listener($this), $this);
        }
        if($this->config->get("NoItemDrop" === true)){
            $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        }
    }
}
