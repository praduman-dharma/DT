# File Transfer Commands

This document covers essential commands for transferring files in Linux.

## scp - Secure Copy Protocol
The `scp` command is used to securely copy files between hosts on a network.

### Syntax:
```bash
scp [options] [source] [destination]
```

### Examples:
```bash
scp file.txt user@remote:/path/to/destination   # Copy file.txt to remote host
scp -r directory/ user@remote:/path/to/destination   # Copy directory to remote host
scp -r user@remote:/path/to/destination directory/   # Copy directory from remote host to local machine
scp -r user@remote:/path/to/destination .   # Copy directory from remote host to local machine at current directory
scp -i /path/to/private/key file.txt user@remote:/path/to/destination   # Copy file.txt using a specific private key
```

## rsync - Remote Sync
The `rsync` command is used to synchronize files and directories between two locations.

### Syntax:
```bash
rsync [options] [source] [destination]
```

### Examples:
```bash
rsync -avz file.txt user@remote:/path/to/destination   # Copy file.txt to remote host
rsync -e "ssh -i /path/to/private/key" -avz /path/to/local/folder/ user@remote:/path/to/remote/folder/
rsync -avz directory/ user@remote:/path/to/destination   # Copy directory to remote host
```

## sftp - Secure File Transfer Protocol
The `sftp` command is used to securely transfer files over SSH.

### Syntax:
```bash
sftp [user@]host
```

### Examples:
```bash
sftp user@remote   # Connect to remote host
sftp> put file.txt   # Upload file.txt to remote host
sftp> get file.txt   # Download file.txt from remote host
```
