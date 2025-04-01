# How to Import and Export Database

## Import Database

### Step 1: Connect to MySQL
Use the following command to connect to your MySQL database:

```sh
mysql -u root1 -p -S /var/run/mysqld/mysqld.sock
```

### Step 2: Select the Database
To select the database you want to import data into, run:

```sql
USE Databasename;
```

**Example:**
```sql
USE test;
```

### Step 3: Import Database
Import the database by specifying the full path to the `.sql` file:

```sql
SOURCE /path/to/your/file.sql;
```

**Example:**
```sql
SOURCE /var/www/html/project-name/project_database.sql;
```

---

## Export Database

### Step 1: Export Database Using `mysqldump`
To export a database, run:

```sh
mysqldump databasename > file_name.sql
```

**Example:**
```sh
mysqldump project-name > project-name_backup.sql
```

### Step 2: Export from a Remote Server
If the database is on a remote server, use:

```sh
mysqldump -h localhost -u root -p project-name > project-name_backup.sql
```

The exported `.sql` file will be generated in the directory where you ran the `mysqldump` command.

---

## Using WAMP for Database Import/Export

### Step 1: Open Command Prompt in the MySQL Bin Directory
Navigate to the directory where MySQL is installed:

```sh
C:\wamp64\bin\mysql\mysql8.0.27\bin
```

Then, connect to MySQL:

```sh
mysql -u root -p -h localhost
```

### Step 2: Select Database
To select a database, run:

```sh
mysql.exe -u username -p -D databasename
```

**Example:**
```sh
mysql.exe -u root -p -D project-database
```

### Step 3: Import Database Using `SOURCE`
To import a `.sql` file, use the `SOURCE` command:

```sql
SOURCE /path/to/your/file.sql;
```

**Example:**
```sql
SOURCE C:/wamp64/www/project-name/db_backup.sql;
```

**Note:** Don't enclose folder paths in quotation marks (" ").
