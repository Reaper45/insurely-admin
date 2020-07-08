# insurely-admin
Insurely - Sell insurance products.
> Its just an ordinary [Laravel Application](https://laravel.com/) with [tailwindcss](ilwindcss.com) styling nothing fancy. Really!

## Getting started
1. Clone app and install dependencies
```bash
git clone https://github.com/Reaper45/insurely-admin.git

cd insurely-admin/

composer install

yarn install

yarn run dev
```
2. Rename `.env.example` file to `.env`
3. Generate a key for Laravel's encrypter
```bash
php artisan key:generate
```
4. Create the **Database** & in your `.env` set the following variables
```bash
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

# Optional
ADMIN_NAME=
ADMIN_EMAIL=
ADMIN_PASS=
```
5. To create tables & hydrate the DB run:
```bash
php artisan run:migrate --seed
```
6. Run the command to start a development server at `http://127.0.0.1:8000`
```bash 
php artisan artisan serve

#or

docker-compose up
```


## Deployment
Follow [Laravel Docs](https://laravel.com/docs/7.x/deployment) for server configuration

- Remember to correctly specify the environment in your production `.env` file

```bash
APP_ENV=production
```

### Optimization

During deployment make sure that you run the following commands for:
- Optimizing Composer's class autoloader map.

```bash
composer install --optimize-autoloader --no-dev
```
- Optimizing configs loading

```bash
php artisan config:cache
```

*Happy selling insurance* 😃