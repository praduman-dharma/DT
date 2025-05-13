## ViewModel

In Magento 2, a **ViewModel** is a class that helps separate business logic from the template (PHTML) files. It is an alternative to using block classes and provides a more modular and testable approach.

---

### **Why Use ViewModels?**

* Keeps templates clean and free from complex logic.
* Enhances code reusability.
* Improves testability by keeping business logic in a separate class.
* Encouraged by Magento's best practices.

---

### **How to Use ViewModel in Magento 2**

#### **1. Create a ViewModel Class**

Create a ViewModel class in your module, e.g., `Conceptive_HelloWorld`.

```php
<?php
namespace Conceptive\HelloWorld\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class ExampleViewModel implements ArgumentInterface
{
    public function getMessage()
    {
        return "Hello from ViewModel!";
    }
}
```

* The class **must implement** `Magento\Framework\View\Element\Block\ArgumentInterface`.

---

#### **2. Declare the ViewModel in layout XML**

You need to bind the ViewModel to a block in the layout file, e.g., `default.xml` or a specific layout file.

*File: `view/frontend/layout/catalog_product_view.xml`*

```xml
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
    <body>
        <referenceBlock name="product.info">
            <arguments>
                <argument name="view_model" xsi:type="object">Conceptive\HelloWorld\ViewModel\ExampleViewModel</argument>
            </arguments>
        </referenceBlock>
    </body>
</page>
```

* This attaches the ViewModel to the block with the name `product.info`.

---

#### **3. Use ViewModel in PHTML Template**

Now, you can access the ViewModel in your PHTML file.

*File: `view/frontend/templates/example.phtml`*

```php
<?php
/** @var \Conceptive\HelloWorld\ViewModel\ExampleViewModel $viewModel */
$viewModel = $block->getViewModel();
?>
<p><?= $viewModel->getMessage(); ?></p>
```

or directly:

```php
<p><?= $block->getViewModel()->getMessage(); ?></p>
```

---

### **Additional Notes**

* ViewModels work with **block classes** and cannot replace them entirely.
* You can inject dependencies inside the ViewModel, making them highly modular.
* If multiple templates need the same logic, a ViewModel makes it reusable without duplicating code in different block classes.
