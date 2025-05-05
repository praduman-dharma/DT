# LESS Setup Guide

This guide walks you through installing Node.js, setting up the LESS compiler, and watching files for automatic compilation.

---

## 1. Install Node.js

Download and install Node.js from the official website:

👉 [https://nodejs.org](https://nodejs.org)

After installation, verify Node.js is installed:

```bash
node -v
````

---

## 2. Install LESS Globally

Install the LESS compiler globally using npm:

```bash
npm install -g less
```

Verify the installation:

```bash
lessc -v
```

---

## 3. Compile LESS Files Manually

To compile a `.less` file into a `.css` file:

```bash
lessc input.less output.css
```

**Example:**

```bash
lessc style.less style.css
```

---

## 4. Install LESS Watch Compiler

To watch `.less` files and compile them automatically when changes are detected:

```bash
npm install -g less-watch-compiler
```

---

## 5. Usage of LESS Watch Compiler

Syntax:

```bash
less-watch-compiler [options] <source_dir> <destination_dir>
```

**Example:**

```bash
less-watch-compiler less css
```

This will watch all `.less` files in the `less` directory and compile them into the `css` directory.

---

Happy coding! 🎨
