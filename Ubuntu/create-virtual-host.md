# Create Virtual Host for Custom URL on Local Project

## Reference Link  
You can follow this [YouTube tutorial](https://youtu.be/6Guk-lv7QJQ?si=ItxBKtdji5KUw1Rs) for a visual guide.

---

## Step 1: Edit `/etc/hosts` File  

Add your custom URL at the bottom of the file:

```sh
127.0.0.1    custom-url
```

**Example:**
```sh
127.0.0.1    project.local
```

---

## Step 2: Create a New Configuration File in `/etc/apache2/sites-available/`

Create a new configuration file named `custom-url.conf`. The file name will follow this format:

**Example:**
```sh
project.local.conf
```

Now, copy the contents from `000-default.conf` into your newly created file.

### Changes to Make in the Created File:

1. **ServerName**: Uncomment the `ServerName` directive and replace with your custom URL.
   
   **Example:**
   ```sh
   ServerName project.local
   ```

2. **DocumentRoot**: Set the `DocumentRoot` to the path of your project directory.

   **Example:**
   ```sh
   DocumentRoot /var/www/html/projectLocal
   ```

---

## Step 3: Enable Your Site

Run the following command to enable your site:

```sh
sudo a2ensite custom-url.conf
```

**Example:**
```sh
sudo a2ensite project.local.conf
```

After running this command, your configuration file will appear in `/etc/apache2/sites-enabled/`.

**Example:**
```sh
/etc/apache2/sites-enabled/project.local.conf
```

---

## Step 4: Restart Apache

To apply the changes, restart Apache:

```sh
sudo service apache2 restart
```

---

## Note: 

### To Disable the Site
If you wish to disable the site later, use:

```sh
sudo a2dissite custom-url.conf
```

**Example:**
```sh
sudo a2dissite project.local.conf
```
