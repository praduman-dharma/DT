### **GraphQL in Magento 2**
GraphQL is a query language for APIs that allows clients to request only the data they need, making it more efficient compared to REST. Magento 2 introduced GraphQL starting from **Magento 2.3.0** and has expanded its coverage in later versions.

---

### **1. Definition**
GraphQL in Magento 2 is an API layer that allows frontend applications (like PWA, React, or Vue.js) to fetch and manipulate store data. It provides a flexible alternative to REST and SOAP APIs.

---

### **2. Usage**
GraphQL is primarily used in Magento 2 for:
- Fetching product, category, cart, and checkout data
- Managing customer authentication and accounts
- Placing and modifying orders
- Optimizing frontend performance for PWA (Progressive Web Apps)

GraphQL queries are executed via the Magento GraphQL endpoint:
```
https://yourdomain.com/graphql
```

You can test GraphQL queries using tools like:
- **GraphiQL** (built into Magento 2)
- **Altair GraphQL Client**
- **Postman**

---

### **3. Example Usage in Magento 2**

#### **Fetching Product Information**
Query:
```graphql
{
  products(filter: { sku: { eq: "24-MB01" } }) {
    items {
      id
      name
      sku
      price {
        regularPrice {
          amount {
            value
            currency
          }
        }
      }
    }
  }
}
```
Response:
```json
{
  "data": {
    "products": {
      "items": [
        {
          "id": 1,
          "name": "Hero Hoodie",
          "sku": "24-MB01",
          "price": {
            "regularPrice": {
              "amount": {
                "value": 42,
                "currency": "USD"
              }
            }
          }
        }
      ]
    }
  }
}
```

---

#### **Adding a Product to Cart**
Query:
```graphql
mutation {
  addSimpleProductsToCart(
    input: {
      cart_id: "xxxxxxxxxxxxxxxx"
      cart_items: {
        data: {
          sku: "24-MB01"
          quantity: 2
        }
      }
    }
  ) {
    cart {
      items {
        product {
          name
          sku
        }
        quantity
      }
    }
  }
}
```

---

### **Example: Fetch Customer Cart**
Requires authentication:

```graphql
query {
  customerCart {
    id
    items {
      product {
        name
        sku
      }
      quantity
    }
  }
}
```

---

## **GraphQL Mutations in Magento 2**
Mutations are used to modify data, similar to POST, PUT, and DELETE in REST.

### **Example: Add Product to Cart**
This mutation adds a product to the cart:

```graphql
mutation {
  addSimpleProductsToCart(
    input: {
      cart_id: "YOUR_CART_ID"
      cart_items: [
        {
          data: {
            sku: "24-MB01"
            quantity: 1
          }
        }
      ]
    }
  ) {
    cart {
      items {
        product {
          name
          sku
        }
        quantity
      }
    }
  }
}
```

### **Example: Create a Customer**
```graphql
mutation {
  createCustomer(
    input: {
      firstname: "John"
      lastname: "Doe"
      email: "john.doe@example.com"
      password: "SecurePassword123"
    }
  ) {
    customer {
      firstname
      lastname
      email
    }
  }
}
```

---

## **Other Features**
### **GraphQL Authorization in Magento 2**
Some queries/mutations require authentication using an access token.

- **For Customer Queries**: Use the `Authorization` header with a customer token.
- **For Admin Queries**: Use the admin token.

#### **Example: Generate Customer Token**
```graphql
mutation {
  generateCustomerToken(email: "john.doe@example.com", password: "SecurePassword123") {
    token
  }
}
```

### **GraphQL in Magento PWA**
- Magento PWA Studio relies on GraphQL for fetching and updating store data.
- Custom frontend implementations can replace traditional REST APIs with GraphQL.

---

## **Extending GraphQL in Magento 2**
To add custom GraphQL functionality, create a module with a GraphQL schema definition.

Example:
- Define a schema in `etc/schema.graphqls`
- Create a resolver in `Model/Resolver/`

---

#### **Creating a Custom GraphQL Endpoint in Magento 2**
1. **Define a new GraphQL schema in a custom module (`etc/schema.graphqls`)**
```graphql
type Query {
  customGreeting(name: String!): String @resolver(class: "Conceptive\\GraphQlExample\\Model\\Resolver\\Greeting")
}
```

2. **Create the Resolver Class (`Model/Resolver/Greeting.php`)**
```php
namespace Conceptive\GraphQlExample\Model\Resolver;

use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class Greeting implements ResolverInterface
{
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        return "Hello, " . $args['name'] . "!";
    }
}
```

3. **Execute the Query**
```graphql
{
  customGreeting(name: "Praduman")
}
```
Response:
```json
{
  "data": {
    "customGreeting": "Hello, Praduman!"
  }
}
```

---

### **4. Benefits of Using GraphQL in Magento 2**
- **Efficient Data Fetching:** Only retrieves requested fields, reducing payload size.
- **Single API Call:** No need to make multiple requests for related data.
- **Strongly Typed Schema:** Ensures API stability and predictability.
- **Better Performance:** Optimized for frontend applications like PWA.
- **Headless Commerce**: Used in Magento PWA Studio and custom frontend implementations.
