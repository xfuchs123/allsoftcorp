# allsoftcorp test zadanie  - poznamkove API
How to:
1.Download repo

2.init sqlite database - in the project folder run this console commands - 
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

3.start server
run using 
symfony server:start

4. profit ?
now you can access the api
you can test it by running the requests in postman / insomnia or similiar programs
URL is 127.0.0.1/notes
