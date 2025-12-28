FROM php:8.2-apache

# Copy file login.php vào thư mục chạy web của server
COPY login.php /var/www/html/

# Mở cổng 80 để truy cập từ ngoài
EXPOSE 80