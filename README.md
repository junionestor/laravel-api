
# Setup Docker Projeto Laravel 9

### Passo a passo
Clone Repositório
```sh
git clone https://github.com/junionestor/laravel-api.git
```

Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=APILaravel
APP_URL=http://localhost:8989

DB_CONNECTION=pgsql
DB_HOST=nome_do_container
DB_PORT=5430
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acessar o container
```sh
docker exec --user="root" -it nome-do-container bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```


Acessar o projeto
[http://localhost:8989](http://localhost:8989)
