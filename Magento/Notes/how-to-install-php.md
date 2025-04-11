# How to Install PHP (Ubuntu/Linux)

## Step 1: Add PHP Repository

```bash
sudo apt-get install software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
```

---

## Step 2: Install PHP and Required Extensions

Install PHP 7.4 and common extensions:

```bash
sudo apt install php7.4 libapache2-mod-php7.4 php7.4-curl php7.4-intl php7.4-zip php7.4-soap php7.4-xml php7.4-gd php7.4-mbstring php7.4-bcmath php7.4-common php7.4-mysqli
```

> 🔄 **Note:** You can replace `7.4` with any desired PHP version (e.g., `8.1`). Example for PHP 8.1:

```bash
sudo apt install php8.1 libapache2-mod-php8.1 php8.1-curl php8.1-intl php8.1-zip php8.1-soap php8.1-xml php8.1-gd php8.1-mbstring php8.1-bcmath php8.1-common php8.1-mysqli
```

---

## Step 3: Switch Between PHP Versions

If you have multiple PHP versions installed, follow these steps to switch:

### Disable current PHP version:

```bash
sudo a2dismod php7.4
```

### Enable new PHP version:

```bash
sudo a2enmod php8.1
```

---

## Step 4: Update PHP CLI Version

To update the CLI (Command Line Interface) version of PHP:

```bash
sudo update-alternatives --config php
```

- This command will list installed PHP versions.
- Enter the selection number of the version you want to use and press Enter.

Then, restart Apache:

```bash
sudo systemctl restart apache2
```

If you're using Elasticsearch locally and want to restart it as well:

```bash
sudo service elasticsearch restart
```

---

## 🔁 Summary: Commands to Change PHP Version

```bash
# Switch from PHP 8.1 to PHP 7.4
sudo a2dismod php8.1
sudo a2enmod php7.4

# Switch from PHP 7.4 to PHP 8.1
sudo a2dismod php7.4
sudo a2enmod php8.1

# Update CLI version
sudo update-alternatives --config php

# Restart Apache
sudo systemctl restart apache2
```