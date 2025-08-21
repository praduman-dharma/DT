# System-Level Commands

This document covers essential system-level commands in Linux for managing processes, system resources, and system information.

## uname - System Information
```sh
uname
uname -a
```
Displays system information including kernel name, version, and architecture.

---

## uptime - System Uptime
```sh
uptime
uptime -p   # Pretty format
uptime -s   # System boot time
```
Shows how long the system has been running, current time, logged-in users, and load averages.

---

## date - Display or Set Date and Time
```sh
date
date +"%Y-%m-%d"
```
Displays or sets the system date and time. Use format specifiers for custom output.

---

## who - Show Who is Logged In
```sh
who
who -aH   # Detailed output with headers
```
Lists users currently logged into the system, their terminals, login times, and remote hosts.

---

## whoami - Show Current User
```sh
whoami
```
Displays the username of the current effective user.

---

## which - Locate Executable
```sh
which command_name
which php      ## to check the installed path of php
which php8.3
which cp       ## it will show the cp command file path
which ls
```
Shows the full path of the executable for a given command.

---

## id - User and Group Info
```sh
id
id username
id -u   # Only user ID
id -Gn  # Group names
```
Displays user and group information for the current or specified user.

---

## sudo - Execute as Superuser - sudo means (superuser do)
```sh
sudo command
```
Runs commands with superuser privileges.
For example, to install a package using apt, you would use sudo apt install [package-name].

---

## shutdown - Power Off or Reboot System
```sh
sudo shutdown now
sudo shutdown -P now
sudo shutdown +M "System will shut down in M minutes."
sudo shutdown HH:MM "System will shut down at HH:MM."
sudo shutdown -c   # Cancel scheduled shutdown
```
Halts, powers off, or reboots the system immediately or at a scheduled time.

---

## reboot - Restart System
```sh
sudo reboot
sudo shutdown -r now
sudo systemctl reboot
sudo shutdown -r +5   # Reboot in 5 minutes
sudo shutdown -r 23:00   # Reboot at 11:00 PM
sudo shutdown -c   # Cancel scheduled reboot
sudo reboot -f     # Forceful reboot
```
Reboots the system immediately or at a scheduled time. Use forceful reboot with caution.

---

