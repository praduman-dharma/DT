# Conceptive_CustomIndexer

This module demonstrates how to create a **custom indexer** in Magento 2.

## 📌 What is a Custom Indexer?

A custom indexer allows you to **pre-process data** and store the results for faster access. Magento supports indexers to optimize data such as product listings, category sorting, and more.

---

## 📁 Important Files

### `etc/indexer.xml`

- Declares custom indexers.
- Each `<indexer>` element must include:
  - `id`: Unique indexer ID
  - `view_id`: Links to `mview.xml`
  - `class`: Handler class (implements indexer logic)

```xml
<indexer id="conceptive_custom_indexer"
         view_id="conceptive_custom_indexer"
         class="Conceptive\CustomIndexer\Model\Indexer\Indexer">
    <title translate="true">Custom Indexer</title>
    <description translate="true">Custom Indexer</description>
</indexer>
````

---

### `etc/mview.xml`

* Enables **"Update on Schedule"** (real-time indexing).
* Subscribes to database tables for changes.

```xml
<view id="conceptive_custom_indexer"
      class="Conceptive\CustomIndexer\Model\Indexer\Indexer"
      group="indexer">
    <subscriptions>
        <table name="catalog_product_entity" entity_column="entity_id" />
    </subscriptions>
</view>
```

---

## 🧠 Indexer Class Methods

Each indexer class must implement:

```php
\Magento\Framework\Indexer\ActionInterface
\Magento\Framework\Mview\ActionInterface
```

This requires the following methods:

### `execute($ids)`

* Triggered by **Mview** when subscribed table rows are updated.
* Processes the provided entity IDs.

### `executeFull()`

* Reindexes **all data**.
* Used during manual reindex (e.g. CLI or admin reindex action).

### `executeList(array $ids)`

* Reindexes a **batch of IDs**.
* Useful for mass operations (like bulk updates).

### `executeRow($id)`

* Reindexes a **single entity**.
* Useful for plugin or observer-based updates.

---

## ✅ Summary

| File          | Purpose                                   |
| ------------- | ----------------------------------------- |
| `indexer.xml` | Declares indexer, links to handler class  |
| `mview.xml`   | Enables real-time updates via table watch |
| `Indexer.php` | Contains reindex logic (full, row, list)  |

---

## 📚 References

* [Magento DevDocs – Custom Indexers](https://developer.adobe.com/commerce/php/development/components/indexing/custom-indexer/)
* [Webkul – Custom Indexer Tutorial](https://webkul.com/blog/how-to-create-custom-indexer-in-magento/)

---
