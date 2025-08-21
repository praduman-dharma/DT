# Compression Commands

This document covers essential commands for compressing and extracting files in Linux.

## zip
The `zip` command is used to package and compress files into a single ZIP archive.

### Syntax:
```bash
zip [options] [zipfile] [file1] [file2] ...
```

### Examples:
Creates a zip archive.
```bash
zip archive.zip file1.txt file2.txt    # Create archive.zip containing file1.txt and file2.txt
zip -r archive.zip directory/          # Create archive.zip containing all files in directory/
zip -r archive.zip .                   # Create archive.zip containing all files in current directory
zip -d archive.zip file1.txt           # Remove file1.txt from archive.zip
```

Extracts files from a zip archive.
```bash
unzip archive.zip                          # Extract files from archive.zip
unzip -d /path/to/destination archive.zip  # Extract files to a specific directory
```

There are some other similar tools like zip, its called gunzip, gzip.

## gzip
The `gzip` command is used to compress files using the GNU zip algorithm.

### Syntax:
```bash
gzip [options] [file]
```

### Examples:
```bash
gzip file.txt               # Compress file.txt to file.txt.gz
gzip -d file.txt.gz         # Decompress file.txt.gz to file.txt
```

## bzip2
The `bzip2` command is used to compress files using the Burrows-Wheeler block sorting text compression algorithm.

### Syntax:
```bash
bzip2 [options] [file]
```

### Examples:
```bash
bzip2 file.txt              # Compress file.txt to file.txt.bz2
bzip2 -d file.txt.bz2       # Decompress file.txt.bz2 to file.txt
```

## tar
The `tar` command is used to create and manipulate archive files.

### Syntax:
```bash
tar [options] [archive] [file1] [file2] ...
```

### Examples:
```bash
tar -cvf archive.tar file1.txt file2.txt    # Create archive.tar containing file1.txt and file2.txt
tar -cvzf archive.tar.gz directory/         # Create archive.tar.gz containing all files in directory/
tar -xvf archive.tar                        # Extract files from archive.tar
```
