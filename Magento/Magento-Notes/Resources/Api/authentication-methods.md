## **Authentication Methods in Magento 2**

Magento 2 provides multiple authentication methods for securing API access, including **Token-based authentication, OAuth, and Session-based authentication**.

---

## **1. Token-Based Authentication (OAuth 2.0)**

Magento 2 supports **token-based authentication** using **Admin, Customer, or Integration tokens**.
Tokens are used to authenticate API requests instead of sending usernames and passwords repeatedly.

### **Steps for Token Authentication**

1. **Request Token** (Login API)
2. **Use Token** in API requests (as Bearer token)
3. **Invalidate Token** (Logout API)

---

### **1.1. Admin Token Authentication**

**For Admin Users (Backend Authentication)**

* Send a `POST` request to obtain a token.
* Use this token for subsequent API calls.

#### **Request:**

```sh
POST /rest/V1/integration/admin/token
Content-Type: application/json

{
  "username": "admin",
  "password": "admin123"
}
```

#### **Response:**

```json
"tdfd3n5gh7jbc9h5p8vjf8p9l8u..."
```

Now, use this token in API requests:

```sh
GET /rest/V1/orders
Authorization: Bearer tdfd3n5gh7jbc9h5p8vjf8p9l8u...
```

---

### **1.2. Customer Token Authentication**

**For Customer Login** (Frontend Authentication)

```sh
POST /rest/V1/integration/customer/token
Content-Type: application/json

{
  "username": "customer@example.com",
  "password": "customer123"
}
```

This returns a **customer-specific token**, which can be used for API calls.

---

### **1.3. Token Logout API**

To invalidate a token (logout):

```sh
POST /rest/V1/integration/admin/token/revoke
Authorization: Bearer your_token_here
```

---

## **2. OAuth 1.0a Authentication**

Magento 2 supports **OAuth 1.0a** for **third-party integrations**.

### **OAuth Key Elements**

* **Consumer Key** → API key to identify the application.
* **Consumer Secret** → Secret key for authentication.
* **Access Token** → Short-lived token for API calls.
* **Access Token Secret** → Secret key used with the token.

### **OAuth Flow**

1. The application **requests a request token**.
2. Magento **provides a request token**.
3. The user **approves the application** in Magento.
4. Magento **issues an access token**.
5. The application **uses the access token** for API requests.

#### **OAuth Example (Request Token)**

```sh
POST /oauth/token/request
Authorization: OAuth oauth_consumer_key="your_key", oauth_signature="your_signature"
```

🔹 **Use OAuth when integrating Magento with third-party applications like Zapier, ERP, or CRM systems.**

---

## **3. Session-Based Authentication (Frontend)**

Used for **built-in Magento AJAX calls** in the frontend.

* Uses the **PHP session** to store authentication.
* Works only when **cookies are enabled**.
* Not used for external API requests.

🔹 **Example:** When a logged-in customer browses the website, their session persists without requiring tokens.

---

## **4. Guest (Anonymous) Access**

Some APIs allow **public access** without authentication.

🔹 Example:

```sh
GET /rest/V1/products?searchCriteria=...
```

* Does **not require authentication**.
* Controlled by ACL (`webapi.xml`).

---

## **Comparison Table of Authentication Methods**

| Method                           | Use Case                            | Security             | Best For                       |
| -------------------------------- | ----------------------------------- | -------------------- | ------------------------------ |
| **Token-Based (Admin/Customer)** | REST APIs, Admin panel, Mobile apps | Secure & Recommended | Admins, Customers, Mobile apps |
| **OAuth 1.0a**                   | Third-party integrations (ERP, CRM) | Secure & Complex     | Integrating external services  |
| **Session-Based**                | Frontend AJAX requests              | Less Secure          | Magento frontend users         |
| **Guest (Anonymous)**            | Public APIs                         | No authentication    | Fetching public data           |

---

## **Conclusion**

* **Use Token-based authentication** for **Admin & Customer APIs**.
* **Use OAuth** for **third-party integrations**.
* **Session-based** authentication is **only for frontend browsing**.
* **Anonymous (Guest) APIs** allow access to **public data**.
