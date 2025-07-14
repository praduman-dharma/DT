# Conceptive_NewProductType

This module defines a **custom product type** in Magento 2 named `New Product Type`.

---

## 🧩 What is a Custom Product Type?

Magento 2 allows you to create new product types (besides default ones like simple, configurable, etc.) for advanced pricing, inventory, or business logic scenarios.

This module adds a new product type identified by the code:  
```

new\_product\_type

````

---

## 📁 Key Files

### `etc/product_types.xml`

Registers the new product type with Magento’s product type system.

```xml
<type 
    name="new_product_type" 
    label="New Product Type" 
    modelInstance="Conceptive\NewProductType\Model\Product\Type\NewProductType" 
    indexPriority="60" 
    sortOrder="80" 
    isQty="true"
>
    <priceModel instance="Conceptive\NewProductType\Model\Product\Price" />
</type>
````

#### XML Element Details:

| Attribute       | Description                                                           |
| --------------- | --------------------------------------------------------------------- |
| `name`          | Product type code (`new_product_type`)                                |
| `label`         | Display name in the admin product form (`New Product Type`)           |
| `modelInstance` | Backend model class for product behavior                              |
| `priceModel`    | Pricing logic class                                                   |
| `indexPriority` | Determines indexing priority vs other types                           |
| `sortOrder`     | Position in the product type dropdown                                 |
| `isQty`         | Indicates this product type manages quantity (`true` = stock enabled) |

---

## 🧠 PHP Classes

### `Model/Product/Type/NewProductType.php`

Extends `\Magento\Catalog\Model\Product\Type\AbstractType` to define custom behavior for your product type.

#### Key Method:

```php
public function deleteTypeSpecificData(\Magento\Catalog\Model\Product $product)
```

This is where you'd clean up any product-type-specific data when the product is deleted. Left intentionally blank for now.

---

### `Model/Product/Price.php`

Extends `\Magento\Catalog\Model\Product\Type\Price` to control pricing logic.

This is where you'd override methods like `getPrice()`, `getFinalPrice()`, or implement dynamic pricing if needed.

---

## ✅ Admin Usage

After enabling the module, your new product type will appear in the **product type dropdown** on the "Add Product" page in the Magento Admin.

---

## 📚 References

* [Mageplaza: How to Create New Product Type](https://www.mageplaza.com/devdocs/how-create-new-product-type-magento-2.html)
* [AureateLabs: Custom Product Type in Magento 2](https://aureatelabs.com/blog/how-to-create-a-new-product-type-in-magento-2/)

---
