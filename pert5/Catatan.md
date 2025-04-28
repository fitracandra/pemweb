**Proses API**  
- docker exec -it pemweb bash 
-  composer create-project --prefer-dist raugadh/fila-starter . 

**src/.env**        

APP_NAME="API"
APP_ENV=local
APP_KEY=base64:jOu5p97BvUzjbTp89YXf/A00xEj2ATUdPJ1z4FNfOwc=
APP_DEBUG=true
APP_TIMEZONE='Asia/Jakarta'
APP_URL=http://localhost
ASSET_URL=http://localhost
DEBUGBAR_ENABLED=false
ASSET_PREFIX=   

DB_CONNECTION=mariadb
DB_HOST=db_pemweb
DB_PORT=3306
DB_DATABASE=fdb_pemweb
DB_USERNAME=root
DB_PASSWORD=p455w0rd    

**Balik ke terminal dan ketikan**   
- rm -rf *  
- rm -rf.*  
- chown -R www-data:www-data storage/*  

**setelah edit env**    
- php artisan migrate   
- php artisan migrate:fresh 
- php artisan db:seed --force  
- php artisan shield:generate --all 
- php artisan project:init  
- chmod 777 -R storage/* && chmod 777 bootstrap/*   

- buat model Client dan Product  
- buat make:controller Api/ProductApiController 
- make:middleware ClientAuth    

**balik ke VScode** 
- isi migration dan modelnya,controller,di routes buat file api.php 
- lalu php artisan migrate,php artisan make:fillament-resource 


