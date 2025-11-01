# Instalasi

## Langkah-langkah Instalasi

1. **Clone repository**

    ```bash
    git clone https://github.com/aqwamhm/fbs_tech_test.git
    cd fbs_tech_test
    ```

2. **Install dependencies**

    ```bash
    composer install
    ```

3. **Konfigurasi environment**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Setup database**

    - Buat database baru
    - Edit file `.env` dan sesuaikan konfigurasi database

5. **Jalankan migration**

    ```bash
    php artisan migrate
    ```

6. **Link storage**

    ```bash
    php artisan storage:link
    ```

7. **Jalankan aplikasi**
    ```bash
    php artisan serve
    ```

Aplikasi akan berjalan di `http://localhost:8000`
