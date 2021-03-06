# Routes

## Categories

Return all categories

    curl http://api.it-beaute.com/categories

Return all categories within one parent category

    curl -g http://api.it-beaute.com/categories?filter[parent_category_id]=1

Return all categories with pagination

    curl -g http://api.it-beaute.com/categories?page=1&perPage=30

Return all categories sorted

    curl -g http://api.it-beaute.com/categories?sort[parent_category_id]=asc

Return one category

    curl http://api.it-beaute.com/categories/1

Create one category

    curl -X POST -H 'Content-Type: application/json' -d '{"parent_category_id": "1"}' http://api.it-beaute.com/categories

Update one category

    curl -X PUT -H 'Content-Type: application/json' -d '{"parent_category_id": "2"}' http://api.it-beaute.com/categories/15

Delete one category

    curl -X DELETE http://api.it-beaute.com/categories/15

## Products

Return all products

    curl http://api.it-beaute.com/products

Return all products in one category

    curl -g http://api.it-beaute.com/products?filter[category_id]=1

Return all products in multiple category

    curl -g 'http://api.it-beaute.com/products?filter[category_id]=in(1,3,5)'

Return one product

    curl http://api.it-beaute.com/products/1

Create one product

    curl -X POST -H 'Content-Type: application/json' -d '{"category_id": "1,3"}' http://api.it-beaute.com/products

Update one product

    curl -X PUT -H 'Content-Type: application/json' -d '{"category_id": "1,2,3"}' http://api.it-beaute.com/products/6

Delete one product

    curl -X DELETE http://api.it-beaute.com/products/1