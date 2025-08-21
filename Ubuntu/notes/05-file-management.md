# File Permission Commands

Linux permissions are a fundamental aspect of the operating system's security model, controlling access to files and directories. They define who can perform specific actions on a given resource.

1. Permission Types:
Read (r): Allows viewing the contents of a file or listing the contents of a directory.
Write (w): Allows modifying the contents of a file or creating/deleting files within a directory. 
Execute (x): Allows running a file as a program or accessing/entering a directory. 

2. Permission Categories:
Permissions are assigned to three categories:
Owner (u): The user who owns the file or directory (typically the creator).
Group (g): A group of users associated with the file or directory.
Others (o): All other users on the system who are neither the owner nor part of the owning group.


## simpler way to remember Permissions:

### Method 1

Simply think of Read (4) + Write (2) + Execute (1) = 7.

777 means Read + Write + Execute permissions for the Owner, Group, and Others.
The first digit represents the Owner,
The second digit represents the Group,
The third digit represents Others.

412 means Read permission for the Owner, Execute permission for the Group, and Write permission for Others.
again the first digit represents the Owner,
The second digit represents the Group,
The third digit represents Others.


### Method 2 - Linux File Permission Chart


0   -    -    -    ---
1   -    -    x    --x
2   -    w    -    -w-
3   -    w    x    -wx
4   r    -    -    r--
5   r    -    x    r-x
6   r    w    -    rw-
7   r    w    x    rwx


## umask
The `umask` command is used to set default file permissions for newly created files and directories. It defines the permissions that will not be set (masked) when a new file or directory is created.

### Example:
```bash
umask
```
This will display the current umask, mostly it will return 0002 for linux and 022 for others.


```bash
umask 022
```
This command sets the default permissions to `755` for directories and `644` for files.


## ls -l - Long Listing Format
The `ls -l` command is used to display detailed information about files and directories in a long listing format. The output includes file permissions, number of links, owner, group, size, and timestamp.

### Example:
```bash
ls -l
```
Output:
```
drwxr-xr-x  2 user group 4096 Jan  1 12:00 directory
-rw-r--r--  1 user group  123 Jan  1 12:00 file.txt
```

## chmod - Change Mode (Change File Permissions)
The `chmod` command is used to change the permissions of files and directories in Linux. It can be used in two ways: symbolic mode and numeric mode.

### Symbolic Mode
In symbolic mode, you can specify the permissions you want to add or remove using the following syntax:
```bash
chmod [who][+|-][permissions] [file]
```
- `who`: Specifies the user category (u for owner, g for group, o for others, a for all).
- `+`: Adds the specified permissions.
- `-`: Removes the specified permissions.
- `permissions`: The permissions to add or remove (r for read, w for write, x for execute).

#### Examples:
```bash
chmod u+x file.txt      # Add execute permission for the owner
chmod g-w file.txt      # Remove write permission for the group
chmod o+r file.txt      # Add read permission for others
```

### Numeric Mode
In numeric mode, you can specify the permissions using a three-digit octal number. Each digit represents the permissions for the owner, group, and others, respectively.

#### Examples:
```bash
chmod 777 file.txt      # Set rwxrwxrwx permissions
chmod 755 file.txt      # Set rwxr-xr-x permissions
chmod 644 file.txt      # Set rw-r--r-- permissions
chmod 600 file.txt      # Set rw------- permissions
```

### chmod with recursive option
The `-R` option can be used with `chmod` to change permissions recursively for all files and directories within a specified directory.
```bash
chmod -R 777 /path/to/directory   # Set rwxrwxrwx permissions for all files and directories

```bash
chmod -R 755 /path/to/directory   # Set rwxr-xr-x permissions for all files and directories
#### Example:
```bash
chmod -R 755 /path/to/directory   # Set rwxr-xr-x permissions for all files and directories
```


## chown - Change Ownership
The `chown` command is used to change the owner and/or group of a file or directory.

### Syntax:
```bash
chown [new_owner]:[new_group] [file]
```

### Examples:
```bash
chown user:group file.txt       # Change owner and group
chown user file.txt              # Change owner only
chown :group file.txt            # Change group only
```


## chgrp - Change Group
The `chgrp` command is used to change the group ownership of a file or directory.

### Syntax:
```bash
chgrp [new_group] [file]
```

### Examples:
```bash
chgrp group file.txt       # Change group ownership
```


# File Management Commands

This document covers essential commands for managing files and directories in Linux.

## cp - Copy Files and Directories
```sh
cp source destination
cp -r source_dir destination_dir
```
Copies files or directories.

---

## mv - Move or Rename Files and Directories
```sh
mv source destination
```
Moves or renames files and directories.

---

## rm - Remove Files and Directories
```sh
rm file
rm -r directory
```
Removes files or directories. Use `-r` for recursive removal.

---

## touch - Create Empty File
```sh
touch filename
```
Creates an empty file or updates the timestamp.

---

## find - Search for Files
```sh
find /path -name filename
```
Searches for files and directories by name.

---

## locate - Find Files Quickly
```sh
locate filename
```
Searches for files using a prebuilt database.

---

## updatedb - Update Locate Database
```sh
sudo updatedb
```
Updates the database used by `locate`.

---

## stat - Display File or Filesystem Status
```sh
stat filename
```
Shows detailed information about a file.

---