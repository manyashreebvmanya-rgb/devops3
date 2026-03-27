# Dockerized Apache Form Project

This project fulfills the requirements of building and deploying a Form-Based Web Application using Apache and Docker.

## 🚀 Objective
1. Create a simple HTML form (`index.html`).
2. Capture user input using a PHP backend (`submit.php`).
3. Store the submitted data locally in a JSON file (`data.json`).
4. Containerize the application using Docker and an Apache/PHP environment.

## 🛠️ Technologies Used
* **Frontend:** HTML, CSS
* **Backend:** PHP
* **Storage:** JSON (`data.json`)
* **Infrastructure:** Docker, Ubuntu 22.04 base image, Apache2

## 📦 How to Run

1. **Build the Docker Image:**
   ```bash
   docker build -t form-app .
   ```

2. **Run the Docker Container:**
   ```bash
   docker run -d -p 8080:80 form-app
   ```

3. **Access the Application:**
   Open your browser and navigate to:
   👉 **http://localhost:8080**

## 📂 Project Structure
* `index.html`: The frontend form that captures Name, Email, and Phone.
* `submit.php`: The backend script that processes form data and appends it to `data.json`.
* `data.json`: The storage file containing all user entries in JSON format.
* `Dockerfile`: The container specification, detailing the Ubuntu base image, Apache+PHP installation, and file permission configurations.
