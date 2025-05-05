# Git Guide

## 1. Introduction to Git

### What is Git?
Git is a **Version Control System (VCS)** that helps track changes in code, allowing multiple developers to collaborate efficiently. It is widely used for software development.

## 2. Git Configuration

### Global Configuration
#### Set Global Username & Email
```sh
git config --global user.name "Your Name"
git config --global user.email "your-email@example.com"
```
#### Check Global Username & Email
```sh
git config --global user.name
git config --global user.email
```
#### Change Global Username & Email
Simply run the set commands again with updated values.

### Local Configuration (Per Repository)
#### Set Local Username & Email
```sh
git config user.name "Your Name"
git config user.email "your-email@example.com"
```
#### Check Local Username & Email
```sh
git config user.name
git config user.email
```

## 3. Initializing a Repository

```sh
git init  # Initializes a new Git repository
```
If the `.git` folder is not visible, enable hidden files.

## 4. Creating and Committing Changes

### Step 1: Add Files to Staging Area
```sh
git add .  # Adds all files to the staging area
```

### Step 2: Commit Changes
```sh
git commit -m "Initial commit"
```

### Step 3: Check Repository Status
```sh
git status  # Shows the current state of the repository
```

## 5. Connecting to a Remote Repository

### Step 1: Add Remote Repository
```sh
git remote add origin <repository-link>
```

### Step 2: Push Changes to Remote
```sh
git push -u origin main  # Pushes code to the main branch
```

## 6. Cloning a Repository

```sh
git clone <repository-link>  # Clones a remote repository to local
```

## 7. Working with Branches

### Why Use Branches?
Branches allow working on new features without affecting the main project.

### List Branches
```sh
git branch  # Lists all branches
```

### Create a New Branch
```sh
git branch <branch-name>  # Creates a new branch
```
Example:
```sh
git branch Testing  # Creates a branch named 'Testing'
```

### Switch to a Branch
```sh
git checkout <branch-name>
```
Example:
```sh
git checkout Testing  # Switches to the 'Testing' branch
```

### Create and Switch to a New Branch in One Command
```sh
git checkout -b <branch-name>
```
Example:
```sh
git checkout -b Testing2  # Creates and switches to 'Testing2' branch
```

## 8. Merging Branches

### Merge a Branch into Main
```sh
git checkout main  # Switch to main branch
git merge <branch-name>  # Merge the specified branch into main
```
Example:
```sh
git merge feature-branch  # Merges 'feature-branch' into main
```

## 9. Pushing Updates After Changes

### Step 1: Check for Changes
```sh
git status  # Identifies modified files
```

### Step 2: Add Changes to Staging Area
```sh
git add .
```

### Step 3: Commit Changes
```sh
git commit -m "Updated feature"
```

### Step 4: Push Changes to Remote Repository
```sh
git push origin main  # Pushes to main branch
```

## 10. Pulling & Fetching Changes

### Fetch Latest Updates
```sh
git fetch  # Retrieves changes without merging
```

### Pull & Merge Changes
```sh
git pull origin main  # Fetches and merges updates from remote
```

## 11. Modifying Last Commit

### Amend the Last Commit
```sh
git commit --amend
```
#### Steps:
1. Run `git commit --amend`
2. Enter insert mode by pressing `i`
3. Modify your commit message
4. Press `ESC`, then type `:x!` to save, or `:q!` to discard changes

## 12. Summary of Common Git Commands

| Command | Description |
|---------|-------------|
| `git init` | Initialize a Git repository |
| `git add .` | Add all files to staging area |
| `git commit -m "message"` | Commit changes |
| `git status` | Check repository status |
| `git branch` | List all branches |
| `git branch <branch-name>` | Create a new branch |
| `git checkout <branch-name>` | Switch to a branch |
| `git checkout -b <branch-name>` | Create and switch to a branch |
| `git merge <branch-name>` | Merge a branch into the current branch |
| `git remote add origin <repo-url>` | Add a remote repository |
| `git push -u origin main` | Push changes to the remote repository |
| `git fetch` | Fetch changes without merging |
| `git pull origin main` | Pull latest changes from the main branch |
| `git clone <repo-url>` | Clone a repository |
| `git commit --amend` | Modify the last commit |

---
This guide provides a comprehensive overview of Git basics, configuration, and workflow. 🚀

