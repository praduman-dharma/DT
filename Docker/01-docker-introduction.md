# Docker Introduction

Docker is a platform that enables developers to automate the deployment of applications inside lightweight, portable containers. Containers package an application and its dependencies together, ensuring consistency across different environments. This introduction will cover the key concepts and components of Docker, including its architecture, benefits, and basic commands.

## Key Concepts
- **Containerization**: The process of encapsulating an application and its dependencies into a container.
- **Images**: Read-only templates used to create containers. Images can be versioned and shared via registries.
- **Containers**: Instances of images that run in isolated environments. Containers can be started, stopped, and deleted as needed.
- **Dockerfile**: A text file that contains instructions for building a Docker image.

## Benefits of Docker
- **Portability**: Docker containers can run on any system that supports Docker, making it easy to move applications between environments.
- **Isolation**: Containers run in their own environments, preventing conflicts between applications.
- **Scalability**: Docker makes it easy to scale applications by adding or removing containers as needed.

## Virtualization vs Containerization
- **Virtualization**: Involves creating virtual machines (VMs) that run a full operating system, including the kernel. Each VM is isolated and has its own resources, which can lead to overhead and inefficiency.
- **Containerization**: Involves running applications in containers that share the host OS kernel. Containers are lightweight and start quickly, making them more efficient than VMs.

### Diagram: Virtualization vs Containerization

```
Virtualization:
+---------------------+
|   Hardware         |
+---------------------+
         |
+---------------------+
| Host OS            |
+---------------------+
         |
+---------------------+
| Hypervisor         |
+---------------------+
   |      |      |
   v      v      v
+-----+ +-----+ +-----+
| VM  | | VM  | | VM  |
+-----+ +-----+ +-----+
|Guest| |Guest| |Guest|
| OS  | | OS  | | OS  |
|App  | |App  | |App  |
+-----+ +-----+ +-----+

Containerization:
+---------------------+
|   Hardware         |
+---------------------+
         |
+---------------------+
| Host OS            |
+---------------------+
         |
+---------------------+
| Docker Engine      |
+---------------------+
   |      |      |
   v      v      v
+---------+ +---------+ +---------+
|Container| |Container| |Container|
|   App   | |   App   | |   App   |
+---------+ +---------+ +---------+
```

**Key Differences:**
- Virtualization uses a hypervisor to run multiple VMs, each with its own OS, leading to more resource usage.
- Containerization uses a single OS kernel, with containers sharing it, making them lightweight and faster to start.

