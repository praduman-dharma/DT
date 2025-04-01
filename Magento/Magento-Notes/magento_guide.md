# Magento 2 Developer Guide

## Design Patterns & Concepts
- **Proxies**: Used to lazy-load objects and improve performance.
- **Source Model & Backend Model**: Define how data is fetched and saved in Magento.
- **Type vs. Virtual Type**:
  - Type: Defines a class in `di.xml`.
  - Virtual Type: Used to override dependencies without modifying the original class.
- **Difference Between Collection and Repository**:
  - Collections: Used for fetching multiple records from the database.
  - Repositories: Used as service contracts for CRUD operations.
- **Plugin and Types of Plugin**:
  - Before Plugin
  - After Plugin
  - Around Plugin
- **Abstract Class vs. Interface**:
  - Abstract classes can have implemented methods.
  - Interfaces only define method signatures.
- **Sort Order for Plugins**: Defines execution priority.
- **Creating a Custom Command**: Register a command in `di.xml` and implement `CommandInterface`.
- **Magento Execution Flow**: Defined in `registration.php`, `module.xml`, and `di.xml`.
- **Service Contracts**: API interfaces to ensure stability in custom modules.
- **Object Manager**: Used to instantiate objects but should be avoided in business logic.
- **Hard Dependency vs. Soft Dependency**:
  - Hard: Defined in `__construct()`.
  - Soft: Defined via `ObjectManager` or `Proxy`.
- **Plugin Execution Methods**: `Before`, `After`, `Around`.
- **Interfaces in API**: Used for defining structured APIs in Magento.
- **Ways to Override Files in Magento**:
  1. Preference (`di.xml`)
  2. Plugin
  3. Class Rewrite in `etc/` (deprecated)
  4. Observers & Events
- **Finding the Command for a Module**:
  - Check `di.xml` for CLI commands.
  - Use `bin/magento list`.
- **Magento Constructor Rules**: Define dependencies via `__construct()` and avoid using `ObjectManager` directly.

---

## Magento 2 Interview Questions
### General Questions
- How to create a custom module in Magento 2?
- How to create a custom theme?
- What are Magento optimization techniques?
- What is an Observer in Magento?
- What is a Plugin, and how does it work?
- Difference between Plugin and Observer?
- What are SOAP and REST APIs?
- Have you created an admin module? If so, explain.
- What is a Service Contract with an example?
- What is ACL (Access Control List)?
- Explain Abstract Class vs. Interface.
- What is the EAV (Entity-Attribute-Value) model?
- Explain Magento's MVC structure.
- How to create a custom event in Magento?
- How to create a custom payment method?
- Difference between Magento Community and Enterprise editions?
- Difference between Overloading and Overriding in PHP?
- What is an Interface in Magento?

---

## Magento 2 Architecture & Concepts
### General OOP & MVC Concepts
- **Event-Driven Architecture**
- **Module-Based Architecture**
- **Magento Directory Structure**:
  - Naming Conventions
  - Code Pools
  - Namespaces
  - Module Structure
- **Configuration XML**: Used for defining system configurations.
- **Factory and Functional Class Groups**
- **Class Overrides & Preferences**
- **Event Observers & Dispatchers**

### Magento Request Flow
- Application Initialization
- Front Controller Handling
- URL Rewrites
- Request Routing
- Module Initialization
- Design & Layout Initialization
- Block Structure & Templates
- Flushing Data & Rendering Output
- CMS Content Directives & Layout XML Schema

### Magento Database Concepts
- Models, Resources, and Collections
- Magento ORM (Object Relational Mapping)
- Write, Install, and Upgrade Scripts using Setup Resources
- **Entity-Attribute-Value (EAV) Model**:
  - EAV Entity
  - Attribute Management
  - Load and Save Operations

### Magento Admin Panel
- **Admin HTML Structure**:
  - Forms & Grid Widgets
  - System Configuration XML
  - ACL Permissions
  - Enabling & Configuring Extensions

---

## Magento 2 Setup & Features
- Magento Overview
- Magento Installation
- Magento First Website Page
- Magento Login & Logout
- Magento Dashboard Overview
- Magento Custom Logo Setup
- Magento Store Information Setup
- Magento Product Management
  - Categories
  - Products
  - Inventory
  - Taxes
  - Shipping Services
  - Invoices
  - Reports
- Magento Payment Setup
  - Payment Gateway
  - Payment Methods
  - Cart Price Rules
  - Currencies
  - Checkout Options
- Magento Store Management
  - Store Live Setup
  - Order Management
  - Order Emails
  - Customer Groups
  - Users & Roles
  - Widgets & Pages
  - Google Analytics
  - SEO Optimization

### Magento Performance Optimization
- Code Optimization
- Cache Management
- Frontend Optimization
- Database Performance Tuning
- Search Engine Optimization (SEO)
- Enabling Automatic Backup

This document provides a structured Magento 2 guide covering key concepts, practical knowledge, and interview questions. 🚀

