# Magento Upgrade Guide

## 🚀 Upgrade Magento Version

1. Enable maintenance mode:
   ```bash
   bin/magento maintenance:enable
   ```

2. Require the Magento Composer root update plugin:
   ```bash
   composer require magento/composer-root-update-plugin=~2.0 --no-update
   ```

3. Update composer dependencies:
   ```bash
   composer update --ignore-platform-reqs
   ```

4. Require the target Magento version:
   ```bash
   composer require-commerce magento/product-community-edition=2.4.7-p3 --no-update
   ```

5. Update again (ignore platform requirements):
   ```bash
   composer update --ignore-platform-reqs
   ```

6. Change PHP version (if required for the new Magento version).

7. Run Magento upgrade:
   ```bash
   bin/magento setup:upgrade
   ```

8. Deploy static content:
   ```bash
   bin/magento setup:static-content:deploy -f
   ```

9. Flush cache:
   ```bash
   bin/magento cache:flush
   ```

10. Compile dependency injection:
    ```bash
    bin/magento setup:di:compile
    ```

11. Reindex data:
    ```bash
    bin/magento indexer:reindex
    ```

12. Confirm upgraded version:
    ```bash
    bin/magento --version
    ```

13. Disable maintenance mode:
    ```bash
    bin/magento maintenance:disable
    ```

---

## 🐛 Fix: Commonn Errors

**Error:**
```
SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '207658' 
for key 'catalog_url_rewrite_product_category.PRIMARY'
```

**Source:** [Magento GitHub Issue #33770](https://github.com/magento/magento2/issues/33770)

**Fix:**
```sql
START TRANSACTION; 

CREATE TABLE catalog_url_rewrite_product_category_backup 
SELECT * FROM catalog_url_rewrite_product_category;

TRUNCATE TABLE catalog_url_rewrite_product_category;

INSERT INTO catalog_url_rewrite_product_category 
SELECT DISTINCT * FROM catalog_url_rewrite_product_category_backup;

COMMIT;
```

**Error:**
```
PHP Fatal error: Cannot declare class 
Dealerdirect\Composer\Plugin\Installers\PHPCodeSniffer\Plugin
```

**Fix:**
Clear Composer cache:
```bash
composer clear-cache
```

---

**Resolution:** Apply relevant patch or remove the conflicting plugin if unused.

---

## 🩹 Custom Patches

### Fix: Unable to Filter Orders by Date in Admin
```bash
patch -p1 < BUNDLE-3357-unable-to-filter-order-in-admin-by-date.patch
```

### Fix: `di:info` Command Issue
```bash
patch -p1 < di-info-command-fix.patch
```
