# Personal Portfolio – Laravel 12 + PrimeVue + Docker + PostgreSQL

**Personal Portfolio** is a modern full-stack application developed by [Jefferson0k](https://github.com/Jefferson0k), built with **Laravel 12**, **PrimeVue** for the frontend UI, and containerized using **Docker** with **PostgreSQL** as the database.

🔗 Repository: [https://github.com/Jefferson0k/Portafolio.git](https://github.com/Jefferson0k/Portafolio.git)

---

## 🧰 Prerequisites

- Docker and Docker Compose  
- PHP >= 8.1 (if running outside Docker)  
- Composer  
- Node.js and npm  

---

## 🚀 Installation (Using Docker)

1. Clone the repository:

    ```bash
    git clone https://github.com/Jefferson0k/Portafolio.git
    cd Portafolio
    ```

2. Copy the environment file:

    ```bash
    cp .env.example .env
    ```

3. Start Docker containers:

    ```bash
    docker-compose up -d
    ```

4. Install PHP dependencies inside the container:

    ```bash
    docker-compose exec app composer install
    ```

5. Install frontend dependencies:

    ```bash
    npm install
    ```

6. Generate application key:

    ```bash
    docker-compose exec app php artisan key:generate
    ```

7. Configure your database settings in `.env` file.

8. Run migrations:

    ```bash
    docker-compose exec app php artisan migrate
    ```

9. Build frontend assets:

    ```bash
    npm run dev
    ```

10. (Optional) Access your application via the configured Docker ports.

---

## 🎨 UI Framework

The frontend leverages **PrimeVue**, providing a rich collection of responsive and customizable Vue.js components.

---

## 👨‍💻 Author

Developed and maintained by:  
**Jefferson0k**  
🔗 [GitHub Profile](https://github.com/Jefferson0k)

---

## 📄 License

> This project is licensed under the  
> **Creative Commons Attribution-NonCommercial 4.0 International (CC BY-NC 4.0)** license.

You are permitted to study, copy, and modify this project strictly for **non-commercial** purposes.  
Commercial use, redistribution, or reproduction without explicit written permission from the author is strictly prohibited.

Please refer to the [LICENSE](./LICENSE) file for full legal details.

---

✨ _Thank you for visiting my portfolio project!_
