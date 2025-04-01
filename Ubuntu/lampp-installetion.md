# LAMP Installation Guide

Follow the link for detailed instructions: [Magefan Blog - Install Local LAMP Server for Ubuntu](https://magefan.com/blog/install-local-lamp-server-for-ubuntu)

## Step-by-Step Guide

### Step 1: Open Terminal
- Press `Ctrl + Alt + T` to open the terminal.

### Step 2: Switch to Superuser
- Run the following command:
  ```bash
  sudo su
  ```
- Enter your Ubuntu password when prompted.

### Step 3: Install Apache, MySQL, and PHP

1. **Update package information**:
   ```bash
   sudo apt update
   ```

2. **Install Apache 2 web server**:
   ```bash
   sudo apt install apache2
   ```

3. **Install MySQL server**:
   ```bash
   sudo apt install mysql-server
   ```

   After installation, run the following command to configure MySQL:
   ```bash
   mysql -uroot
   ```

   Then, run the following commands to create a new user or update the root password:

   - To create a new user:
     ```sql
     CREATE USER 'phpmyadmin'@'localhost' IDENTIFIED BY '<New-Password-Here>';
     ```

   - Or, update the root password:
     ```sql
     ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '';
     ```

   - Grant privileges:
     ```sql
     GRANT ALL PRIVILEGES ON *.* TO 'phpmyadmin'@'localhost' WITH GRANT OPTION;
     FLUSH PRIVILEGES;
     exit
     ```

### Step 4: Install PHP 7.4 and Required Libraries

1. Install necessary dependencies:
   ```bash
   sudo apt-get install software-properties-common
   sudo add-apt-repository ppa:ondrej/php
   sudo apt-get update
   ```

2. Install PHP 7.4 along with required libraries for modern platforms like Magento 2:
   ```bash
   sudo apt install php7.4 libapache2-mod-php7.4 php7.4-curl php7.4-intl php7.4-zip php7.4-soap php7.4-xml php7.4-gd php7.4-mbstring php7.4-bcmath php7.4-common php7.4-xml php7.4-mysqli
   ```

3. Disable old PHP version:
   ```bash
   sudo a2dismod php7.2
   ```

4. Enable the new PHP version:
   ```bash
   sudo a2enmod php7.4
   ```

5. To change PHP versions, use the following command:
   ```bash
   sudo update-alternatives --config php
   ```

---

## Installing phpMyAdmin

For detailed instructions on installing phpMyAdmin, refer to this link: [How to Install phpMyAdmin](https://magefan.com/blog/how-to-install-phpmyadmin)

### Common Errors and Solutions

1. **Error: `This page isn’t working. localhost is currently unable to handle this request.` (HTTP ERROR 500)**

   - **Check server logs**:
     ```bash
     cat /var/log/apache2/error.log
     ```

   - **Fix `mb_strpos()` error**:
     - The `mb_strpos` function is part of the `mbstring` extension. Install it with the following command:
       ```bash
       sudo apt install php-mbstring
       ```

   - **Fix MySQL login issue**:
     - Create a new user or update the password:
       ```bash
       mysql -uroot
       ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';
       exit
       ```

2. **Error: `PHP 7.2.5+ is required`**

   - **Solution**: Run these commands:
     ```bash
     sudo apt install software-properties-common
     sudo add-apt-repository ppa:ondrej/php
     sudo apt-get update
     sudo service apache2 restart
     ```

3. **Error: `Login without a password is forbidden by configuration (see AllowNoPassword)`**

   - **Solution**:
     1. Navigate to the phpMyAdmin configuration directory:
        ```bash
        cd /etc/phpmyadmin/
        ```

     2. Edit the `config.inc.php` file:
        ```bash
        sudo nano config.inc.php
        ```

     - Save the file after making changes (Ctrl + X, then Enter).

4. **Error: `mysqli::real_connect(): The server requested authentication method unknown to the client [caching_sha2_password]`**

   - **Solution**:
     1. Add the following line in `/etc/mysql/my.cnf`:
        ```ini
        [mysqld]
        default-authentication-plugin=mysql_native_password
        ```

     2. Run the command:
        ```bash
        ALTER USER 'root1'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root1';
        ```

5. **Error: `The configuration file now needs a secret passphrase (blowfish_secret)`**

   - **Solution**: Open `/usr/share/phpmyadmin/config.inc.php` and replace the following line with a randomly generated string of at least 32 characters:
     ```php
     $cfg['blowfish_secret'] = 'P5DS+radU0TOqI7HX$cH!eb3zwnDDoDr'; /* YOU MUST FILL IN THIS FOR COOKIE AUTH! */
     ```

     - If the file is missing, create it by copying `config.sample.inc.php`.

6. **Error: `The $cfg['TempDir'] (/usr/share/phpmyadmin/tmp/) is not accessible.`**

   - **Solution**: Add the following line in the `config.inc.php` file:
     ```php
     $cfg['TempDir'] = '/tmp';
     ```

---

## Check Apache2 Status

To check if Apache2 is working correctly, use the following command:
```bash
sudo systemctl status apache2
```

If Apache2 is not working, reinstall it with the following steps:

1. Remove Apache2:
   ```bash
   sudo apt-get --purge remove apache2
   sudo apt-get autoremove
   ```

2. Install Apache2:
   ```bash
   sudo apt-get install apache2
   sudo ufw allow 'Apache'
   ```

3. Restart Apache2:
   ```bash
   sudo service apache2 restart
   ```

---

## How to Install Elasticsearch

For detailed instructions on installing Elasticsearch, refer to this [guide](https://digitalstartup.co.uk/t/how-to-install-and-setup-elasticsearch-for-magento-2-ubuntu/841).
