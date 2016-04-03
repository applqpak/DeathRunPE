<?php

namespace Sandertv\DeathRunPE;

//Events etc.
use pocketmine\plugin\pluginbase;
use pocketmine\utils\TextFormat;
use pocketmine\utils\config;
use pocketmine\event\listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\player;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\item\Item;
use pocketmine\block\Wallsign;
use pocketmine\block\Postsign;
use pocketmine\scheduler\ServerScheduler;
use pocketmine\event\entity\EntityTeleportEvent;
use pocketmine\event\entity\EntityLevelChangeEvent;


class DeathRunPE extends PluginBase implements Listener{
    
    public function onLoad(){
        $this->getLogger()->info("DeathRunPE Loading!");
    }
    public function onEnable(){
        $this->getServer()->getPluginManager->registerEvents($this,$this);
        $this->getLogger()->info("DeathRunPE Enabled!");
        
        //Config files
        $this->saveResources("config.yml");
        $yml = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        $this->yml = $yml->getAll();
        
        $this->getLogger()->debug("Config files are saved!");
        
    }
        
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if($cmd->getName() == "dr" && $sender instanceof Player){
            
        switch(strtolower($cmd->getName())){
            case "help":
                if($sender->hasPermission("deathrun") || $sender->hasPermission("deathrun.command") || $sender->hasPermission("deathrun.command.help")){
                    $this->sendMessage(TextFormat::AQUA . "DeathRunPE Help");
                    $this->sendMessage(TextFormat::GREEN . "/dr join - Joins a DeathRun game.");
                    $this->sendMessage(TextFormat::GREEN . "/dr stop - Stops the DeathRun game.");
                    $this->sendMessage(TextFormat::GREEN . "/dr create - Creates a DeathRun world");
                break;
                }
            case "create":
                if($sender->hasPermission("deathrun") || $sender-> hasPermission("deathrun.command") || $sender->hasPermission("deathrun.command.create")){
                    $this->sendMessage(TextFormat::AQUA . "DeathRun world created!");
                    
                
                }      
        }
        }
}
