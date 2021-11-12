# Setup
- Tạo 2 folder **storage\product** và **storage\parent_product** trong public
- Chuyển .env.example sang .env
- Chạy lệnh:
```
composer install
php artisan storage:link
php artisan migrate
php artisan db:seed
php artisan serve
```

---

# Cách chạy với docker
- Chuyển DOCKER=false sang DOCKER=true trong .env

```bash
docker-compose up -d
```

- Chạy câu lệnh sau để install vendor

```bash
docker-compose run --rm composer install
```

---

# Các lệnh khác
- Các lệnh khác dùng như bình thường, thay `php` thành `./laravel.sh` hoặc `docker-compose run --rm ` rồi viết tiếp

VD:
```bash
./laravel.sh artisan migrate
```