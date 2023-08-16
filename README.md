# Setup môi trường
- Docker
- Composer


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


