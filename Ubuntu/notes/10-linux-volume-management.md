# Linux Volume Management

## lsblk
- Lists block devices.
- Usage: `lsblk`

## df -h
- Displays disk space usage.
- Usage: `df -h`

## LVM - Logical Volume Manager
- A device mapper framework that provides logical volume management for the Linux kernel.
- Usage: `lvcreate -L <size> -n <name> <vg_name>`

### Examples

#### Physical Volume
```bash

# Create a physical volume
pvcreate /dev/sdb1

# Display physical volumes
pvs

# Create a volume group
vgcreate myvg /dev/sdb1 /dev/sdb2

# Display volume groups
vgs

# Display physical volume details
pvdisplay

# Display volume group details
vgdisplay
```

#### Logical Volume
```bash
# Create a new logical volume
lvcreate -L 10G -n mylv myvg

# Extend a logical volume
lvextend -L +5G /dev/myvg/mylv

# Reduce a logical volume
lvreduce -L -5G /dev/myvg/mylv

# Remove a logical volume
lvremove /dev/myvg/mylv

# Display logical volume details
lvdisplay
```

## mkfs
- Creates a file system on a partition.
- Usage: `mkfs.<type> <device>`

### Examples
```bash
# Create an ext4 file system
mkfs.ext4 /dev/sdb1

# Create an ext4 file system
mkfs -t ext4 /dev/sdb1
```

## mount
- Mounts a file system.
- Usage: `mount <device> <mount_point>`

### Examples
```bash
# Mount a file system
mount /dev/sdb1 /mnt
```

## umount
- Unmounts a file system.
- Usage: `umount <mount_point>`

### Examples
```bash
# Unmount a file system
umount /mnt
```

## Resize2fs
- Resizes ext2/ext3/ext4 file systems.
- Usage: `resize2fs <device> <size>`

### Examples
```bash
# Resize a file system
resize2fs /dev/myvg/mylv 15G
```
