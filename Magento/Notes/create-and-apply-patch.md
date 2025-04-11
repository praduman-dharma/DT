# Create and Apply Patch in Git

## 1. Stage the File You Want to Modify

Use `-f` to force add files from `vendor/`:

```sh
git add vendor/magento/module-customer/Block/CustomerData.php -f
```

## 2. Make Your Changes

Edit the file:

```sh
vendor/magento/module-customer/Block/CustomerData.php
```

## 3. Create the Patch File

Generate the patch using `git diff`:

```sh
git diff vendor/magento/module-customer/Block/CustomerData.php > your-patch-name.patch
```

This will create `your-patch-name.patch` in the root directory.

## 4. Revert Changes from the Original File

Undo your changes manually (e.g., using `Ctrl + Z` in your editor or by resetting the file):

```sh
vendor/magento/module-customer/Block/CustomerData.php
```

## 5. Apply the Patch

Use the following command to apply the patch:

```sh
git apply your-patch-name.patch
```

---

## ✅ Alternative Method to Apply Patch (Using `patch` Command)

```sh
patch -p1 < your-patch-name.patch
```

**Example:**

```sh
patch -p1 < di-info-command-fix.patch
```

> The `-p1` option strips the first part of the file path (e.g., `a/` or `b/`).