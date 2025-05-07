# Node.js Basics

## What is Node.js?

Node.js is:

- A free and open-source **server-side environment**
- Allows **JavaScript** to be used on the server
- Enables you to use a **single language** (JavaScript) for both frontend and backend development

---

## Checking Versions

To verify your Node.js and npm installation:

```bash
node --version     # Check Node.js version
npm --version      # Check npm (Node Package Manager) version
````

---

## npm: Node Package Manager

`npm` is used to manage packages (libraries/modules) in your Node.js projects.

---

### Initialize a Project

Start by creating a `package.json` file, which stores project metadata and dependencies:

```bash
npm init
```

Follow the prompts to complete setup.

---

### Installing Packages

Install a specific package for the current project:

```bash
npm install <package_name>
```

**Example:**

```bash
npm install express
```

---

### Installing Packages Globally

To install a package globally (available across all projects):

```bash
npm install -g <package_name>
```

**Example:**

```bash
npm install -g express
```

---

### Uninstalling Packages

To remove a package:

```bash
npm uninstall <package_name>
```

---

### Dev Dependencies

Packages used only during development (e.g., testing tools, bundlers):

```bash
npm install --save-dev <package_name>
```

---

### View Globally Installed Packages

To list all globally installed packages:

```bash
npm list -g
```

---
