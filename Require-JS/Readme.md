# Introduction to RequireJS

**RequireJS** is a JavaScript file and module loader. It is optimized for use in browsers, but it can also be used in other JavaScript environments such as **Rhino** and **Node.js**.

Using a modular script loader like RequireJS improves the **speed**, **structure**, and **quality** of your code.

---

## Why Use RequireJS?

In simple terms:

> **RequireJS bundles all your JavaScript files into one manageable module and handles how they are loaded.**

This makes your JavaScript code more maintainable and efficient, especially in larger projects.

---

## The `data-main` Attribute

To use RequireJS in your HTML, you'll need to use the `data-main` attribute. This attribute specifies the path to your main configuration file for RequireJS.

```html
<script data-main="js/config" src="require-2.3.6.js"></script>
````

### Notes:

* The `data-main` attribute points to the configuration file (e.g., `config.js`).
* You **do not** need to include the `.js` extension—RequireJS assumes it automatically.
* It would basically load the configuration file of our requireJS application.

---

## Initializing RequireJS

To initialize your RequireJS application, use the `require` function inside a `<script>` tag:

```html
<script>
    require(['config'], function() {
        // Your application code goes here
    });
</script>
```

---

## Summary

* **Step 1:** Include `require.js` with the `data-main` attribute.
* **Step 2:** Point `data-main` to your configuration file (e.g., `js/config`).
* **Step 3:** Initialize RequireJS using the `require()` function.

---

Using RequireJS helps structure complex JavaScript applications into clean, modular, and efficient codebases.
