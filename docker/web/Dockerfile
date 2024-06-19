FROM nginx:alpine

# Remove default configuration
RUN rm /etc/nginx/conf.d/default.conf

# Copy custom configuration
COPY ./docker/web/nginx.conf /etc/nginx/conf.d

# Set working directory
WORKDIR /var/www
