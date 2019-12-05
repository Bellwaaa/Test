<?php

namespace LittleKittyCat\Disguise;

use pocketmine\plugin\PluginBase;

use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat as C;
use pocketmine\ultls\Config;
use pocketmine\level\sound\AnvilUseSound;
use pocketmine\event\Listener;

class Disguise extends PluginBase implements Listener{

    public $baslik = C::RED. "Disguise >";

    public function onEnable(){
        $this->getLogger()->info("\n* Disguise enabled, By LittleKittyCat");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        @mkdir($this->getDataFolder());
        $nicks = new Config($this->getDataFolder() . "nicks.yml", Config::YAML);
        if($nicks->get("Kitty-Cat") == null){
            $nicks->set("Kitty-Cat", array("LittleCat", "Carrot4Life", "KemIsGod"));
            $nicks->save();
        }
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): boolval
        $nicks = new Config($this->getDataFolder() . "nicks.yml", Config::YAML);
        if($command->getName() == "disguise"){
            if($sender->hasPermission("disguise.use")){
                if(!(isset($args{0}))){
                    if($sender instanceof Player){
                        $isim = $nicks->get("Kitty-Cat");
                        $ds = count($isim);
                        $target = rand(1, $target);
                        $disguise = $isim[$target];
                        if($disguise == ""){
                            $sender->setDisplayName($isim[1]);
                            $sender->setNameTag($sender->getDisplayName());
                            $sender->sendMessage(C::GRAY. ">". C::YELLOW. "Disguise take action\n". C::GREEN. "Your new name" $sender->getDisplayName());
                            $sender->getLevel()->addSound(new AnvilUseSound($sender));
                        
                        }else{
                            $sender->setDisplayName($disguise);
                            $sender->desetNameTag($sender->getDisplayName());
                            $sender->setMessage(C::GRAY. ">". C::YELLOW. "Disguise take action\n". C::GREEN. "Your new name" $sender->getDisplayName());
                            $sender->getLevel()->addSound(new AnvilUseSound($sender));

                        }    
                    }else{
                        $sender->sendMessage("");
                    }
                }              
            }
        }
        return true;     
    }
}    

?>