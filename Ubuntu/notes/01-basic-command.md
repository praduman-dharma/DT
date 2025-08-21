# Linux Basic Commands

This document covers essential Linux commands for file management, navigation, process control, and system monitoring. Each command includes usage examples and explanations to help you understand and use them effectively.

## ls - List Directory Contents

The `ls` command displays the contents of a directory, including files and subdirectories. It helps users quickly view and organize files in the file system.

- Files are typically shown in white, folders in blue, and other file types in different colors for easy identification.

```sh
ls
```
Lists the contents of the current directory.

```sh
ls -l
```
Lists directory contents in long format, showing permissions, ownership, size, and modification date. Directories have a `d` prefix in the permissions column.

```sh
ls -a
```
Lists all contents, including hidden files and directories (those starting with a dot `.`), such as `.gitignore`, `.bashrc`, `.bash_aliases`.

---

## pwd - Print Working Directory
```sh
pwd
```
Displays the absolute path of the current directory.

---

## mkdir - Make Directory
```sh
mkdir directory_name
```
Creates a new directory (folder) with the specified name.

---

## touch - Create Empty Files
```sh
touch filename
```
Creates an empty file if it does not exist, or updates the timestamp if it does.

---

## cd - Change Directory
```sh
cd directory_name
```
Changes the current working directory to the specified directory.

```sh
cd ..
```
Moves up to the parent directory.

---

## rm - Remove Files and Directories
```sh
rm file
rm directory_name
rm -r directory_name   # For removing non-empty directories
```
Removes files or directories. Use `-r` to remove non-empty directories.

---

## rmdir - Remove Empty Directory
```sh
rmdir directory_name
```
Removes empty directories only.

---

## cat - Concatenate and Display Files
```sh
cat filename
```
Displays the contents of a file, combines multiple files, or creates/appends content to files.

```sh
echo "Hello World!" > filename
```
Creates a file and writes content to it.

---

## head - Display Beginning of Files
```sh
head filename
head -n 12 newfile.txt
```
Shows the first part of files. By default, displays the first 10 lines. Use `-n` for number of lines, `-c` for bytes.

---

## tail - Display End of Files
```sh
tail filename
tail -n 12 newfile.txt
tail -f newfile.txt
```
Shows the last part of files. By default, displays the last 10 lines. Use `-f` to follow file changes in real-time (useful for logs).

---

## less - Paginated File Viewer
```sh
less filename
```
Views file content one screen at a time, with forward and backward navigation.

---

## more - Paginated File Viewer
```sh
more filename
```
Views file content one screen at a time (forward navigation only).

---

## cp - Copy Files and Directories
```sh
cp [options] source destination
```
Copies files or directories from source to destination.

---

## mv - Move or Rename Files and Directories
```sh
mv source_file destination_directory/
mv old_name new_name
mv source_file destination_directory/new_name
```
Moves or renames files and directories.

---

## wc - Word, Line, and Byte Count
```sh
wc filename.txt
```
Counts lines, words, and bytes in a file.

---

## Hard Link
```sh
ln original_file_path new_hard_link_path
```
Creates a hard link, which is a direct reference to the inode of an existing file. Multiple filenames can point to the same data. Hard links only work within the same filesystem and cannot link to directories.

---

## Soft Link (Symbolic Link)
```sh
ln -s /path/to/original_file_or_directory /path/to/new_link_name
```
Creates a symbolic (soft) link, which acts as a shortcut or pointer to another file or directory. Soft links can span filesystems and link to directories. If the target is moved or deleted, the link becomes broken.

**Example:**
```sh
ln -s /var/log/syslog ~/my_shortcut
```

---

## cut - Extract Sections from Lines
```sh
cut OPTION... [FILE]...
cut -b 1 myfile.txt        # Print the first byte of each line
cut -b 1-4 myfile.txt      # Print bytes 1-4 of each line
```
Extracts columns or fields from structured text data.

---

## tee - Output to Terminal and File
```sh
ls -l | tee myfile.txt
```
Writes output to both terminal and file. Use `-a` to append.

---

## sort - Sort Lines of Text Files
```sh
sort filename.txt
```
Sorts lines alphabetically or numerically. Does not modify the original file unless redirected.

---

## clear - Clear Terminal Screen
```sh
clear
```
Clears the terminal display.

---

## diff - Compare Files
```sh
diff file1.txt file2.txt
```
Compares two files line by line and shows differences.

---

## VI Editor
```sh
vi [file_name]
```
The `vi` editor is a powerful and widely used text editor in Linux. It operates in different modes, allowing users to efficiently edit files from the command line.

### Modes in Vi Editor
- **Command Mode:** Default mode for navigation and issuing commands.
- **Insert Mode:** For entering and editing text. Enter insert mode by pressing `i`, `a`, `A`, or `o`.
- **Esc Mode:** Press `Esc` to return to command mode from insert mode.

### Inserting and Replacing Text
- `i` — Insert before cursor
- `a` — Insert after cursor
- `A` — Insert at end of line
- `o` — Open new line below and enter insert mode

### Saving and Exiting
Press `Esc` to enter command mode, then type:
- `:q` — Quit
- `:q!` — Quit without saving changes
- `:wq` — Write (save) and quit

### Reference
For more details, see: [GeeksforGeeks Vi Editor Guide](https://www.geeksforgeeks.org/linux-unix/vi-editor-unix/)

---

## SSH - Secure Shell
SSH is the primary method for securely logging into and managing remote Linux servers via a command-line interface.

```sh
ssh username@remote_server_ip_or_hostname
```
Replace `username` with the user account and `remote_server_ip_or_hostname` with the server's IP or hostname.

---

## Connecting Using Private Key (pem/ppk)
```sh
ssh -i /path/to/your/private_key user@your_server_ip
```
Set private key permissions to 400 for security:
```sh
chmod 400 your_private_key.pem
```
Check file permissions:
```sh
ls -l filename
```

---

## df - Disk Free
```sh
df
df -h
```
Displays disk space usage for file systems. Use `-h` for human-readable format, `-T` for filesystem type, `-a` for all filesystems, and `-i` for inode info.

---

## du - Disk Usage
```sh
du
du /home/user/documents
```
Shows disk usage for files and directories.

---

## ps - Process Status
```sh
ps
ps -e
ps aux
```
Displays information about running processes. Use `ps aux` for a comprehensive listing.

---

## top - Real-Time System Monitoring
Runs interactively:
```sh
top
```
Shows real-time resource usage and running processes.

---

## fuser - Identify Processes Using Files
```sh
fuser .
fuser [options] name ...
```
Shows process IDs using specified files, directories, or sockets.

---

## kill - Terminate Processes
```sh
kill [signal] PID
kill 1234
```
Sends signals to processes, usually to terminate them.

---

## free - Memory Usage
```sh
free
free -h
```
Displays total, used, and free memory, including swap and buffers.

---

## nohup - Run Commands Immune to Hangup
```sh
nohup command [arguments] &
```
Runs a command immune to hangups, useful for long-running processes.

---

## vmstat - System Performance Statistics
```sh
vmstat
vmstat -a
```
Reports virtual memory statistics and other system performance info.

---

## Difference Between sh and bash

- **sh (Bourne Shell):**
  - The original Unix shell, designed for portability and simplicity.
  - Supports basic scripting and command execution.
  - Lacks many advanced features found in modern shells.

- **bash (Bourne Again Shell):**
  - An enhanced version of sh, widely used as the default shell on Linux systems.
  - Supports advanced scripting features: command history, tab completion, improved syntax, arrays, arithmetic operations, and more.
  - Backward compatible with sh, but scripts using bash-specific features may not run in sh.

> In Markdown code blocks, `sh` is used for generic shell scripts, while `bash` is used for scripts that require Bash-specific features.

