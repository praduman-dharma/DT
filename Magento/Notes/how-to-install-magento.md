# How to Install Magento 2 on Windows with Elasticsearch

**Reference:**  
[Install Magento 2.4 in Windows 10 using Composer and Command Line with Elasticsearch](https://www.truecodex.com/course/magento-2/install-magento-24-in-windows-10-using-composer-and-command-line-with-elasticsearch)

**Composer Auth File Path:**  
`C:/Users/MAIN/AppData/Roaming/Composer/auth.json`

---

## PHP Configuration

Update your `php.ini` file with the following values:

```ini
max_execution_time = 18000
max_input_time = 6000
memory_limit = 1024M
```

### Enable Required PHP Extensions

Uncomment the following lines in your `php.ini` (remove the `;` at the beginning):

```ini
extension=gd2
extension=intl
extension=soap
extension=sockets
extension=sodium
extension=xsl
```

---

## Step 1: Install Magento via Composer

Use your Magento authentication keys (Public/Private) as username and password when prompted.

### Basic Installation

```bash
composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition=2.4.4
```

### Install Magento into a specific folder (e.g., `magento244`)

```bash
composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition=2.4.4 magento244
```

You can also install a different version like:

```bash
composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition=2.3.5-p2
```

---

## Step 2: Download and Run Elasticsearch

Download Elasticsearch and run it from:

```
www > elasticsearch > bin > elasticsearch.bat (Run as Administrator)
```

If Elasticsearch is not set up properly during Magento install, run:

```bash
php bin/magento config:set catalog/search/elasticsearch7_server_hostname localhost
```

---

## Step 3: Install Magento (Command Line)

If you've downloaded a ZIP package, extract it in the `www` directory first.

If you're using Magento 2.4 or later, you may need to patch the following core file for local installation:

### File: `vendor\magento\framework\Image\Adapter\Gd2.php`

**Change this method:**

```php
private function validateURLScheme(string $filename): bool
{
    $allowed_schemes = ['ftp', 'ftps', 'http', 'https'];
    $url = parse_url($filename);
    if ($url && isset($url['scheme']) && !in_array($url['scheme'], $allowed_schemes)) {
        return false;
    }

    return true;
}
```

**To this:**

```php
private function validateURLScheme(string $filename): bool
{
    $allowed_schemes = ['ftp', 'ftps', 'http', 'https'];
    $url = parse_url($filename);
    if ($url && isset($url['scheme']) && !in_array($url['scheme'], $allowed_schemes) && !file_exists($filename)) {
        return false;
    }

    return true;
}
```

---

## Step 4: Run Setup Install Command

### Magento 2.4.4 Installation Example:

```bash
php -d memory_limit=6G bin/magento setup:install \
--base-url=http://localhost/magento244/pub/ \
--db-host=localhost \
--db-name=magento244 \
--db-user=root \
--db-password= \
--admin-firstname=admin \
--admin-lastname=admin \
--admin-email=user@example.com \
--admin-user=admin \
--admin-password=admin@123 \
--language=en_US \
--currency=USD \
--timezone=America/Chicago \
--use-rewrites=1 \
--backend-frontname="admin" \
--search-engine=elasticsearch7 \
--elasticsearch-host=localhost \
--elasticsearch-port=9200
```

### Magento 2.3.7 Installation Example:

```bash
php -d memory_limit=6G bin/magento setup:install \
--base-url=http://localhost/magento237/ \
--db-host=localhost \
--db-name=magento237 \
--db-user=root \
--db-password= \
--admin-firstname=admin \
--admin-lastname=admin \
--admin-email=user@example.com \
--admin-user=admin \
--admin-password=admin@123 \
--language=en_US \
--currency=USD \
--timezone=America/Chicago \
--use-rewrites=1 \
--backend-frontname="admin"
```

---

## Step 5: Post-Installation Commands

Run the following after setup:

```bash
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
php bin/magento indexer:reindex
php bin/magento cache:flush
```

---
