# Use Ubuntu as the base image as per requirements
FROM ubuntu:22.04

# Avoid user interaction during apt installations
ENV DEBIAN_FRONTEND=noninteractive

# Update package lists and install Apache and PHP
RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Remove the default Apache index.html
RUN rm -f /var/www/html/index.html

# Copy our project files into the container's web root
COPY index.html /var/www/html/
COPY submit.php /var/www/html/
COPY data.json /var/www/html/

# Set correct permissions so Apache (www-data) can write to data.json
RUN chown -R www-data:www-data /var/www/html/ && \
    chmod 666 /var/www/html/data.json

# Expose port 80 for web traffic
EXPOSE 80

# Run Apache in the foreground
CMD ["apachectl", "-D", "FOREGROUND"]
