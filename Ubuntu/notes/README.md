> Reference: [Linux For DevOps In One Shot By TrainWithShubham](https://youtu.be/e01GGTKmtpc?si=Y8eL0omCzBHd7TTP)  
> This comprehensive YouTube video covers essential Linux concepts for DevOps, including commands, architecture, and practical examples. All notes in this folder are based on its content.

# Introduction to Linux
Linux is a family of open-source, Unix-like operating systems built around the Linux kernel, which was first released by Linus Torvalds on September 17, 1991. Linux is typically distributed as part of a package called a "distribution," which includes the kernel, system utilities, and application software.


## What is Linux OS?
Linux is an open-source operating system based on the Unix architecture. Renowned for its stability, security, and flexibility, Linux is widely used for servers, desktops, and embedded systems. Released under the GNU General Public License (GPL), Linux allows users to freely use, modify, and distribute the software. The Linux kernel manages hardware resources and provides essential services to applications. Popular Linux distributions include Ubuntu, Fedora, and CentOS, which combine the kernel with various tools and applications to create a complete operating environment.

While most users operate on Windows OS, the majority of applications and servers run on Linux—about 90% of servers worldwide use Linux. Unix, a commercial (paid) software, has significantly influenced the development of Linux and other operating systems. For example, macOS is based on Unix but is paid software, whereas Linux is free and open-source.


## Difference between Linux and Windows
- **Linux** is open-source, while **Windows** is commercial software developed by Microsoft.
- Linux is known for its stability, security, and flexibility; Windows is often criticized for its vulnerability to malware and viruses.
- Linux is commonly used in server environments; Windows is more prevalent on personal computers.
- Linux supports a wide range of hardware architectures; Windows is primarily designed for x86 and x86-64 architectures.


## Software remote location server tools?

- SSH (Secure Shell): A protocol for securely accessing remote servers.
- SCP (Secure Copy Protocol): A method for securely transferring files between hosts on a network.
- SFTP (Secure File Transfer Protocol): A secure version of FTP that uses SSH to encrypt data transfers.


## What are the kernel, Bootloader and shell?
- Kernel: The core component of an operating system that manages system resources and hardware communication. It acts as a bridge between applications and the hardware.
- Bootloader: A program that initializes the system and loads the operating system kernel into memory during the boot process.
- Shell: A user interface that allows users to interact with the operating system by executing commands. It can be command-line based (e.g., Bash) or graphical (e.g., GNOME Shell).


## Diagram: Bootloader, Kernel, Shell, and User/App

```
   +-------------+
   | Bootloader  |
   +-------------+
          |
          v
   +-------------+
   |   Kernel    |
   +-------------+
          |
          v
   +-------------+
   |   Shell     |
   +-------------+
          |
          v
   +-------------+
   | User/App    |
   +-------------+
```

**Flow:**
- Bootloader loads the Kernel.
- Kernel manages hardware and system resources.
- Shell provides an interface for the user to interact with the system.
- User/App interacts with the shell to use the system.


## Linux System Architecture

The Linux system architecture is organized into several layers, each responsible for specific functions. This layered approach provides modularity, security, and flexibility.

### Diagram: Linux System Architecture

```
+----------------------+
|    User/Application  |
+----------------------+
           |
           v
+----------------------+
|        Shell         |
+----------------------+
           |
           v
+----------------------+
|        Kernel        |
+----------------------+
           |
           v
+----------------------+
|      Hardware        |
+----------------------+
```

### Explanation
- **User/Application:** End users and software applications interact with the system through commands and programs.
- **Shell:** Acts as an interface between the user/application and the kernel. It interprets user commands and passes them to the kernel.
- **Kernel:** The core of the operating system. It manages hardware resources, system processes, memory, and device communication.
- **Hardware:** The physical components of the computer, such as CPU, memory, storage, and peripherals, which are managed by the kernel.


## Information about hardware?

Linux provides several commands to gather information about hardware resources and system usage. Here are some essential commands:

- `top`: Displays real-time information about system processes, CPU usage, memory usage, and more. Useful for monitoring system performance and identifying resource-intensive processes.
- `df -h`: Shows disk space usage for all mounted filesystems in a human-readable format (e.g., GB/MB). Helps you check available and used storage on your system.
- `free -h`: Displays information about system memory (RAM) usage in a human-readable format. Useful for monitoring available, used, and free memory.

### Key Hardware Components
- **CPU (Central Processing Unit):** The primary component that performs most of the processing inside the computer. Executes instructions from programs and manages data flow.
- **Memory (RAM):** Volatile memory that temporarily stores data and instructions currently in use, allowing for fast access and efficient multitasking.
- **Storage:** Permanent data storage devices, such as Hard Disk Drives (HDD), Solid State Drives (SSD), and others.
- **Motherboard:** The main circuit board connecting all components, including CPU, memory, storage, and peripherals.
- **Peripherals:** External devices like keyboards, mice, printers, and monitors that allow users to interact with the system.


## Linux file system?

The Linux file system is a hierarchical structure that organizes files and directories starting from the root directory (`/`). All files, directories, and devices are represented as part of this single tree.

### Key Features
- **Root Directory (`/`):** The top-level directory from which all other directories branch out.
- **Everything is a File:** In Linux, devices, processes, and system resources are accessed as files, making management and interaction consistent.
- **Standard Directories:**
    - `/bin`: Essential user binaries (commands)
    - `/boot`: Boot loader files
    - `/dev`: Device files
    - `/etc`: System configuration files
    - `/home`: User home directories
    - `/lib`: Essential shared libraries
    - `/media` and `/mnt`: Mount points for removable media
    - `/opt`: Optional application software packages
    - `/proc`: Virtual filesystem for kernel and process information
    - `/root`: Home directory for the root user
    - `/sbin`: System binaries
    - `/tmp`: Temporary files
    - `/usr`: User programs and data
    - `/var`: Variable files like logs and databases

### Diagram: Linux File System Hierarchy
```
/
|-- bin
|-- boot
|-- dev
|-- etc
|-- home
|-- lib
|-- media
|-- mnt
|-- opt
|-- proc
|-- root
|-- sbin
|-- tmp
|-- usr
|-- var
```

This structure helps keep the system organized, secure, and efficient. Each directory serves a specific purpose, making it easier to manage files and system resources.


## States of processes in Linux?

In Linux, every running program is a process, and each process can be in one of several states. These states help the operating system manage resources and scheduling.

### Common Process States
- **Running (R):** The process is currently being executed by the CPU.
- **Sleeping (S):** The process is waiting for an event or resource (e.g., input/output). Most processes spend much of their time in this state.
- **Stopped (T):** The process has been stopped, usually by a signal or user intervention (e.g., with `Ctrl+Z`).
- **Zombie (Z):** The process has finished execution but still has an entry in the process table. This occurs when the parent process has not yet read its exit status.
- **Waiting (D):** The process is in an uninterruptible sleep, usually waiting for I/O operations to complete.

### How to View Process States
You can use the `ps` or `top` commands to view the state of processes:
- `ps aux`: Lists all processes with their states and other details.
- `top`: Provides a real-time view of running processes and their states.

### Example Output
```
USER   PID  %CPU  %MEM  VSZ  RSS  TTY  STAT  START  TIME  COMMAND
root   1    0.0   0.1   1588 548  ?    Ss    10:00  0:01  init
user   123  0.2   1.0   2345 1234 pts/0 S    10:01  0:05  bash
user   456  0.0   0.5   1987 876  pts/0 T    10:02  0:00  vim
user   789  0.0   0.0   0    0    ?    Z     10:03  0:00  <defunct>
```

This information helps administrators and users monitor, troubleshoot, and manage system processes effectively.