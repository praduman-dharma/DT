### **Magento 2: Use of Patch Files**

Patch files in Magento 2 are used to modify code without directly editing core files. They are primarily used for:

* **Fixing bugs** in Magento core or third-party modules.
* **Applying security patches**.
* **Modifying vendor code** without overriding.

---

## **Types of Patch Files in Magento 2**

1. **Composer Patch** (Recommended)
2. **Git Patch** (For local development)
3. **Setup Patch Scripts** (For updating the database)
4. **Patch for Vendor Files** (Using `cweagans/composer-patches`)

---

## **1. Using Composer Patch (Recommended)**

Magento 2 supports applying patches via Composer using `cweagans/composer-patches`.

### **Steps to Apply a Patch Using Composer**

#### **Step 1: Install the Patch Plugin**

Run the following command:

```sh
composer require cweagans/composer-patches
```

#### **Step 2: Create a `patches/composer-patches` Directory**

```sh
mkdir -p patches/composer-patches
```

#### **Step 3: Create a Patch File**

Create a `.patch` file inside `patches/composer-patches/` directory.

Example: `patches/composer-patches/fix-product-listing.patch`

```diff
--- vendor/magento/module-catalog/Block/Product/ListProduct.php	2024-01-01 10:00:00.000000000 +0000
+++ vendor/magento/module-catalog/Block/Product/ListProduct.php	2024-01-01 10:00:00.000000000 +0000
@@ -50,7 +50,7 @@
      * Modify product listing logic
      */
     public function getLoadedProductCollection()
     {
-        return $this->getProductCollection();
+        return $this->getModifiedProductCollection();
     }
```

#### **Step 4: Register the Patch in `composer.json`**

Edit your `composer.json` and add the patch under `"extra"`:

```json
"extra": {
    "patches": {
        "magento/module-catalog": {
            "Fix Product Listing Issue": "patches/composer-patches/fix-product-listing.patch"
        }
    }
}
```

#### **Step 5: Apply the Patch**

Run:

```sh
composer install
```

or

```sh
composer update --lock
```

---

## **2. Creating and Applying a Git Patch (For Local Development)**

If you have local changes and want to apply them as a patch:

### **Step 1: Create a Patch**

Navigate to the Magento root directory and run:

```sh
git diff > my-fix.patch
```

### **Step 2: Apply the Patch**

```sh
patch -p1 < my-fix.patch
```

---

## **3. Using Setup Patch Scripts (For Database Changes)**

Magento introduced **Data and Schema Patch Classes** as a replacement for `InstallData`, `UpgradeData`, etc.

### **Example: Creating a Schema Patch**

This adds a new column to the `customer_entity` table.

Create a file:
`app/code/Conceptive/Customer/Setup/Patch/Schema/AddCustomColumn.php`

```php
<?php
namespace Conceptive\Customer\Setup\Patch\Schema;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\DB\Ddl\Table;

class AddCustomColumn implements SchemaPatchInterface
{
    private $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $this->moduleDataSetup->getConnection()->addColumn(
            $this->moduleDataSetup->getTable('customer_entity'),
            'custom_column',
            [
                'type' => Table::TYPE_TEXT,
                'length' => 255,
                'nullable' => true,
                'comment' => 'Custom Column'
            ]
        );

        $this->moduleDataSetup->endSetup();
    }

    public static function getDependencies() { return []; }
    public function getAliases() { return []; }
}
```

#### **Run the Patch:**

```sh
bin/magento setup:upgrade
```

---

## **4. Patching Vendor Files Without Overriding**

To apply a **patch to vendor files** without modifying them directly:

1. Place the patch file in `patches/vendor/module-name/`
2. Register it in `composer.json` under `"extra": { "patches": ... }`
3. Run `composer install` to apply the patch

---

## **Conclusion**

* **Use Composer Patches** for Magento core & third-party modules.
* **Use Git Patches** for local development fixes.
* **Use Setup Patch Scripts** for **database changes**.
* **Use Vendor Patches** to modify third-party extensions **without overriding**.

