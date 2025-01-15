<?php

declare(strict_types=1);

namespace SoyDavs\PlayerSize;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class PlayerSize extends PluginBase {

    /** @var Config */
    private Config $config;

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->config = $this->getConfig();

        $this->getLogger()->info(TextFormat::GREEN . "PlayerSize plugin enabled.");
    }

    public function onDisable(): void {
        $this->getLogger()->info(TextFormat::YELLOW . "PlayerSize plugin disabled.");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        // Ensure the sender is a player
        if(!$sender instanceof Player){
            $sender->sendMessage(TextFormat::RED . "This command can only be used in-game.");
            return true;
        }

        // Check if the player has the main permission
        $usePermission = $this->config->getNested("permissions.use", "playersize.use");
        if(!$sender->hasPermission($usePermission)){
            $sender->sendMessage($this->getMessage("no_permission"));
            return true;
        }

        // If no arguments are provided, show help
        if(count($args) === 0){
            $this->sendHelp($sender);
            return true;
        }

        $subCommand = strtolower($args[0]);

        switch($subCommand){
            case "help":
                $helpPermission = $this->config->getNested("permissions.help", "playersize.help");
                if(!$sender->hasPermission($helpPermission)){
                    $sender->sendMessage($this->getMessage("no_permission"));
                    return true;
                }
                $this->sendHelp($sender);
                break;

            case "normal":
                $normalPermission = $this->config->getNested("permissions.normal", "playersize.normal");
                if(!$sender->hasPermission($normalPermission)){
                    $sender->sendMessage($this->getMessage("no_permission"));
                    return true;
                }
                $scale = $this->config->getNested("scales.normal", 1.0);
                $sender->setScale((float)$scale);
                $sender->sendMessage($this->getMessage("size_set.normal"));
                break;

            case "small":
                $smallPermission = $this->config->getNested("permissions.small", "playersize.small");
                if(!$sender->hasPermission($smallPermission)){
                    $sender->sendMessage($this->getMessage("no_permission"));
                    return true;
                }
                $scale = $this->config->getNested("scales.small", 0.5);
                $sender->setScale((float)$scale);
                $sender->sendMessage($this->getMessage("size_set.small"));
                break;

            case "giant":
                $giantPermission = $this->config->getNested("permissions.giant", "playersize.giant");
                if(!$sender->hasPermission($giantPermission)){
                    $sender->sendMessage($this->getMessage("no_permission"));
                    return true;
                }
                $scale = $this->config->getNested("scales.giant", 2.0);
                $sender->setScale((float)$scale);
                $sender->sendMessage($this->getMessage("size_set.giant"));
                break;

            case "hide":
                $hidePermission = $this->config->getNested("permissions.hide", "playersize.hide");
                if(!$sender->hasPermission($hidePermission)){
                    $sender->sendMessage($this->getMessage("no_permission"));
                    return true;
                }
                $scale = $this->config->getNested("scales.hide", 0.0);
                $sender->setScale((float)$scale);
                $sender->sendMessage($this->getMessage("size_set.hide"));
                break;

            default:
                $sender->sendMessage($this->getMessage("unknown_command"));
                break;
        }

        return true;
    }

    /**
     * Sends the help message to the player.
     *
     * @param Player $sender
     */
    private function sendHelp(Player $sender): void {
        if(!$this->config->getNested("messages.enabled", true)){
            return;
        }

        $prefix = $this->config->getNested("messages.prefix", "");
        $helpTitle = $this->config->getNested("messages.help.title", "PlayerSize Help");
        $commands = $this->config->getNested("messages.help.commands", []);

        $sender->sendMessage($prefix . $helpTitle);
        foreach($commands as $command){
            $sender->sendMessage($command);
        }
    }

    /**
     * Retrieves a message from the config using dot notation for nested keys.
     *
     * @param string $path
     * @return string
     */
    private function getMessage(string $path): string {
        return $this->config->getNested("messages.$path", "§cUndefined message.");
    }
}
