Magento 2 provides several built-in GraphQL endpoints for retrieving store configuration, customer data, products, categories, and other essential information. Below are some commonly used GraphQL endpoints:

---

### **1. Get List of Countries**
Query:
```graphql
{
  countries {
    id
    full_name_english
    full_name_locale
    two_letter_abbreviation
    three_letter_abbreviation
    available_regions {
      id
      code
      name
    }
  }
}
```
Response:
```json
{
  "data": {
    "countries": [
      {
        "id": "US",
        "full_name_english": "United States",
        "full_name_locale": "United States",
        "two_letter_abbreviation": "US",
        "three_letter_abbreviation": "USA",
        "available_regions": [
          {
            "id": 12,
            "code": "CA",
            "name": "California"
          },
          {
            "id": 33,
            "code": "NY",
            "name": "New York"
          }
        ]
      }
    ]
  }
}
```

---

### **2. Get Store Configuration**
Query:
```graphql
{
  storeConfig {
    id
    code
    website_id
    locale
    base_currency_code
    default_display_currency_code
    timezone
  }
}
```
Response:
```json
{
  "data": {
    "storeConfig": {
      "id": 1,
      "code": "default",
      "website_id": 1,
      "locale": "en_US",
      "base_currency_code": "USD",
      "default_display_currency_code": "USD",
      "timezone": "America/Los_Angeles"
    }
  }
}
```

---

### **3. Get Category Tree**
Query:
```graphql
{
  categoryList {
    id
    name
    children {
      id
      name
    }
  }
}
```
Response:
```json
{
  "data": {
    "categoryList": [
      {
        "id": 2,
        "name": "Default Category",
        "children": [
          {
            "id": 3,
            "name": "Men"
          },
          {
            "id": 4,
            "name": "Women"
          }
        ]
      }
    ]
  }
}
```

---

### **4. Get Customer Details (Requires Authorization)**
Query:
```graphql
{
  customer {
    firstname
    lastname
    email
    addresses {
      city
      country_code
    }
  }
}
```
Headers (Bearer Token Required):
```
Authorization: Bearer <customer_access_token>
```
Response:
```json
{
  "data": {
    "customer": {
      "firstname": "John",
      "lastname": "Doe",
      "email": "johndoe@example.com",
      "addresses": [
        {
          "city": "New York",
          "country_code": "US"
        }
      ]
    }
  }
}
```

---

### **5. Get Shipping Methods for a Cart**
Query:
```graphql
{
  cart(cart_id: "xxxxxxxxxxxxxxxx") {
    shipping_addresses {
      available_shipping_methods {
        carrier_code
        method_code
        carrier_title
        method_title
        amount {
          value
          currency
        }
      }
    }
  }
}
```

---

### **6. Get Payment Methods**
Query:
```graphql
{
  availablePaymentMethods {
    code
    title
  }
}
```
Response:
```json
{
  "data": {
    "availablePaymentMethods": [
      {
        "code": "checkmo",
        "title": "Check / Money order"
      },
      {
        "code": "paypal_express",
        "title": "PayPal Express Checkout"
      }
    ]
  }
}
```

---

### **7. Get Order Details (After Placing Order)**
Query:
```graphql
{
  customer {
    orders {
      items {
        id
        order_number
        status
        total {
          grand_total {
            value
            currency
          }
        }
      }
    }
  }
}
```

---

These are just some of the core GraphQL endpoints available in Magento 2. 🚀