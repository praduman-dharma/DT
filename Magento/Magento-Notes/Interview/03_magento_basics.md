# Magento 2 Key Concepts

## Cache Management and Its Uses

In Magento 2, cache management is essential for improving performance, reducing load times, and delivering a smooth shopping experience. Below is an overview of cache types and how to manage them effectively.

### 🔄 Difference Between `cache:clean` and `cache:flush`

#### `cache:clean`

* **What it does:**
  Removes **invalid (outdated)** cache entries from Magento's cache.
* **Scope:**
  Affects only Magento-specific cache types. Leaves other application or system-level cache data intact.
* **When to use:**
  After changes to Magento configurations, layout updates, module modifications, etc.
* **Key point:**
  Less aggressive and more targeted.

#### `cache:flush`

* **What it does:**
  Clears **all** cache data including Magento and any third-party applications sharing the same storage (Redis, Memcached, etc.).
* **Scope:**
  Empties the entire cache storage.
* **When to use:**
  When dealing with **cache corruption** or after switching cache backends.
* **Key point:**
  Use with caution, especially if sharing cache storage with other systems.

### ✅ Best Practices

* Use `cache:clean` for regular updates and development work.
* Use `cache:flush` only when absolutely necessary, such as during major config changes or cache corruption recovery.
* When using shared cache storage (e.g., Redis), avoid unnecessary flush operations to prevent affecting other apps.

---

## Index Management and Its Uses

Magento 2 indexing transforms data (products, categories, pricing, etc.) into optimized tables, improving performance and query efficiency.

* Keeps dynamic data **up-to-date** and **optimized**.
* Essential for fast and reliable **frontend experiences**.

---

## Version Constraints in composer.json

In **Magento 2**, when working with Composer (the dependency manager for PHP), you often see version constraints in the `composer.json` file that look like `^1.0`, `~1.2.3`, or `*`. These are **version constraints** that define **which versions of a package are allowed** during installation or updates.

Here’s what those flexible constraints mean:

### 1. `^1.0` (Caret Operator)

* **Allows non-breaking updates** (according to [Semantic Versioning](https://semver.org/)).
* Example: `^1.0` means:

  * Accept `>=1.0.0` and `<2.0.0`
* So if version `1.0.0` is installed, Composer can upgrade up to `1.x.x`, but not to `2.0.0`.

#### Special case:

* `^0.3` means `>=0.3.0` and `<0.4.0` (because `0.x` versions are considered unstable; only patch updates are allowed)


### 2. `~1.2.3` (Tilde Operator)

* **Allows the last specified digit to change** (i.e., patch updates), but **not the preceding one**.
* `~1.2.3` means:

  * Accept `>=1.2.3` and `<1.3.0`
* If you use `~1.2`, it means:

  * Accept `>=1.2.0` and `<2.0.0` (this allows minor updates)


### 3. `*` (Wildcard)

* **Matches any version**.
* Example: `1.2.*` means:

  * Accept any patch version under `1.2`, e.g., `1.2.0`, `1.2.5`, `1.2.99`
* `*` by itself means: any version is acceptable


### Summary Table:

| Constraint | Meaning          |
| ---------- | ---------------- |
| `^1.0.0`   | `>=1.0.0 <2.0.0` |
| `^0.3.0`   | `>=0.3.0 <0.4.0` |
| `~1.2.3`   | `>=1.2.3 <1.3.0` |
| `~1.2`     | `>=1.2.0 <2.0.0` |
| `1.2.*`    | `>=1.2.0 <1.3.0` |
| `*`        | Any version      |


These constraints help Magento 2 (and Composer in general) **maintain stability** while allowing **safe updates** to your dependencies.

---

## `composer.json` vs. `composer.lock`

### `composer.json`

* **Purpose:**
  Defines the required project dependencies and metadata.
* **Edited by:**
  Developers (manually).
* **Versioning:**
  Supports flexible constraints (e.g., `^1.0`, `~1.2.3`, `*`).
* **Effect:**
  Tells Composer **what you want** to install.

### `composer.lock`

* **Purpose:**
  Locks the exact versions of installed dependencies for consistent environments.
* **Edited by:**
  Automatically by Composer.
* **Content:**
  Includes resolved versions, sources, and checksums for all dependencies (including transitive).
* **Effect:**
  Ensures all devs/environments get the **same versions**.

### Why Both Are Needed

* `composer.json`: Allows flexible definition of desired packages.
* `composer.lock`: Ensures consistent installs across teams/environments.

### Composer Command Behavior

* `composer install`: Uses `composer.lock`. Reads composer.lock and installs locked versions.
* `composer update`: Updates dependencies based on `composer.json` and rewrites `composer.lock`.

---

## Hard Dependencies vs. Soft Dependencies

### Hard Dependency

* Defined in the `require` section.
* **Mandatory**: Module cannot function without the dependent module.

### Soft Dependency

* Defined in the `suggest` section.
* **Optional**: Module can function without the dependent module, but recommends it.

---

## `<sequence>` Tag in Magento 2

The `<sequence>` tag is used in a module’s `module.xml` to **control the load order**.

* Ensures one module loads **after** another.
* Affects configuration, view, and setup files.

---

## ACL (Access Control List)

Magento 2 Admin ACL enables **fine-grained role-based permissions**.

* Allows store owners to **define roles** for different admin users.
* Uses an **authentication system** to restrict backend access based on ACL rules.

---

## Add Custom Field on Checkout

1. **Add Column** to `quote` and `sales_order` tables:

   * Use `InstallData.php`, `UpgradeSchema.php`, or `db_schema.xml`.

2. **Display Field on Checkout Page**:

   * Modify `checkout_index_index.xml` or use a plugin on `Magento\Checkout\Block\Checkout\LayoutProcessor`.

3. **Save Field Data**:

   * Use the event `sales_model_service_quote_submit_before`.

---

## EAV (Entity-Attribute-Value) Model

Magento 2 uses EAV for **flexible data storage**, especially for entities like products and customers.

### Entity Types

* `customer`
* `customer_address`
* `catalog_category`
* `catalog_product`
* `order`
* `invoice`
* `creditmemo`
* `shipment`

### Structure

* Entity data stored in **main entity table**.
* Attribute definitions stored in `eav_attribute`.
* Values stored in **type-specific tables**:

  * `catalog_product_entity_varchar` (string)
  * `catalog_product_entity_int` (integer)
  * `catalog_product_entity_decimal`, etc.

---

## Authorize and Capture in Payments

### 🔐 Authorize

* Reserves the amount on the customer’s card.
* Funds are **not deducted** immediately.
* Used when shipping may be delayed or manual review is needed.

### 💰 Capture

* **Charges the customer** for the authorized amount.
* Transfers funds from customer to merchant.
* Often done at shipping.

### ⚡ Authorize and Capture (Immediate)

* Authorization and capture happen in **one step**.
* Used for instant delivery (e.g., digital goods).

### Magento 2 Payment Settings

* **Authorize Only**: Payment is reserved, captured manually.
* **Authorize and Capture**: Payment is charged immediately.

---

## Interface vs. Abstract Class

### Interface

* Declares method signatures (no implementation).
* Supports **multiple inheritance**.
* Methods must be `public`.

```php
interface ProductInterface {
    public function getName();
    public function getPrice();
}

class Product implements ProductInterface {
    public function getName() {
        return "Laptop";
    }

    public function getPrice() {
        return 1000;
    }
}
```

### Abstract Class

* Can include implemented and abstract methods.
* Supports **single inheritance only**.
* Can have properties and method logic.

```php
abstract class AbstractProduct {
    protected $name;

    public function setName($name) {
        $this->name = $name;
    }

    abstract public function getPrice();
}

class Product extends AbstractProduct {
    public function getPrice() {
        return 1000;
    }
}
```

### When to Use What

* **Use Interfaces** for service contracts and defining consistent behavior (e.g., `ProductRepositoryInterface`).
* **Use Abstract Classes** when sharing common logic among related classes (e.g., `AbstractModel`).
