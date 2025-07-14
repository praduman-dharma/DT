# Conceptive_GraphQl

## Overview
This Magento 2 module adds custom GraphQL queries to retrieve guest and customer information, as well as recent orders.

## Installation
1. Place the module in `app/code/Conceptive/GraphQl/`
2. Run the following Magento CLI commands:
   ```sh
   bin/magento module:enable Conceptive_GraphQl
   bin/magento setup:upgrade
   bin/magento cache:flush
   ```

## GraphQL Schema
The module provides the following GraphQL queries:

### `customGreeting(name: String): String`
Returns a greeting message.

#### Example Query:
```graphql
{
    customGreeting(name: "Praduman")
}
```
#### Example Response:
```json
{
    "data": {
        "customGreeting": "Hello, Praduman! Welcome to Magento 2 GraphQL."
    }
}
```

### `currentCustomerName: String`
Returns the name of the logged-in customer or `Guest` if not logged in.

#### Example Query:
```graphql
{
    currentCustomerName
}
```

### `currentCustomerEmail: String`
Returns the email of the logged-in customer or `Guest Email Not Available` if not logged in.

#### Example Query:
```graphql
{
    currentCustomerEmail
}
```

### `recentOrders(limit: Int = 5): [Order]`
Returns the recent orders of a logged-in customer.

#### Example Query:
```graphql
{
    recentOrders(limit: 3) {
        order_id
        grand_total
        status
    }
}
```

#### Example Response:
```json
{
    "data": {
        "recentOrders": [
            {
                "order_id": "100000001",
                "grand_total": 99.99,
                "status": "complete"
            },
            {
                "order_id": "100000002",
                "grand_total": 149.50,
                "status": "processing"
            }
        ]
    }
}
```

## Additional Notes
- To test GraphQL queries, use the Magento GraphQL Playground: `https://yourstore.com/graphql`
- Ensure authentication headers are included for customer-related queries.
- This module can be extended to include mutations for actions like creating customers or placing orders.

## License
This module is open-source and follows Magento's licensing terms.

