# Most Used Commands

## PHP Version Management

```bash
# Disable old version and enable new version
sudo a2dismod php8.1
sudo a2enmod php7.4

sudo a2dismod php7.4
sudo a2enmod php8.1

sudo a2dismod php8.1
sudo a2enmod php8.3

sudo a2dismod php8.3
sudo a2enmod php8.1

# Additional PHP commands
sudo a2dismod php8.2
sudo update-alternatives --config php
sudo systemctl restart apache2
sudo service elasticsearch restart
```

## File Permissions

```bash
sudo chmod -R 777 var/* var/cache/* pub/* generated/*
sudo chmod -R 777 var/ var/cache/ pub/ generated/
```

## Cache Clear Commands

```bash
# Full cache clear
sudo rm -rf var/cache/ var/generation/ var/page_cache/ generated/metadata generated/code pub/static/* var/view_preprocessed/*

# Alternative cache clear commands
1. sudo rm -rf var/cache/ var/generation/ var/page_cache/ generated/metadata generated/code
2. sudo rm -rf pub/static/*
3. sudo rm -rf var/view_preprocessed/*
4. sudo rm -rf var/cache/ var/page_cache

# Frontend specific cache
sudo rm -rf pub/static/frontend/*
sudo rm -rf var/view_preprocessed/*
sudo rm -rf generated/metadata generated/code
```

## Static Content Deploy

```bash
sudo bin/magento setup:static-content:deploy -l en_US -l ar_SA -a frontend -t Vendor/theme -t Vendor/theme_rtl -f
```

# Linux Basic Commands

## User Management

```bash
# Switch user
su - demo_user

# Switch to root
sudo su

# Change ownership
sudo chown -R demo_user /var/www/html/magento/
```

## Directory Operations

```bash
# Create directory
mkdir DemoFolder
mkdir -p DemoFolder/SubFolder

# Rename directory
mv /home/user/oldname /home/user/newname
mv old-folder-name new-folder-name

# Move directory
mv /var/folder /var/www/html/
mv -t <destination> <src1> <src2>
mv /home/apache2/www/html/ ..

# Copy directory
cp -r /path/to/directory /path/to/location/new-name
cp -r test test-new

# Delete directory
rm -rf directoryname
```

## File Operations

```bash
# Copy file
cp DemoFile.pdf /path/to/destination/

# Delete file
unlink filename
rm filename
```

## Archive Operations

```bash
# Create zip
zip -r archive_name.zip folder_name/
zip archive_name.zip file1.txt file2.txt
zip -r archive_name.zip folder_name -x "*.log"
zip -r archive_name.zip folder1/ folder2/

# Extract zip
unzip my_archive.zip
unzip my_archive.zip -d /path/to/destination/
unzip -l my_archive.zip
unzip my_archive.zip file1.txt file2.txt
unzip -o my_archive.zip
unzip -n my_archive.zip
```

## Search Operations

```bash
grep -ir "keyword" directory_name
grep -rnw 'vendor/' -e '#ff5501' --include \*.less
grep -rnw 'vendor/' -e '@color-orange-red1' --include \*.less
grep -r "Vendor_Module" --include="config.php" .

# Find files
find /path/to/magento/root -type f -name "product_form.xml"
find . -type f -name "swatch-renderer.js"
find /path/to/search -type f -regex '.*\(bkp\|bk\|backup\|copy\|old\|bak\|tmp\).*'
find /var/www/html -name "product_listing.xml"
find /var/www/html -iname "product_listing.xml"
```

## File Content Operations

```bash
# View file content
tail -n 100 <file path>
tail -f -n 100 <file path>
tail -f -n 100 var/log/system.log
tail -n 100 var/log/cron.log | grep "DemoCompany"
tail -n 100 user.log | grep "demo@example.com"

# Empty file content
> filename
> system.log
```

## Network Operations

```bash
# Download files
wget http://example.com/path/to/file.zip
wget --mirror --convert-links https://demo.example.com/index.html
wget --mirror --convert-links --wait=2 https://test.example.com/
```

## Process Management

```bash
# Kill process
sudo kill -9 59799
ps -a  # Check process IDs
```

# Service Management

## Apache

```bash
sudo service apache2 start
sudo service apache2 restart
sudo service apache2 status

# Alternative commands
sudo systemctl start apache2
sudo systemctl restart apache2
sudo systemctl status apache2
```

## MySQL

```bash
sudo service mysql start
sudo service mysql restart
sudo service mysql status

# Connect to MySQL
sudo su
mysql

# Or
mysql -u username -ppassword -h hostname database_name
mysql -u demo_user -p

# Database operations
show databases;
use demo_database;

# Import/Export
source /home/demo_user/Downloads/demo_database.sql
mysqldump demo_db > demo_db_backup.sql
mysqldump -h localhost -u root -p demo_db > demo_db_backup.sql

# Data manipulation
UPDATE MyTable SET StringColumn = REPLACE(StringColumn, 'SearchFor', 'ReplaceWith') WHERE SomeColumn LIKE '%PATTERN%'
```

## Elasticsearch

```bash
sudo service elasticsearch restart
sudo systemctl restart elasticsearch
```

## Nginx

```bash
sudo service nginx restart
sudo systemctl restart nginx
```

## Varnish

```bash
sudo systemctl restart varnish
```

# Git Commands

```bash
# Undo changes
git restore filepath
git restore .
git checkout .
git checkout -f
git rm -r --cached 

# Commit operations
git reset HEAD~1
git cherry-pick 7e993fb2d --no-commit
git revert -n 589bf5124
git revert -n 93303edee

# Search logs
git log --grep="search_term"
```

# Magento 2 Commands

## Admin User

```bash
sudo bin/magento admin:user:create --admin-user=admin --admin-password=admin123 --admin-email=admin@example.com --admin-firstname=Admin --admin-lastname=User
```

## Configuration

```bash
# Minify CSS/JS
php bin/magento config:show dev/js/merge_files 1
php bin/magento config:set dev/js/minify_files 1
php bin/magento config:set dev/css/minify_files 1
php bin/magento config:set dev/css/merge_css_files 1
php bin/magento config:set csp/mode/storefront_checkout_index_index/report_only 1
```

## Internationalization

```bash
# Generate i18n CSV
bin/magento i18n:collect-phrases -o app/code/Vendor/Module/i18n/en_US.csv app/code/Vendor/Module
bin/magento i18n:collect-phrases -o app/i18n/en_US.csv .
```

## Cron

```bash
php bin/magento cron:run --group="default"
```

## Module Management

```bash
# List modules
composer show -i
composer show | grep magento/module-tax
composer show -a vendor_name
composer show -a demo_vendor/*
```

## Development Tools

```bash
# Query logging
bin/magento dev:query-log:enable
bin/magento dev:query-log:disable
bin/magento dev:profiler:enable
bin/magento dev:profiler:disable
```

## File Permissions

```bash
# Set proper permissions
find . -type d -exec chmod 755 {} \;
find . -type f -exec chmod 644 {} \;
chmod -R 775 var/ pub/static/ pub/media/ generated/
sudo chmod 777 -R var/ generated/ pub/
```

## UI Components

```bash
# Fix loading grids
DELETE FROM ui_bookmark WHERE user_id='3' AND namespace='product_listing';
DELETE FROM ui_bookmark WHERE user_id='3' AND namespace='product_attributes_grid';
```

## Logging

```bash
# Custom logging
$writer = new \Zend_Log_Writer_Stream(BP . '/var/log/exception.log');
$logger = new \Zend_Log();
$logger->addWriter($writer);
$logger->info("log message");
```

## Export Process

```bash
bin/magento queue:consumers:start exportProcessor
```

## Elasticsearch Issues

```bash
curl -XPUT -H "Content-Type: application/json" http://localhost:9200/_cluster/settings -d '{ "transient": { "cluster.routing.allocation.disk.threshold_enabled": false } }'
curl -XPUT -H "Content-Type: application/json" http://localhost:9200/_all/_settings -d '{"index.blocks.read_only_allow_delete": null}'
sudo bin/magento indexer:reindex catalogsearch_fulltext
```

## Maintenance Mode

```bash
bin/magento maintenance:enable
bin/magento maintenance:disable
```

## Base URL Configuration

```bash
sudo php bin/magento setup:store-config:set --base-url="http://example.com/magento/"
sudo bin/magento setup:store-config:set --base-url-secure="https://example.com/magento/"
sudo bin/magento setup:store-config:set --base-url-unsecure="http://example.com/magento/"
```

## VS Code Cursor Issue

Press the Insert key (located before PrtScr button on keyboard) to toggle cursor mode.
