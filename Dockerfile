FROM php:8.2-apache

# Copy TOÀN BỘ file từ thư mục máy tính (bao gồm index.php, login.php,...) vào server
COPY . /var/www/html/

# Cấp quyền cho Apache có thể đọc file
RUN chown -R www-data:www-data /var/www/html

# Mở cổng 80
EXPOSE 80