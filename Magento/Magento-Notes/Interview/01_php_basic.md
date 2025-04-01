# Object-Oriented Programming (OOP)

## Class
In object-oriented programming, a **class** is a blueprint for creating objects (a particular data structure). It provides initial values for state (member variables or attributes) and implementations of behavior (member functions or methods).

## Object
An **object** represents an instance of a class, allowing multiple objects from the same class to exist independently.

## `$this` Keyword
- Refers to the **current object**.
- `$this` is a **reserved keyword** in PHP that refers to the calling object.

## Constructor (`__construct`)
- When an object of a class is created, this method is automatically called.
- There are two types of constructors:
  1. **Default constructor** (without parameters)
  2. **Parameterized constructor** (with parameters)

## Destructor (`__destruct`)
- The **destructor** method is called as soon as there are no other references to a particular object.
- It may also be called during the shutdown sequence.

---

## Inheritance
Inheritance allows a child class to **access** the properties and methods of a parent class.
- The child class inherits **all** public and protected properties and methods from the parent.
- It can also have its **own** properties and methods.

### Types of Inheritance
1. **Single Inheritance**
   - `Class B` extends `Class A`
   
   ```
   Class A
      |
   Class B
   ```

2. **Multilevel Inheritance**
   - `Class B` extends `Class A`, and `Class C` extends `Class B`

   ```
   Class A
      |
   Class B
      |
   Class C
   ```

3. **Hierarchical Inheritance**
   - `Class B` and `Class C` extend `Class A`

   ```
        Class A
        /      \
    Class B    Class C
   ```

4. **Multiple Inheritance** _(Not supported in PHP)_

---

## Property Scope
### Public
- Public properties or methods **can be accessed** from anywhere.

### Protected
- **Cannot** access protected properties or methods **outside** the class or object.
- Can be accessed **within the same class** and by **child classes**.

### Private
- Private properties or methods **can only** be accessed within the same class.
- **Cannot** be accessed outside the class or with an object.
- **Child classes** **cannot** access a parent's private properties or methods.

---

## Abstract Class
- **Cannot** instantiate an abstract class directly.
- Abstract classes **can contain** abstract methods.
- Abstract methods **must** be defined in a subclass that extends the abstract class.
- Any class that extends an abstract class **must** implement its abstract methods.

---

## Interface
- An **interface** is similar to a class but contains **only abstract methods**.
- All methods in an interface **must be public**.
- An interface can declare **constants** (which cannot be overridden by a class or another interface).
- The `interface` keyword is used to create an interface.

---

## Final Method and Class
- **Final Method**: A child class **cannot override** a final method in its class.
- **Final Class**: A class marked as `final` **cannot** be extended.

---

This structured guide provides a comprehensive overview of OOP concepts in PHP. Let me know if you need further improvements!

