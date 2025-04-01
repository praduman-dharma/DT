# How to Update Packages

## Update Skype

To update Skype, run the following command:

```bash
snap refresh skype
```

### If You Encounter an Error

If the above command returns an error like "cannot update Skype running pids," follow these steps:

1. Get the process IDs (pids) of the running processes:

    ```bash
    ps -A
    ```

2. Kill the Skype process using the `kill` command. For example:

    ```bash
    kill 10276
    ```

After killing the Skype process, try the `snap refresh skype` command again.

---

## Update Google Chrome

To update Google Chrome, follow these steps:

1. First, update the package list:

    ```bash
    sudo apt-get update
    ```

2. Then, upgrade Google Chrome:

    ```bash
    sudo apt-get --only-upgrade install google-chrome-stable
    ```
    