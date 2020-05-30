<?php

namespace Deaths;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use Deaths\Main;
use pocketmine\Server;
use pocketmine\event\player\PlayerQuitEvent;




class Main extends PluginBase implements Listener{

   public function onEnable() {
       $thiis->getLogger()->info("Deaths has been enabled");
       $this->getServer()->getPluginManager()->registerEvents($this, $this);
   }

   public function onDisable(){
       $this->getLogger->info("Disabling Deaths...");
   }

   public function onJoinPlayer(PlayerJoinEvent $event) {
       $event->setJoinMessage($event->getPlayer()->getName(). "has joined the server, say hi");
   }

   public function onPlayerQuit(PlayerQuitEvent $event) {
       $event setQuitMessage($event->getPlayer()->getName(). "has left the server, oh no");
   }

   public function onDeath(PlayerDeathEvent $event) : void{
       $event->setDeathMessage("The player " . $event->getPlayer()->getName() . "has just passed away!");
   }

}
