# Conceptive_CustomCache

This Magento 2 module defines a **custom cache type** for storing and managing specific data outside the default Magento cache types. Useful for optimizing performance or storing custom data with controlled lifetime.

---

## 🗂️ Module Structure

```

app/code/Conceptive/CustomCache/
├── etc/
│   └── cache.xml
├── Model/
│   ├── Cache/
│   │   └── Type/CacheType.php
│   └── OperateCustomCache.php

````

---

## ⚙️ Functionality

### 1. **Custom Cache Type**

- Defined in `etc/cache.xml`
- Cache type name: `conceptivecustomcache`
- Cache identifier: `conceptive_custom_cache`
- Cache tag: `CONCEPTIVE_CUSTOM_CACHE`
- Registered for management under **System > Cache Management**

### 2. **OperateCustomCache Class**

A helper service for working with the custom cache:
- `saveCache($data)` – Save serialized data to the custom cache.
- `getCache()` – Retrieve and unserialize cached data.
- `invalidateCache()` – Mark this cache type as invalid.
- `cleanCache()` – Clean cache entries for this type.

---

## ✅ Usage Example

Inject `\Conceptive\CustomCache\Model\OperateCustomCache` in any class and use:

```php
$customCache->saveCache(['key' => 'value']);
$data = $customCache->getCache();
$customCache->invalidateCache();
$customCache->cleanCache();
````

---

## 🧼 Cache Management Commands

After installing the module, manage your custom cache using Magento CLI:

```bash
php bin/magento cache:status
php bin/magento cache:clean conceptivecustomcache
php bin/magento cache:flush
```

---

## 📄 References

* [Adobe Dev Docs – Custom Cache Type](https://developer.adobe.com/commerce/php/development/cache/partial/cache-type/)
* [Webkul Blog – Create Custom Cache Type](https://webkul.com/blog/how-to-create-a-custom-cache-type-in-magento/)

---
