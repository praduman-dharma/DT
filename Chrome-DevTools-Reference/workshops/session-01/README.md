# Chrome DevTools Reference
## A Comprehensive Learning and Reference Guide

A professional-grade structured reference for Chrome DevTools covering all major panels, debugging techniques, and performance analysis tools. This is a complete learning lab combining documentation with hands-on demos.

---

### 📚 Official References

This reference draws from and builds upon the official Chrome DevTools documentation:

- **Official Chrome DevTools Documentation:** https://developer.chrome.com/docs/devtools/overview
- **Chrome DevTools Video Playlist:** https://youtube.com/playlist?list=PLRKyZvuMYSIPFWe4ruCd7r9BozthKyXHB

For the most up-to-date information and official guidance, please refer to the official Chrome DevTools documentation.

---

## Table of Contents

1. [Introduction](#introduction)
2. [Quick Start](#quick-start)
3. [DevTools Keyboard Shortcuts](#devtools-keyboard-shortcuts)
4. [Panel-by-Panel Breakdown](#panel-by-panel-breakdown)
5. [Learning Paths](#learning-paths)
6. [Documentation & Demos](#documentation--demos)
7. [Advanced Topics](#advanced-topics)

---

## Introduction

Chrome DevTools is a set of web authoring and debugging tools built into Google Chrome. It provides developers with deep access to the internals of their web applications, allowing them to:

- **Inspect and Modify** DOM elements and CSS in real-time
- **Debug JavaScript** with breakpoints, stepping, and call stack analysis
- **Monitor Network** activity including XHR/Fetch requests
- **Analyze Performance** with Lighthouse audits and coverage reports
- **Override Assets** locally for testing without deploying
- **Analyze Code Coverage** to identify unused CSS and JavaScript

This reference provides comprehensive documentation and working examples for each major panel.

---

## Quick Start

### Opening DevTools

| Platform | Keys |
|----------|------|
| **Windows/Linux** | `Ctrl + Shift + I` or `F12` or `Ctrl + Shift + J` |
| **macOS** | `Cmd + Option + I` or `Fn + F12` or `Cmd + Option + J` |

**Key Mnemonic:**
- **C** = CSS (Ctrl/Cmd + Shift + C) → Elements Panel
- **J** = JavaScript (Ctrl/Cmd + Shift + J) → Console Panel
- **I** = Choice (Ctrl/Cmd + Shift + I) → Your choice
- **Ctrl + ]** or **Cmd + ]** = To switch between tabs in Chrome DevTools panels (like Elements, Console, Network)

### First Steps

1. Open any webpage
2. Press `F12` to open DevTools
3. Start with the **Elements** tab to inspect HTML structure
4. Use **Console** to execute JavaScript and debug
5. Try **Sources** tab to set breakpoints and debug scripts
6. Use **Network** tab to monitor requests
7. Check **Lighthouse** for performance audits

---

## DevTools Keyboard Shortcuts

### General

| Action | Windows/Linux | macOS |
|--------|---------------|-------|
| Open/Close DevTools | `F12` or `Ctrl+Shift+I` | `Cmd+Option+I` |
| Open Console | `Ctrl+Shift+J` | `Cmd+Option+J` |
| Inspect Element | `Ctrl+Shift+C` | `Cmd+Shift+C` |
| Command Menu | `Ctrl+Shift+P` | `Cmd+Shift+P` |
| Restore default zoom level | `Ctrl+0` | `Cmd+0` |

### Elements Panel

| Action | Keys |
|--------|------|
| Search nodes | `Ctrl+F` |
| Hide element | `H` |
| Copy CSS selector | Right-click > Copy > Copy Selector |
| Copy XPath | Right-click > Copy > Copy XPath |
| Copy JS path | Right-click > Copy > Copy JS Path |

### Console Panel

| Action | Keys |
|--------|------|
| Clear console | `Ctrl+L` |
| Search logs | `Ctrl+F` |
| Copy output | Select text and `Ctrl+C` |

---

## Panel-by-Panel Breakdown

### 1. **Elements Panel** 
Inspect and manipulate the DOM structure

- View and edit HTML
- Live CSS editing
- DOM manipulation
- Element measurements with rulers
- Node search (CSS, XPath, text)
- Breakpoints on DOM changes
- Event listener inspection
- Accessibility tree view

**[Full Documentation](elements/session-01-elements.md)** | **[Demos](elements/)**

### 2. **Console Panel**
JavaScript execution environment and logging

- Execute JavaScript directly
- Console API methods (log, error, warn, info)
- Styling console output
- Console utility functions (`$()`, `$$()`, `debug()`, etc.)
- Event monitoring and tracking
- Performance profiling
- Message filtering by level and URL
- Group and organize logs

**[Full Documentation](console/session-01-console.md)** | **[Demos](console/)**

---


## Quick Reference

### DOM Inspection
- **Inspect element**: Right-click element → Inspect
- **Search DOM**: Ctrl+F in Elements panel
- **Copy selector**: Right-click element → Copy > Copy Selector
- **Show rulers**: Ctrl+Shift+P → "Show rulers on hover"

### Console Utilities
- **`$0`** → Currently selected element
- **`$(selector)`** → querySelector
- **`$$(selector)`** → querySelectorAll
- **`debug(fn)`** → Pause on function call
- **`getEventListeners(el)`** → Get all event listeners
- **`monitorEvents(el)`** → Monitor element events

---
