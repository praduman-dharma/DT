## **Types of Cron Groups in Magento 2**

Magento 2 has **three types of cron groups**, each serving a different purpose:

| Cron Group              | Description                                               | Example                         |
| ----------------------- | --------------------------------------------------------- | ------------------------------- |
| **Default (`default`)** | Runs core and most third-party module cron jobs.          | Indexing, Emails, Cache cleanup |
| **Index (`index`)**     | Dedicated cron group for indexing processes.              | `indexer:reindex`               |
| **Custom**              | Developer-defined cron group for custom scheduling needs. | Custom module-specific tasks    |

---

## **1. Default Cron Group (`default`)**

* The most commonly used cron group.
* Handles core Magento tasks like emails, cache cleanup, and log maintenance.

### **Example (Default Cron in `crontab.xml`)**

📂 `app/code/Conceptive/CustomModule/etc/crontab.xml`

```xml
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Cron:etc/crontab.xsd">
    <group id="default"> <!-- Uses the default cron group -->
        <job name="conceptive_custom_cron" instance="Conceptive\CustomModule\Cron\CustomTask" method="execute">
            <schedule>* * * * *</schedule> <!-- Runs every minute -->
        </job>
    </group>
</config>
```

### **Usage**

* No need to configure anything additional.
* Runs automatically if Magento’s cron is set up.

---

## **2. Index Cron Group (`index`)**

* Dedicated for **indexing operations**.
* Used by Magento’s **indexers** to update data asynchronously.
* Runs separately from other cron jobs to improve performance.

### **Example (`app/etc/env.php`)**

```php
'cron_groups' => [
    'index' => [
        'schedule_generate_every' => 1,
        'schedule_ahead_for' => 5,
        'schedule_lifetime' => 2,
        'history_cleanup_every' => 10,
        'history_success_lifetime' => 60,
        'history_failure_lifetime' => 600
    ]
]
```

### **Usage**

Run manually:

```sh
bin/magento cron:run --group=index
```

---

## **3. Custom Cron Group (User-Defined)**

If you need a **separate queue** for your module’s cron jobs, you can define a **custom cron group**.

### **Steps to Create a Custom Cron Group**

#### **1. Define the Cron Group in `di.xml`**

📂 `app/code/Conceptive/CustomModule/etc/di.xml`

```xml
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework/ObjectManager/etc/config.xsd">

    <type name="Magento\Cron\Model\Groups\Config">
        <arguments>
            <argument name="groups" xsi:type="array">
                <item name="custom_group" xsi:type="array">
                    <item name="schedule_generate_every" xsi:type="string">1</item>
                    <item name="schedule_ahead_for" xsi:type="string">10</item>
                    <item name="schedule_lifetime" xsi:type="string">5</item>
                    <item name="history_cleanup_every" xsi:type="string">10</item>
                    <item name="history_success_lifetime" xsi:type="string">60</item>
                    <item name="history_failure_lifetime" xsi:type="string">600</item>
                </item>
            </argument>
        </arguments>
    </type>
</config>
```

---

#### **2. Add Cron Job to `crontab.xml`**

📂 `app/code/Conceptive/CustomModule/etc/crontab.xml`

```xml
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Cron:etc/crontab.xsd">
    <group id="custom_group"> <!-- Custom Cron Group -->
        <job name="conceptive_custom_cron" instance="Conceptive\CustomModule\Cron\CustomTask" method="execute">
            <schedule>*/5 * * * *</schedule> <!-- Runs every 5 minutes -->
        </job>
    </group>
</config>
```

---

#### **3. Create the Cron Class**

📂 `app/code/Conceptive/CustomModule/Cron/CustomTask.php`

```php
<?php
namespace Conceptive\CustomModule\Cron;

use Psr\Log\LoggerInterface;

class CustomTask
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute()
    {
        $this->logger->info('Custom cron job executed.');
    }
}
```

---

#### **4. Run the Custom Cron**

```sh
bin/magento cron:run --group=custom_group
```

---

## **Comparison of Cron Groups**

| Cron Group  | Purpose                                       | Runs Separately? |
| ----------- | --------------------------------------------- | ---------------- |
| **default** | Core Magento tasks (emails, cleanup, reports) | No               |
| **index**   | Indexing processes                            | Yes              |
| **custom**  | Custom module-specific tasks                  | Yes              |

---

## **Conclusion**

* **Use `default`** for regular cron jobs.
* **Use `index`** for indexing-related jobs.
* **Create a `custom` cron group** for better performance if your module has many cron tasks.
