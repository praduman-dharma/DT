# Networking Commands

## ping
- Tests connectivity to another host.
- Usage: `ping <hostname_or_ip>`

## netstat
- Displays network connections, routing tables, and interface statistics.
- Usage: `netstat -tuln`

## ifconfig
- Displays all network interfaces and their configurations.
- Usage: `ifconfig`

## traceroute
- Traces the route packets take to a network host.
- Usage: `traceroute <hostname_or_ip>`

It Will display the path packets take to reach the destination. Means it will show each host that is being connected while connecting the destination.

### Example
```bash
traceroute youtube.com
```

## tracepath
- Similar to traceroute, but uses a different method to discover the path packets take to a network host.
- Usage: `tracepath <hostname_or_ip>`

## traceroute vs tracepath
- `traceroute` and `tracepath` are both used to trace the route packets take to a network host.
- `traceroute` typically uses ICMP Echo Request packets, while `tracepath` uses UDP packets.
- `tracepath` can also discover the MTU (Maximum Transmission Unit) of the path, which can be useful for diagnosing network issues.

## mtr - my traceroute
- Combines the functionality of `traceroute` and `ping` to provide a more comprehensive view of network performance.
- Usage: `mtr <hostname_or_ip>`

## nslookup
- Queries the DNS to obtain domain name or IP address mapping.
- Usage: `nslookup <hostname>`

## telnet
- Connects to a remote host using the Telnet protocol.
- Its same like nslookup and its just provide the port option.
- Usage: `telnet <hostname_or_ip> <port>`

- port 80 is equal to http and port 443 is equal to https.

## hostname
- Displays the current hostname of the system.
- Usage: `hostname`

- hosts can be viewed by: `cat /etc/hosts`

## ip
- A powerful tool for managing network interfaces, routing, and tunnels.
- Usage: `ip addr show` (to display IP addresses)

## iwconfig
- Displays or configures wireless network interfaces.
- Usage: `iwconfig`

## ss
- Displays information about network sockets.
- Its same like netstat.
- Usage: `ss`  or  `ss -tuln`

## arp - address resolution protocol
- Displays or modifies the ARP (Address Resolution Protocol) cache.
- Usage: `arp`  or  `arp -a`

## dig
- Queries DNS name servers for information about host addresses.
- Usage: `dig <hostname>`

## nc - netcat
- A versatile networking tool for reading from and writing to network connections.
- Usage: `nc <hostname_or_ip> <port>`

## whois
- Queries the WHOIS database for information about a domain name or IP address.
- It will give the registrant information, including the name, email, and address of the domain owner.
- Usage: `whois <domain_name_or_ip>`

## ifplugstatus
- Displays the status of network interfaces and whether they are connected.
- Usage: `ifplugstatus`



## curl
- Transfers data from or to a server using various protocols.
- It is also used to test API endpoints.
- Usage: `curl <url>`

### Examples
```bash
curl -X GET https://api.example.com/data
curl -X POST -d '{"key":"value"}' https://api.example.com/data
curl -X GET https://jsonplaceholder.typicode.com/todos/1 | jq     ## | jq is used to show it in pretty format
```

## wget
- Downloads files from the web.
- Usage: `wget <url>`

## iptables
- A user-space utility program that allows a system administrator to configure the IP packet filter rules of the Linux kernel firewall.
- Usage: `iptables -L`

### Examples
```bash
sudo iptables --list-rules      ## List all rules
```

## watch
- Executes a program periodically, showing output fullscreen.
- Usage: `watch <command>`

### Examples
```bash
watch top
watch -n 5 top           ## Refresh every 5 seconds
watch -n 5 ls -l
```

## nmap
- A network exploration tool and security/port scanner. It will also give the list of open server ports
- Usage: `nmap <hostname_or_ip>`

### Examples
```bash
nmap youtube.com
nmap -v youtube.com    ## Verbose output
```

## route
- Displays and modifies the IP routing table.
- Usage: `route`

## ssh
- Connects to a remote machine securely.
- Usage: `ssh <user>@<hostname_or_ip>`

## scp
- Securely copies files between hosts.
- Usage: `scp <local_file> <user>@<hostname_or_ip>:<remote_path>`

