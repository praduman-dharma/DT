# How to Install Elasticsearch for Magento 2 on Ubuntu

> 🔗 **Reference:** [DigitalStartup - How to Install and Setup Elasticsearch](https://digitalstartup.co.uk/t/how-to-install-and-setup-elasticsearch-for-magento-2-ubuntu/841)

---

## 📥 Step 1: Download the Debian Package

Download the Elasticsearch `.deb` package and its checksum:

```bash
wget https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-7.6.0-amd64.deb
wget https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-7.6.0-amd64.deb.sha512
```

Verify the integrity of the downloaded package:

```bash
shasum -a 512 -c elasticsearch-7.6.0-amd64.deb.sha512
```

---

## 📦 Step 2: Install Elasticsearch

Install the package using `dpkg`:

```bash
sudo dpkg -i elasticsearch-7.6.0-amd64.deb
```

---

## ⚙️ Step 3: Enable and Start the Service

Reload systemd daemon and enable Elasticsearch on startup:

```bash
sudo /bin/systemctl daemon-reload
sudo /bin/systemctl enable elasticsearch.service
```

Start the Elasticsearch service:

```bash
sudo systemctl start elasticsearch
```

---

## ✅ Step 4: Test Elasticsearch

You can test if Elasticsearch is running with:

```bash
curl -X GET 'http://localhost:9200'
```

If `curl` is not installed, simply visit the following URL in your browser:

```
http://localhost:9200
```

You should see a JSON response containing version details and status.

---

🎉 Elasticsearch is now installed and running on your system, ready to be used with Magento 2!
