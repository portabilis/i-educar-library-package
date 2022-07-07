# i-Educar Biblioteca (depreciado)

## Instalação

Para adicionar este repositório ao i-Educar execute os comandos abaixo na raiz do repositório principal do i-Educar:

```
git clone git@github.com:portabilis/i-educar-library.git packages/portabilis/i-educar-library

# (Docker) docker-compose exec php composer plug-and-play
composer plug-and-play:update

# (Docker) docker-compose exec php artisan migrate
php artisan migrate
```
