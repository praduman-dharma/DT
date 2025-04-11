# Grunt Setup for Magento 2

> 🔗 **Reference:** [Rohan Hapani - How to Use Grunt in Magento 2](https://www.rohanhapani.com/how-to-use-grunt-in-magento-2)

---

## 🛠️ Step 1: Install Node.js

```bash
sudo apt-get install nodejs
nodejs -v
```

---

## 📦 Step 2: Install Grunt CLI Globally

```bash
npm install -g grunt-cli
```

---

## 🔄 Step 3: Install and Update Dependencies

In your Magento 2 root directory, run:

```bash
npm install
npm update
```

---

## 📝 Step 4: Rename Sample Files

In the Magento 2 root directory, rename the following files:

| From                     | To                    |
|--------------------------|------------------------|
| `package.json.sample`    | `package.json`         |
| `Gruntfile.js.sample`    | `Gruntfile.js`         |
| `grunt-config.json.sample` | `grunt-config.json` |

---

## ⚙️ Step 5: Update `grunt-config.json`

Replace the contents of `grunt-config.json` with:

```json
{
  "themes": "dev/tools/grunt/configs/themes"
}
```

---

## 🎨 Step 6: Add Your Custom Theme to Grunt

Open the file:

```bash
dev/tools/grunt/configs/themes.js
```

Add the following entry (replace placeholders with your actual values):

```js
module.exports = {
  ...
  ten: {
    area: 'frontend',
    name: 'Conceptive/ten',
    locale: 'en_US',
    files: [
      'css/styles-m',
      'css/styles-l'
    ],
    dsl: 'less'
  },
  ...
};
```

- `<theme_name>`: Theme code (e.g., `ten`)
- `<vendor_name>/<theme_name>`: Theme folder path (e.g., `Conceptive/ten`)
- `<language>`: Locale (e.g., `en_US`)
- `<path_to_file>`: Relative path to your root `.less` files in `web/css/`

---

## 🚀 Step 7: Run Grunt Commands

Use the following commands based on your needs:

| Command | Description |
|--------|-------------|
| `grunt clean` | Removes static files from `pub/static` and `var/` |
| `grunt exec` | Generates symlinks to source files |
| `grunt exec:<theme>` | Symlinks for a specific theme |
| `grunt less` | Compiles CSS files |
| `grunt less:<theme>` | Compile CSS for a specific theme |
| `grunt watch` | Watches for changes and recompiles automatically |

---

## 🧪 Example: Track Changes for Themes

```bash
grunt exec:ten
grunt less:ten
grunt watch
```

---

Now your Magento 2 Grunt setup is ready for LESS compilation and real-time CSS changes. 💪
