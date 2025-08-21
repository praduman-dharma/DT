# Pro Linux Commands

## awk - Pattern Scanning and Processing Language
- A powerful text processing tool.
- Usage: `awk '{print $1}' <file>`

### Examples
```bash
# Print the first column of a file
awk '{print $1}' file.txt

# Print the multiple columns of a file
awk '{print $1, $2}' file.txt

# Print lines matching a pattern
awk '/pattern/ {print $0}' file.txt

# Apply filter, here the info text filter is applied
awk '/INFO/' debug.log
awk '/INFO/ {print $1,$2,$3}' debug.log

# Save output in file
awk '/INFO/ {print $1,$2,$3}' debug.log > output.txt

# Count occurrences
awk '/INFO/ {count++} END {print count}' debug.log
awk '/INFO/ {count++} END {print "The count of INFO IS:", count}' debug.log
awk '/WARNING/ {count++} END {print count}' debug.log

# Print lines with a specific column filter
awk '$2 >= "08:52:06" {print}' debug.log
awk '$2 >= "08:52:06" {print $2}' debug.log
awk '$2 >= "08:52:06" && $2 <= "08:52:50" {print}' debug.log

# Print specific line numbers
awk 'NR >= 2 && NR <= 10 {print}' debug.log
```


## sed - Stream Editor
- A stream editor for filtering and transforming text.
- Usage: `sed 's/old/new/g' <file>`

### Examples
```bash

# Print lines containing a specific pattern
sed -n '/INFO/p' debug.log

# Print line numbers of matching lines
sed -n -e '/INFO/=' debug.log

# Replace text in a file
sed 's/old/new/g' file.txt
sed 's/INFO/LOG/g' debug.log   ## Replace INFO with LOG

# Replace text in a specific line range
sed '1,10 s/INFO/LOG/g' debug.log

# Print modified lines
sed '1,15 s/INFO/LOG/g; 1,10p; 11q' debug.log

# Replace text and save changes in place
sed -i 's/old/new/g' file.txt

# Print lines with line numbers containing a specific pattern
sed -n -e '/INFO/=' -e '/INFO/p' debug.log

# Delete lines containing a pattern
sed '/pattern/d' file.txt

# Print specific lines
sed -n '2,5p' file.txt
```


## grep - Global Regular Expression Print
- Searches for patterns in files.
- Usage: `grep <pattern> <file>`

### Examples
```bash
# Search for a pattern in a file
grep "pattern" file.txt
grep "INFO" debug.log

# Search recursively in a directory
grep -r "pattern" /path/to/directory

# Ignore case while searching, i means insensitive
grep -i "pattern" file.txt

# Show line numbers of matching lines
grep -n "pattern" file.txt

# Count occurrences
grep -c "INFO" debug.log

# Invert match (show non-matching lines)
grep -v "pattern" file.txt

# Search for a process
ps aux | grep ubuntu
```

## sudo
- Executes a command with superuser (root) privileges.
- Usage: `sudo <command>`

## find
- Searches for files and directories in a directory hierarchy.
- Usage: `find <path> -name <filename>`

## xargs
- Builds and executes command lines from standard input.
- Usage: `find . -name "*.txt" | xargs grep "pattern"`

## man
- Displays the manual for a command.
- Usage: `man <command>`

## history
- Displays the command history.
- Usage: `history`

## alias
- Creates shortcuts for commands.
- Usage: `alias ll='ls -la'`

## unalias
- Removes shortcuts for commands.
- Usage: `unalias ll`

## jobs
- Lists background jobs.
- Usage: `jobs`

## fg
- Brings a background job to the foreground.
- Usage: `fg <job_id>`

## bg
- Sends a job to the background.
- Usage: `bg <job_id>`

## screen
- Manages multiple terminal sessions.
- Usage: `screen`

## tmux
- A terminal multiplexer.
- Usage: `tmux`

