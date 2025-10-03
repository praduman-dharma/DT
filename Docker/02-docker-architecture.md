# Docker Architecture

Docker architecture is based on a client-server model, where the Docker client communicates with the Docker daemon (server) to manage containers. The key components of Docker architecture include:

1. **Docker Engine**: The core component that enables containerization. It includes the Docker daemon, REST API, and a command-line interface (CLI) for interacting with the daemon.

2. **Docker Daemon (dockerd)**: The background service that manages Docker containers, images, networks, and volumes. It listens for API requests from the Docker client and handles container lifecycle operations.

- Containerd: An industry-standard core container runtime that manages the complete container lifecycle, including image transfer and storage, container execution and supervision, and low-level storage and network attachments.

3. **Docker CLI**: The command-line interface for interacting with Docker. It allows users to run Docker commands and manage containers, images, and other resources.

4. **Docker Client**: The primary interface for users to interact with Docker. It sends commands to the Docker daemon and receives responses.

### Docker Architecture Diagram

```
+---------------------+
|   Docker Client     |
+---------------------+
         |
         v
+---------------------+
|   Docker Daemon     |
+---------------------+
         |
         v
+---------------------+
|   Docker Images     |
+---------------------+
         |
         v
+---------------------+
|   Docker Containers |
+---------------------+
```

In this architecture, the Docker client communicates with the Docker daemon to manage images and containers. The daemon handles the creation and management of containers based on the images stored in the registry.
