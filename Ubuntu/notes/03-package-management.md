# Package Management Commands

This document covers essential package management commands for installing, updating, and removing software in Linux.

## apt - Advanced Package Tool (Debian/Ubuntu)
```sh
sudo apt update
sudo apt upgrade
sudo apt install package_name
sudo apt remove package_name
sudo apt search package_name
```
- `update`: Refreshes package lists.
- `upgrade`: Installs available updates.
- `install`: Installs a package.
- `remove`: Uninstalls a package.
- `search`: Finds packages by name.

---

## yum - Yellowdog Updater Modified (RHEL/CentOS)
```sh
sudo yum update
sudo yum install package_name
sudo yum remove package_name
sudo yum search package_name
```
- `update`: Updates all packages.
- `install`: Installs a package.
- `remove`: Uninstalls a package.
- `search`: Finds packages by name.

---

## dnf - Dandified YUM (Fedora)
```sh
sudo dnf update
sudo dnf install package_name
sudo dnf remove package_name
sudo dnf search package_name
```
- `update`: Updates all packages.
- `install`: Installs a package.
- `remove`: Uninstalls a package.
- `search`: Finds packages by name.

---

## rpm - Red Hat Package Manager
```sh
sudo rpm -ivh package.rpm
sudo rpm -Uvh package.rpm
sudo rpm -e package_name
```
- `-ivh`: Installs a package.
- `-Uvh`: Upgrades a package.
- `-e`: Removes a package.

---

## snap - Universal Linux Packages
```sh
sudo snap install package_name
sudo snap remove package_name
sudo snap list
```
- `install`: Installs a snap package.
- `remove`: Uninstalls a snap package.
- `list`: Lists installed snap packages.

---

## Most used commands:
    list - list packages based on package names
    search - search in package descriptions
    show - show package details
    install - install packages
    reinstall - reinstall packages
    remove - remove packages
    purge <package_name> - Removes a specified package along with its configuration files.
    autoremove - Remove automatically all unused packages
    update - update list of available packages
    upgrade - upgrade the system by installing/upgrading packages
    full-upgrade - upgrade the system by removing/installing/upgrading packages
    edit-sources - edit the source information file
    satisfy - satisfy dependency strings
