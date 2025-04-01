# How to Install PHP

## Step 1: Install Required Packages

1. Install the required software properties:

    ```sh
    sudo apt-get install software-properties-common
    ```

2. Add the PHP repository:

    ```sh
    sudo add-apt-repository ppa:ondrej/php
    ```

3. Update the package list:

    ```sh
    sudo apt-get update
    ```

## Step 2: Install PHP and Required Extensions

To install PHP with necessary extensions, use the following command:

```sh
sudo apt install php7.4 libapache2-mod-php7.4 php7.4-curl php7.4-intl php7.4-zip php7.4-soap php7.4-xml php7.4-gd php7.4-mbstring php7.4-bcmath php7.4-common php7.4-xml php7.4-mysqli
```

### Note:
- Replace `7.4` with your desired PHP version.
- For example, to install PHP 8.1, use:

    ```sh
    sudo apt install php8.1 libapache2-mod-php8.1 php8.1-curl php8.1-intl php8.1-zip php8.1-soap php8.1-xml php8.1-gd php8.1-mbstring php8.1-bcmath php8.1-common php8.1-xml php8.1-mysqli
    ```

## Step 3: Change PHP Version (if needed)

After a successful installation, follow these steps to switch PHP versions:

### 1. Disable the old PHP version:

```sh
sudo a2dismod php7.4
```

### 2. Enable the new PHP version:

```sh
sudo a2enmod php8.1
```

### 3. If PHP version is not updated after enabling the new version, run the following command:

```sh
sudo update-alternatives --config php
```

This command will display a list of installed PHP versions with a unique ID.

### 4. Select the unique ID corresponding to the desired PHP version and press Enter.

### 5. Restart Apache to apply changes:

```sh
sudo systemctl restart apache2
```

---

## Change PHP Version (Switch Between Versions)

If you need to switch PHP versions, follow these steps:

### 1. Disable the old PHP version:

```sh
sudo a2dismod php8.1      ## Disable PHP 8.1 (old version)
```

### 2. Enable the new PHP version:

```sh
sudo a2enmod php7.4       ## Enable PHP 7.4 (new version)
```

### 3. If switching from PHP 7.4 to PHP 8.1 (or vice versa), run:

```sh
sudo a2dismod php7.4      ## Disable PHP 7.4 (old version)
sudo a2enmod php8.1       ## Enable PHP 8.1 (new version)
```

### 4. Set the default PHP version:

```sh
sudo update-alternatives --config php
```

### 5. Restart Apache and Elasticsearch services:

```sh
sudo systemctl restart apache2
sudo service elasticsearch restart
```

---

**Note:** Replace `7.4` and `8.1` with the actual PHP versions as per your project requirements.
