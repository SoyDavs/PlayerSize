
# PlayerSize Plugin for PocketMine-MP



**PlayerSize** is a customizable PocketMine-MP plugin that allows players to adjust their own size or become invisible using simple commands. Whether you want to be larger, smaller, or hidden, PlayerSize provides an easy and flexible way to modify your in-game appearance.

## Features

- **Adjust Player Size:** Set your size to normal, small, or giant.
- **Toggle Invisibility:** Become invisible or visible at will.
- **Permission-Based Access:** Control who can use specific commands.
- **Configurable Settings:** Easily customize scales and messages via `config.yml`.
- **Command Aliases:** Use short aliases for quicker command access.

## Commands

| Command                  | Alias | Description                                 |
|--------------------------|-------|---------------------------------------------|
| `/playersize`            | `/ps` | Main command to manage player size.         |
| `/playersize help`       | `/ps help` | Display help information.                   |
| `/playersize normal`     | `/ps normal` | Set your size to normal.                    |
| `/playersize small`      | `/ps small` | Set your size to small.                     |
| `/playersize giant`      | `/ps giant` | Set your size to giant.                     |
| `/playersize hide`       | `/ps hide` | Toggle your invisibility.                   |

## Installation

1. **Download the Plugin:**
   - Clone or download the repository 

2. **Place in Plugins Directory:**
   - Extract the downloaded files.
   - Place the `PlayerSize` folder into your PocketMine-MP `plugins` directory.

3. **Restart the Server:**
   - Restart your PocketMine-MP server to load the plugin.
   - Upon first run, a default `config.yml` will be generated.

## Configuration

Customize the plugin settings by editing the `config.yml` file located in the `plugins/PlayerSize` directory.

### `config.yml` Structure

```yaml
# PlayerSize Configuration

# Scale settings for different sizes
scales:
  normal: 1.0
  small: 0.5
  giant: 2.0

# Command aliases
aliases:
  playersize: [ps]

# Messages sent to players
messages:
  enabled: true
  prefix: "§e[PlayerSize] §f"
  help:
    title: "§a--- PlayerSize Help ---"
    commands:
      - "§6/playersize help §f- Show this help message."
      - "§6/playersize normal §f- Set your size to normal."
      - "§6/playersize small §f- Set your size to small."
      - "§6/playersize giant §f- Set your size to giant."
      - "§6/playersize hide §f- Toggle your invisibility."
  no_permission: "§cYou do not have permission to use this command."
  size_set:
    normal: "§aYour size has been set to normal."
    small: "§aYour size has been set to small."
    giant: "§aYour size has been set to giant."
  hidden: "§aYou are now hidden."
  unhidden: "§aYou are now visible."
  unknown_command: "§cUnknown command. Use /ps help for a list of commands."

# Permissions
permissions:
  playersize.use:
    description: "Allows using the PlayerSize commands."
    default: false
  playersize.help:
    description: "Allows viewing help information for PlayerSize."
    default: true
  playersize.normal:
    description: "Allows setting player size to normal."
    default: true
  playersize.small:
    description: "Allows setting player size to small."
    default: true
  playersize.giant:
    description: "Allows setting player size to giant."
    default: true
  playersize.hide:
    description: "Allows toggling invisibility."
    default: false
```

### Configuration Options

- **Scales:**
  - `normal`: Default player size (`1.0`).
  - `small`: Reduced player size (`0.5`).
  - `giant`: Increased player size (`2.0`).

- **Aliases:**
  - Define alternate command names for easier access. By default, `/playersize` can be accessed via `/ps`.

- **Messages:**
  - Customize the messages displayed to players. Change colors and text as desired using Minecraft color codes (e.g., `§a` for green).
  
- **Permissions:**
  - Define permission nodes to control access to commands. Adjust the default settings as needed.

## Permissions

Manage who can use the PlayerSize commands using a permissions plugin like **LuckPerms**. Below are the default permission nodes:

| Permission               | Description                                     | Default |
|--------------------------|-------------------------------------------------|---------|
| `playersize.use`         | Allows using the PlayerSize commands.           | `op` |
| `playersize.help`        | Allows viewing help information.                | `op`  |
| `playersize.normal`      | Allows setting player size to normal.           | `op`  |
| `playersize.small`       | Allows setting player size to small.            | `op`  |
| `playersize.giant`       | Allows setting player size to giant.            | `op`  |
| `playersize.hide`        | Allows toggling invisibility.                   | `op` |



## Usage

### Adjusting Player Size

- **Set to Normal:**
  ```bash
  /playersize normal
  # or
  /ps normal
  ```

- **Set to Small:**
  ```bash
  /playersize small
  # or
  /ps small
  ```

- **Set to Giant:**
  ```bash
  /playersize giant
  # or
  /ps giant
  ```

### Toggling Invisibility

- **Hide Yourself:**
  ```bash
  /playersize hide
  # or
  /ps hide
  ```
  *This command toggles your invisibility. Running it once will make you invisible; running it again will make you visible.*

### Viewing Help

- **Display Help Information:**
  ```bash
  /playersize help
  # or
  /ps help
  ```

## Contributing

Contributions are welcome! If you'd like to contribute to PlayerSize, please follow these steps:

1. **Fork the Repository:**
   - Click the "Fork" button at the top of the repository page.

2. **Create a Feature Branch:**
   ```bash
   git checkout -b feature/YourFeatureName
   ```

3. **Commit Your Changes:**
   ```bash
   git commit -m "Add your message here"
   ```

4. **Push to Your Fork:**
   ```bash
   git push origin feature/YourFeatureName
   ```

5. **Create a Pull Request:**
   - Go to the original repository and click "New pull request."

