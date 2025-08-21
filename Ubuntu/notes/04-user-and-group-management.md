# User and Group Management Commands

This document covers essential commands for managing users and groups in Linux.

## useradd - Add New User

The useradd command in Linux is used to create a new user account. It allows administrators to specify various options for the new user, such as the home directory, default shell, and user ID.

Basic Usage:
To create a new user with the default settings, use the following command:

```sh
sudo useradd [username]
```

To create the user's home directory, use the -m option:

```sh
sudo useradd -m [username]
```

To create a user with a specific home directory and shell:

```sh
sudo useradd -d /home/[username] -s /bin/bash [username]
```

Check user list by running commands
cat /etc/passwd

---

## passwd - Set User Password

The passwd command in Linux is used to change a user's password. It can be used by both regular users to change their own passwords and by the root user to change the passwords of other users.

Basic Usage:
To change your own password, simply type:

```sh
passwd
```

To change the password of another user (as root), use:

```sh
sudo passwd [username]
```

---

## su - switch user

The su command in Linux is used to switch the current user to another user. By default, it switches to the root user if no username is specified. This command is useful for performing administrative tasks or accessing files and directories that require different user permissions.

Basic Usage:
To switch to another user (e.g., john), use the following command:

```sh
su - john
```

To switch to the root user:

```sh
su -
```

### You can use the exit command to log out from the current secondary user. If only the $ (dollar) sign is showing in the terminal, it means it's a secondary user, not the primary user.

---

## userdel - Delete User

The userdel command in Linux is used to delete a user account. It can remove the user's home directory and mail spool, depending on the options used.

Basic Usage:
To delete a user account without removing the home directory:

```sh
sudo userdel [username]
```

To delete a user account and remove the home directory:

```sh
sudo userdel -r [username]
```

---

## groupadd - Add New Group

The groupadd command in Linux is used to create a new group. It allows administrators to specify various options for the new group, such as the group ID.

Basic Usage:
To create a new group with the default settings, use the following command:

```sh
sudo groupadd [groupname]
```

To create a group with a specific group ID:

```sh
sudo groupadd -g [GID] [groupname]
```

Check user list by running commands
cat /etc/group

---

## gpasswd

The gpasswd command in Linux is used to administer /etc/group and /etc/gshadow. It allows the root user to add or remove users from a group.

Basic Usage:
To add a user to a group:

```sh
sudo gpasswd -a [username] [groupname]
```

To add a multiple user to a group:

```sh
sudo gpasswd -M [user1,user2,...] [groupname]  ## but this will remove existing members
```

To remove a user from a group:

```sh
sudo gpasswd -d [username] [groupname]
```

---

## groupdel - Delete Group

The groupdel command in Linux is used to delete a group. It can remove the group from the system, but it does not delete the group’s members.

Basic Usage:
To delete a group:

```sh
sudo groupdel [groupname]
```

---

## usermod - Modify User Account

The usermod command in Linux is used to modify an existing user account. This can include changing the user's home directory, shell, or group memberships.

Basic Usage:
To add a user to a group:

```sh
sudo usermod -aG [groupname] [username]
```

---

## id - Show User and Group Info

The id command in Linux displays the user ID (UID) and group ID (GID) of a specified user, along with the groups the user belongs to.

Basic Usage:
To display the UID and GID of a user:

```sh
id [username]
```

---

## groups - Show User's Groups

The groups command in Linux displays the groups a specified user belongs to.

Basic Usage:
To list all groups a user is a member of:

```sh
groups [username]
```

---
