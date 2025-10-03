# 🌐 Jekyll Setup Guide

This guide helps you install Jekyll, set up a basic site, simulate GitHub Pages locally, and understand key commands for development and troubleshooting.

---

## 🧱 Installation

> Jekyll is a static site generator built in Ruby.

### 1. Install Ruby

Follow the official Ruby installation instructions for your OS:  
👉 [https://jekyllrb.com/docs/installation](https://jekyllrb.com/docs/installation)

### 2. Install Jekyll & Bundler

```bash
gem install jekyll bundler
````

### 3. Initialize Your Project

Create a `Gemfile` for managing Ruby dependencies:

```bash
bundle init
```

Then edit the `Gemfile` and add:

```ruby
gem "jekyll"
```

Install the dependencies:

```bash
bundle install
```

---

## 🚀 Create Your First Site

Create an `index.html` file in the root:

```html
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <h1>Hello World!</h1>
  </body>
</html>
```

---

## ⚙️ Build & Serve Your Site

Jekyll needs to build your site before viewing it in the browser.

### ▶️ Build Manually

```bash
jekyll build
```

### ▶️ Build + Live Server

```bash
jekyll serve
```

### ▶️ With Live Reload (auto refresh on save)

```bash
bundle exec jekyll serve --livereload
```

### ⚙️ Custom Port/Host

```bash
bundle exec jekyll serve --host 0.0.0.0 --port 4001
```

---

## 🧪 Match GitHub Pages Environment

To ensure your local build matches what GitHub Pages uses:

### 1. Update Gemfile

```ruby
source 'https://rubygems.org'
gem 'github-pages', group: :jekyll_plugins
```

Then run:

```bash
bundle install
```

### 2. Serve using GitHub Pages environment

```bash
JEKYLL_ENV=production bundle exec jekyll serve
```

Now `{{ jekyll.environment }}` will output `production`, just like GitHub Pages.

---

## 🔍 Inspect GitHub Metadata

You can print GitHub-related metadata:

```liquid
{{ site.github | inspect }}
```

> Note: If running locally without a GitHub remote, you may see errors. To fix, either:
>
> * Add a remote: `git remote add origin https://github.com/username/repo.git`
> * Or define this in `_config.yml`:
>
>   ```yaml
>   repository: username/repo
>   ```

---

## 🧠 Bonus: Process Management Tips

### What `Ctrl+Z` and `Ctrl+C` Do

| Key Combo | Action                                      |
| --------- | ------------------------------------------- |
| `Ctrl+C`  | ❌ Terminates the process (recommended stop) |
| `Ctrl+Z`  | 💤 Suspends the process (leaves it running) |

### Resume Suspended Server

```bash
fg
```

### Kill Suspended Jekyll Process

```bash
ps aux | grep jekyll     # Find the PID
kill -9 PID
```

---

## 📦 Useful Extras

* [Jekyll Docs](https://jekyllrb.com/docs/)
* [GitHub Pages Docs](https://pages.github.com/)
* [Jekyll Themes](https://pages.github.com/themes/)

---

## ✅ Example Output Paths

| Command        | Output                                       |
| -------------- | -------------------------------------------- |
| `jekyll build` | Creates static files in `_site/`             |
| `jekyll serve` | Runs local server at `http://localhost:4000` |

---
