# Setup môi trường
- Docker
- Composer

# Tạo .env
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=base64:AvzKfV+1iu67gYtARQ+oZw+uTTk3wYQ3tpq+dSpbgNM=
    APP_DEBUG=true
    APP_URL=http://localhost
    
    LOG_CHANNEL=stack
    LOG_DEPRECATIONS_CHANNEL=null
    LOG_LEVEL=debug
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=shop
    DB_USERNAME=root
    DB_PASSWORD=123123
    
    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    FILESYSTEM_DRIVER=local
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120
    
    MEMCACHED_HOST=127.0.0.1
    
    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    
    MAIL_MAILER=smtp
    MAIL_HOST=mailhog
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=null
    MAIL_FROM_NAME="${APP_NAME}"
    
    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=false
    
    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_APP_CLUSTER=mt1
    
    MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
    
    JWT_SECRET=RX62s88Ymad0xfbFtG2vfZUXFvueYLuhMtfZhZlJZcKNEXzC2pfZ3sZPrR09Vz1U

# Giả nén file vendor.taz.gz

# Di chuyển tới thư mục docker
- Chạy lệnh docker-compose up

# Di chuyển tới thư mục store
- Chạy lệnh php artisan migrate


# - Api Login
    http://localhost:8000/api/login
    Method : POST
    
    Params example:
    email:user1@example.com
    password:123123

# - Api register
    http://localhost:8000/api/register
    Method : POST

    Params example:
    email:user1@example.com
    password:123123
    username:user1


# Api Store
## - Search
    http://localhost:8000/store/search
    Method : GET

    Params example:
    perPage:10
    page:1
    store_name:coffee shop
    phone:0909123123
    address:HCM

## - Detail
    http://localhost:8000/store/detail/{id}
    Method : GET

    Params example:
    id:1
    
## - Create
    http://localhost:8000/store/create
    Method: POST

    Params example:
    store_name:coffee
    per_page:10
    page:1
    address:H
    phone:09093333333

## - Update
    http://localhost:8000/store/update
    Method: POST

    Params example:
    id:3
    store_name:coffee
    per_page:10
    page:1
    address:H
    phone:09093333333

## - Delete
    http://localhost:8000/store/delete/{id}
    Method: DELETE

    Params example:
    id:3

# Api Product
## - Search
    http://localhost:8000/product/search
    Method : GET

    Params example:
    per_page:10
    page:1
    product_name:coffee shop
    description: coffee shop

## - Detail
    http://localhost:8000/product/detail/{id}
    Method : GET

    Params example:
    id:1

## - Create
    http://localhost:8000/product/create
    Method: POST

    store_id:2
    product_name:Product of store 2 ---1
    description:Product of store 2
    price:2000
    quantity:1

## - Update
    http://localhost:8000/product/update
    Method: POST

    id:1
    store_id:2
    product_name:Product of store 2 ---1
    description:Product of store 2
    price:2000
    quantity:1
    
## - Delete
    http://localhost:8000/product/delete/{id}
    Method: DELETE

    Params example:
    id:3
});


