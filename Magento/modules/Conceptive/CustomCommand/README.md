# Conceptive_CustomCommand

This module adds a **custom CLI command** to Magento 2 using Symfony's console component.

---

## 📌 What is a Custom CLI Command?

Magento 2 allows you to register your own command-line tools (like `bin/magento cache:flush`) to perform custom tasks via terminal.

This module registers a new command:  
```

bin/magento conceptive\:demo

````

---

## 📁 Key Files

### `etc/di.xml`

Declares your command class and injects it into Magento's CLI command pool using `Magento\Framework\Console\CommandListInterface`.

```xml
<type name="Magento\Framework\Console\CommandListInterface">
    <arguments>
        <argument name="commands" xsi:type="array">
            <item name="demo_command" xsi:type="object">Conceptive\CustomCommand\Console\Command\Demo</item>
        </argument>
    </arguments>
</type>
````

---

### `Console/Command/Demo.php`

Defines the behavior of your custom command. Extends Symfony’s `Command` class and uses:

* `configure()` – Registers command name, description, and options.
* `execute()` – Contains command logic, progress bar, styled output, and exception handling.

#### Command Details:

| Feature        | Description                                       |
| -------------- | ------------------------------------------------- |
| Command Name   | `conceptive:demo`                                 |
| Option         | `--name` (prints provided name if passed)         |
| Progress Bar   | Yes (10 steps with 1-second delay per step)       |
| Output Styles  | info, comment, question, error                    |
| Error Handling | Simulates random error using `LocalizedException` |

---

## 🧪 Example Usage

### Basic:

```bash
bin/magento conceptive:demo
```

### With Option:

```bash
bin/magento conceptive:demo --name="Praduman"
```

---

## 🧠 Output Format

The command prints messages using different Symfony console styles:

* `<info>` – Green (Success messages)
* `<comment>` – Yellow (Warnings/Comments)
* `<question>` – Cyan background (Prompts)
* `<error>` – Red background (Errors)

It also shows a progress bar and randomly throws a simulated error.

---

## 📚 References

* [Magento DevDocs – Custom CLI Commands](https://developer.adobe.com/commerce/php/development/cli-commands/custom/)
* [YouTube Tutorial – How to Create Magento 2 Console Command](https://youtu.be/jKqvYnl7-kI?si=vBWaSGjaHJa3H1ZI)

---