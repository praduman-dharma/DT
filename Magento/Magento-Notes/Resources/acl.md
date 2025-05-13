### **How ACL (Access Control List) is Defined for a Controller in Magento 2?**

ACL (Access Control List) in Magento 2 is used to control **which admin users/roles** can access specific areas of the Magento Admin Panel.

If you have a **custom controller** and want to restrict access, you need to define ACL rules in **`acl.xml`** and reference them in your **controller class**.

---

## **1. Define ACL in `acl.xml`**

Create the file:
📂 `app/code/Conceptive/CustomModule/etc/acl.xml`

```xml
<?xml version="1.0"?>
<acl xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
     xsi:noNamespaceSchemaLocation="urn:magento:framework/Acl/etc/acl.xsd">
    <resources>
        <resource id="Magento_Backend::admin">
            <!-- Parent ACL: 'Magento_Backend::admin' (Default Admin Access) -->
            
            <resource id="Conceptive_CustomModule::custom_module" title="Custom Module" sortOrder="10">
                <!-- Sub-permission for Controller -->
                <resource id="Conceptive_CustomModule::manage" title="Manage Custom Module" sortOrder="20"/>
            </resource>

        </resource>
    </resources>
</acl>
```

### **Explanation**

* **`Magento_Backend::admin`** → Grants access under the **Admin Panel**.
* **`Conceptive_CustomModule::custom_module`** → Parent ACL for the module.
* **`Conceptive_CustomModule::manage`** → Specific ACL for accessing the controller.

---

## **2. Apply ACL in the Controller**

Modify your controller file and reference the ACL rule.

📂 `app/code/Conceptive/CustomModule/Controller/Adminhtml/Custom/Index.php`

```php
<?php
namespace Conceptive\CustomModule\Controller\Adminhtml\Custom;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Conceptive_CustomModule::manage'; // ACL defined in acl.xml

    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
```

### **Explanation**

* **`const ADMIN_RESOURCE = 'Conceptive_CustomModule::manage'`**

  * This ensures only users with the right ACL permission can access this controller.

---

## **3. Assign ACL to Admin Roles**

After defining the ACL:

1. Go to **Magento Admin → System → Permissions → User Roles**.
2. Select a role and go to **Role Resources**.
3. You will find the **Custom Module → Manage Custom Module** ACL option.
4. Check it and save.

---

## **4. Flush Cache & Test**

Run:

```sh
bin/magento cache:flush
```

Now, if an admin user **without the proper role** tries to access the controller, they will get a **"You do not have permission to access this page."** message.

---

## **Conclusion**

* **Define ACL in `acl.xml`** (`Conceptive_CustomModule::manage`).
* **Reference ACL in Controller (`ADMIN_RESOURCE`)**.
* **Assign the ACL in Admin Role Permissions**.

Would you like a full module setup for ACL-based access control? 🚀
