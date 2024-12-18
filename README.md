# allsoftcorp test zadanie  - poznamkove API
#made using symfony 6.4 and php 8.1
How to:

1.pull repo

make sure you have php 8.1 installed and accessible in PATH variable

2.init sqlite database - in the project folder run this console commands - 
  
  composer install
  
  php bin/console doctrine:database:create

  php bin/console doctrine:migrations:migrate

3.start server
  run by using 

  symfony server:start

4. profit ?

  now you can access the api

  you can test it by running the requests in postman / insomnia or similiar programs

  URL is 127.0.0.1/notes
