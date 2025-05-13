# Magento 2 Design Patterns

## Object Manager
- Primary responsibility: Instantiating and configuring objects via two main methods:
  - `GET`: Returns a singleton object (shared instance between components)
  - `CREATE`: Returns a new object (fresh instance)
  
**Key Differences:**
- Calling `GET` from multiple places returns the same instance
- Calling `CREATE` always returns a new instance

## Dependency Injection (DI)
- System of object management based on Object Manager or Factory
- Design pattern where Class A declares dependencies for Class B to use
- Typically uses interfaces and implementations

**Explanation:**
A dependency is an object needed by a class to perform functions. Injection is passing that dependency to the dependent class.

**Example:**
If a class fetches data using a Magento 2 Helper, it has a dependency on that Helper object.

## di.xml Configuration
Files that define dependency injection configurations, which can be:

### Global di.xml
- **Scope:** Applies to all areas (frontend, adminhtml, cron, etc.)
- **Location:** `<module_dir>/etc/di.xml`
- **Purpose:** Global services, preferences, plugins, or factories
- **Example:**
  ```xml
  <config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:ObjectManager/etc/config.xsd">
      <preference for="Magento\Catalog\Model\Product" type="Vendor\Module\Model\CustomProduct" />
  </config>
  ```

### Area-Specific di.xml
- **Scope:** Specific to areas (frontend, adminhtml, etc.)
- **Location:** `<module_dir>/etc/<area>/di.xml`
- **Purpose:** Area-specific configurations
- **Areas:**
  - `frontend`: Storefront only
  - `adminhtml`: Admin panel only
  - `webapi_rest`: REST APIs
  - `webapi_soap`: SOAP APIs
  - `cron`: Cron jobs

**Resolution Priority:**
1. Area-specific configurations override global ones
2. If no area-specific file exists, global configuration applies
3. Magento merges all di.xml files with area-specific taking precedence

## Service Contracts
Set of PHP interfaces that define API for business functionalities, ensuring:
- Stable, modular interaction with core features
- Better customization and upgradability
- Module decoupling

### Key Concepts:
1. **Interfaces Over Implementation**
   - Allows implementation changes without affecting dependent modules

2. **Data Interfaces (DTOs)**
   - Immutable data transfer objects
   - Located in `Api/Data/` with getter/setter methods
   - Example: `Magento\Catalog\Api\Data\ProductInterface`

3. **Repositories**
   - Manage entities and abstract database logic
   - Example: `Magento\Catalog\Api\ProductRepositoryInterface`

4. **Service Interfaces**
   - Define custom business logic beyond CRUD
   - Example: `Magento\Quote\Api\CartManagementInterface`

5. **SearchCriteria**
   - `Magento\Framework\Api\SearchCriteriaInterface` for filtered data

6. **APIs**
   - Automatically expose methods to REST/GraphQL APIs

### Advantages:
- Loose coupling
- Upgrade safety
- API readiness
- Code reusability

## Proxies
If there are any classes and their dependencies using many resources, the function’s performance is badly impacted. In reality, you may not use these dependencies taking many resources in the current class. 

To handle this problem, Magento comes up with a solution as Proxy Class – a design pattern for the class whose functions negatively affect performance. It means if class A is dependency injected into a class B, class A is instantiated only when a function of class A is called in class B.

Design pattern for lazy-loading resource-intensive dependencies:
- Instantiated only when needed
- Configured via di.xml:
  ```xml
  <type name="Magento\Backend\Helper\Data">
      <arguments>
          <argument name="backendUrl" xsi:type="object">Magento\Backend\Model\UrlInterface\Proxy</argument>
      </arguments>
  </type>
  ```

## Types vs Virtual Types

### Type
In Magento 2, type is a configuration element used in di.xml to define the behavior or configuration for a specific class or interface in the Dependency Injection (DI) system. It is used to specify preferences, plugins, or constructor arguments for that class or interface.

- Configures specific classes/interfaces directly
- Used for preferences, plugins, or constructor arguments
- **Example:**
  ```xml
  <type name="Vendor\Module\Model\Logger">
      <arguments>
          <argument name="fileName" xsi:type="string">/var/log/custom.log</argument>
      </arguments>
  </type>
  ```

### Virtual Type
A Virtual Type in Magento 2 is a mechanism used in the Dependency Injection (DI) system to create a new type (class or object) based on an existing class or interface without defining a new PHP class.

Virtual types allow you to reuse existing classes with different constructor arguments, reducing the need for redundant PHP code. They are defined in the di.xml file and are never instantiated directly but are used internally by Magento's DI system.

- Creates variations of existing classes without PHP code
- Reusability: Use an existing class with different constructor arguments.
- Better Performance: Reduce overhead by avoiding duplication in the PHP codebase.
- Custom Behavior: Modify the behavior of a class by overriding constructor arguments.
- Suppose we want to use Magento’s default Magento\Framework\Logger\Monolog class but with a custom channel name. Instead of creating a new PHP class, we define a Virtual Type in di.xml.
- Defined in di.xml with modified arguments
- **Example:**
  ```xml
  <virtualType name="CustomLogger" type="Magento\Framework\Logger\Monolog">
      <arguments>
          <argument name="name" xsi:type="string">custom_channel</argument>
      </arguments>
  </virtualType>
  ```

## Events and Observers

Magento 2 uses the **event-observer pattern** to allow developers to execute custom functionality at specific points during the application flow. This approach ensures flexibility and extensibility without modifying core code.

---

## 🔑 Key Concepts

### Event

* An **event** is a specific execution point in Magento where custom logic can be attached.
* Events are dispatched using the `dispatch()` method.

```php
$this->_eventManager->dispatch('event_name', ['key' => $value]);
```

### Observer

* An **observer** is a class that listens for a specific event and executes custom logic when that event is triggered.

### Event Manager

* The **Event Manager** (`Magento\Framework\Event\ManagerInterface`) handles:

  * Dispatching events.
  * Executing corresponding observers.

### Types of Events

* **Predefined Events**: Triggered by Magento core at specific execution points.
* **Custom Events**: Triggered by custom modules for custom behavior.

## 🧪 Example: Log Customer Login Event

**Scenario**: Log customer login details when they log in.

### Step 1: Create `events.xml`

Create `events.xml` in your module:

* For frontend-specific events:
  `app/code/Vendor/Module/etc/frontend/events.xml`
* For global events:
  `app/code/Vendor/Module/etc/events.xml`

```xml
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Event/etc/events.xsd">
    <event name="customer_login">
        <observer name="log_customer_login" instance="Vendor\Module\Observer\LogCustomerLogin" />
    </event>
</config>
```

### Step 2: Create the Observer Class

```php
<?php

namespace Vendor\Module\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class LogCustomerLogin implements ObserverInterface
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $this->logger->info('Customer Login: ' . $customer->getEmail());
    }
}
```

## 📋 Commonly Used Magento 2 Events

| Event Name                           | Triggered When                              | Area      |
| ------------------------------------ | ------------------------------------------- | --------- |
| `customer_login`                     | A customer logs into their account          | Frontend  |
| `customer_logout`                    | A customer logs out of their account        | Frontend  |
| `sales_order_place_after`            | After an order is placed                    | Global    |
| `checkout_cart_add_product_complete` | After a product is added to the cart        | Frontend  |
| `catalog_product_save_after`         | After a product is saved in the admin panel | Adminhtml |

## ⚙️ Special Events: Action Dispatch Events

Magento allows you to hook into the request/response flow with **action dispatch events**.

### Types

* **`controller_action_predispatch_<action>`**
  Triggered *before* a controller action is executed.
  Use case: request validation or redirection logic.

* **`controller_action_postdispatch_<action>`**
  Triggered *after* a controller action is executed.
  Use case: logging or response modification.

### Example: Custom Logic Before Viewing a Product

**Scenario**: Run custom code before the product view page loads.

#### `events.xml`

```xml
<event name="controller_action_predispatch_catalog_product_view">
    <observer name="log_before_product_view"
              instance="Vendor\Module\Observer\LogBeforeProductView" />
</event>
```

## 🛠️ Tips

* **Disabling an Observer**: Add `disabled="true"` to the observer definition.

```xml
<observer name="log_customer_login"
          instance="Vendor\Module\Observer\LogCustomerLogin"
          disabled="true" />
```

* **Best Practice**: Use observers to hook into logic non-invasively. Avoid modifying core code for maintainability and upgrade compatibility.


# Plugins (Interceptors)

A **plugin** in Magento 2 is a mechanism that allows developers to modify or extend the behavior of public methods in a class **without changing core code**. Plugins are part of Magento's **Interception** system, which enables you to hook into method calls and execute custom logic:

* **Before** the method executes.
* **After** the method executes.
* **Around** the method execution (wrapping it completely).

## ✅ When to Use Plugins

* To modify the behavior of a specific public method.
* When the required customization cannot be achieved using observers.
* To avoid direct modifications to core files (maintains upgrade compatibility).

## 🔀 Types of Plugins

### 1. `before` Plugin

* Executes **before** the original method is called.
* Can modify method **arguments**.

#### Example: Modify Product Name Before Saving

```php
public function beforeSetName(\Magento\Catalog\Model\Product $subject, $name)
{
    $name = $name . ' - Modified';
    return [$name];
}
```

### 2. `after` Plugin

* Executes **after** the original method.
* Can modify the **return value**.

#### Example: Append " - Custom" After Getting Product Name

```php
public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
{
    return $result . ' - Custom';
}
```

### 3. `around` Plugin

* **Wraps** around the original method.
* Can choose whether or not to call the original method.
* Gives complete control over **arguments and return value**.

#### Syntax

```php
public function aroundMethodName(
    $subject,
    callable $proceed,
    ...$args
) {
    // Modify arguments
    $args[0] = 'Modified Argument';

    // Call original method
    $result = $proceed(...$args);

    // Modify result
    return $result . ' - Modified Result';
}
```

#### Example: Override Product Name

```php
public function aroundGetName(\Magento\Catalog\Model\Product $subject, callable $proceed)
{
    // Skip the original method entirely
    return 'Custom Product Name';
}
```

#### Example 2: Modify Argument Before Setting Product Name

```php
public function aroundSetName(\Magento\Catalog\Model\Product $subject, callable $proceed, $name)
{
    $name = 'Prefix - ' . $name;
    $result = $proceed($name);
    return $result;
}
```

## ⚙️ Plugin Implementation Example

### Step 1: Register the Plugin in `di.xml`

```xml
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:ObjectManager/etc/config.xsd">
    <type name="Magento\Catalog\Model\Product">
        <plugin name="modify_product_name_plugin" type="Vendor\Module\Plugin\ProductNameModifier" />
    </type>
</config>
```

### Step 2: Create the Plugin Class

```php
<?php
namespace Vendor\Module\Plugin;

class ProductNameModifier
{
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result . ' - Custom';
    }
}
```

## 🛠️ How It Works

* Magento calls `getName()` from `Magento\Catalog\Model\Product`.
* The `afterGetName()` method of your plugin intercepts the result.
* It returns a modified product name with `" - Custom"` appended.

## 📝 Use Case Summary

| Plugin Type | Purpose                                 | Can Modify Arguments | Can Modify Return | Can Skip Original |
| ----------- | --------------------------------------- | -------------------- | ----------------- | ----------------- |
| `before`    | Modify input arguments before execution | ✅                    | ❌                 | ❌                 |
| `after`     | Modify return value after execution     | ❌                    | ✅                 | ❌                 |
| `around`    | Full control over execution             | ✅                    | ✅                 | ✅                 |

## ⚠️ Best Practices

* Use **`around`** plugins only when absolutely necessary—they are powerful but more complex and less performant.
* Prefer **`before`** or **`after`** plugins for simpler use cases.
* Always ensure that plugins do not conflict with other customizations or modules.


# 🆚 Repositories vs Factories in Magento 2

In Magento 2, **Repositories** and **Factories** are both used to work with entities, but they serve different purposes depending on the context.

* **Use Factories** when you need to **create a new instance** of an entity.
* **Use Repositories** to **fetch, save, delete, or update** entities through a standardized interface.

Additionally, repositories are part of **Magento's service contracts**, making them compatible with **REST/SOAP APIs**.

## 📦 Repositories

Repositories are **service classes** that provide an **interface-based** and **API-friendly** way to interact with Magento entities like products, customers, or orders.

### ✅ Use Cases

* Fetching an entity (e.g., product by ID or SKU).
* Saving or deleting entities in the database.
* Providing an abstraction layer for CRUD operations.

### 🔑 Key Characteristics

* **Interface-Based**: Each repository implements an interface (e.g., `ProductRepositoryInterface`) to enforce a strict contract.
* **Service-Oriented**: Designed to be used in business logic and service layers.
* **API-Compatible**: Can be used in **REST/SOAP web APIs**.
* **Standard Methods**:

  * `getById($id)`
  * `save($entity)`
  * `delete($entity)`
  * `getList($searchCriteria)`


## 🏭 Factories

Factories are **auto-generated classes** used to **create new instances** of models or objects. Unlike repositories, they do **not interact with the database directly**.

### ✅ Use Cases

* Creating a **new instance** of an entity without saving it.
* Dynamically generating objects in custom logic or services.

### 🔑 Key Characteristics

* **Instance Creation**: Creates objects using Magento’s dependency injection.
* **No Persistence**: Only responsible for instantiating objects; no save/load operations.
* **Auto-Generated**: Factories are generated by Magento based on constructor DI rules.

## ✅ Best Practices

| Task                            | Recommended Approach                                   |
| ------------------------------- | ------------------------------------------------------ |
| **Fetch, Save, Delete, Update** | Use **Repositories**                                   |
| **Create New Object**           | Use **Factories**                                      |
| **Create and Then Save**        | Use **Factory** to create, then **Repository** to save |

### 💡 Example Workflow

```php
// Create new product using factory
$product = $this->productFactory->create();
$product->setName('Custom Product');
$product->setSku('custom-sku');

// Save product using repository
$this->productRepository->save($product);
```

## 📌 Summary

* Repositories are best for **data operations** and **API exposure**.
* Factories are best for **object instantiation**.
* **Use both together** when creating and persisting new entities.


# 🧩 Injectable vs Non-Injectable Objects in Magento 2

In Magento 2, understanding whether an object should be **injected via Dependency Injection (DI)** or **created using a factory** is key to writing maintainable, efficient, and bug-free code.

## ✅ Injectable Objects

An object is considered **injectable** when it is **safe to be shared** across the application. These objects are usually **stateless** or **immutable** and are injected via constructor-based dependency injection.

### 🔑 Characteristics

* **Reusable**: Safe to reuse across multiple classes.
* **Stateless or Immutable**: Does not hold state that can cause side effects when reused.
* **Constructor Injection**: Provided through DI in the constructor.

### 📦 Examples

* Models: `Magento\Catalog\Model\Product`
* Helpers: `Magento\Framework\App\Helper\AbstractHelper`
* Repositories: `Magento\Catalog\Api\ProductRepositoryInterface`
* Loggers, Configuration readers, etc.

## 🚫 Non-Injectable Objects

**Non-injectable objects** are typically **stateful** and must be **instantiated anew** for each usage. These are created using **factories** or the **Object Manager** (preferably factories in custom code).

### 🔑 Characteristics

* **Stateful**: Holds unique data/state (e.g., product name, price, etc.).
* **Requires Unique Instances**: Not safe to share; needs a new object each time.
* **Created Using Factories**: Not injected via DI; created manually via a factory class.

### 📦 Examples

* Models: `Magento\Catalog\Model\Product`
* Collections: `Magento\Catalog\Model\ResourceModel\Product\Collection`
* Service Models with request-specific state

## 💡 Example: Using a Factory for a Non-Injectable Object

```php
namespace Vendor\Module\Model;

use Magento\Catalog\Model\ProductFactory;

class Example
{
    private $productFactory;

    public function __construct(ProductFactory $productFactory)
    {
        $this->productFactory = $productFactory; // Factory for non-injectable object
    }

    public function createProduct()
    {
        $product = $this->productFactory->create(); // New instance
        $product->setName('New Product');
        return $product;
    }
}
```

> **Why Factory?**
> Because `Product` is **stateful**, a new instance is required every time to avoid data leakage or unintended behavior.

## 🔍 Key Differences Between Injectable and Non-Injectable Objects

| Property        | Injectable Objects                     | Non-Injectable Objects                  |
| --------------- | -------------------------------------- | --------------------------------------- |
| **State**       | Stateless or immutable                 | Stateful                                |
| **Reusability** | Can be shared across application       | Requires a new instance per usage       |
| **Injection**   | Injected via Dependency Injection (DI) | Created using Factory or Object Manager |
| **Lifecycle**   | Shared lifecycle                       | Unique lifecycle                        |
| **Examples**    | Repositories, Helpers, Loggers         | Models, Collections, Service Models     |

## ✅ Best Practice Summary

* Use **DI for injectable objects** that are safe to reuse.
* Use **factories for stateful objects** that require unique instances.
* Avoid injecting models like `Product`, `Order`, or `Customer` directly if you plan to modify their state.
