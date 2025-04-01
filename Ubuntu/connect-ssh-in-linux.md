# Connecting to a Remote Server via SSH

In Ubuntu, you may not need to use PuTTY; instead, you can connect using a terminal.  
For example, to connect to a remote server, simply run:

```sh
ssh remote_host
```

If your username differs on the remote system, use the following syntax:

```sh
ssh remote_username@remote_host
```

**Reference:** [G-Core Support](https://gcore.com/support/articles/4408223538321/)

---

# Connecting to SSH Using a PEM File

## Step 1: Check the File Permissions of Your `.pem` File  
Run the following command to check file permissions:

```sh
ls -l filename.pem
```

**Example:**
```sh
ls -l project-key.pem
```

## Step 2: Change File Permissions  
Set the correct permissions using:

```sh
chmod 400 filename.pem
```

**Example:**
```sh
chmod 400 project-key.pem
```

## Step 3: Connect to the Remote Server  
Use the `-i` option to specify the `.pem` file when connecting:

```sh
ssh -i "filename.pem" remote_username@remote_host
```

**Example:**
```sh
ssh -i "project-key.pem" user@test.server.com
```
