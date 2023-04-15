<p align="center">
<a href="https://github.com/g3ru1a/mangadb-api/releases"><img src="https://img.shields.io/github/v/release/g3ru1a/mangadb-api?label=Latest%20Release" alt="badge"></a>
<a href="https://github.com/g3ru1a/mangadb-api/blob/main/LICENSE"><img src="https://img.shields.io/github/license/g3ru1a/mangadb-api?label=License" alt="badge"></a>
<a href="https://github.com/g3ru1a/mangadb-api/stargazers"><img src="https://img.shields.io/github/stars/g3ru1a/mangadb-api?label=Stars" alt="badge"></a>

[//]: # (<a href="#"><img src="#" alt="badge"></a>)
</p>

# MangaDB API

MangaDB API is a powerful RESTful API designed to provide comprehensive data and metadata about manga volumes, series, staff, and publishers. With MangaDB API, you can collect and curate manga-related data, making it easier to build powerful applications and services for manga enthusiasts.

## Documentation

You can find the API docs [here][docs-url].

## Installation

### Prerequisites
Before proceeding with the installation, ensure that you have Docker installed in your system.
You can install the latest version of Docker by following the instructions given in [the official Docker documentation][docker-docs].

### Setup
To set up the project, follow the steps below:

1. Clone the repository.

```bash
$ git clone https://github.com/g3ru1a/mangadb-api
```

2. Install the composer dependencies using the following command in your terminal:
```bash
$ docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```

3. Copy `.env.example` to `.env`.

```bash
$ cp .env.example .env
```
- Generate the app key:
```bash
$ php artisan key:generate
```
- Or within docker:

```bash
$ docker exec -d <container_name> php artisan key:generate
```

4. Set the `WWWGROUP` and `WWWUSER` to your user ID, if it's not `1000`, in the `.env` file.

```text
WWWGROUP=1000
WWWUSER=1000
```

5. Set the database name, user, and password you want in the `.env` file.

```text
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

6. Add your S3 information in the `.env` file.

```text
AWS_ACCESS_KEY_ID=<your-access-key>
AWS_SECRET_ACCESS_KEY=<your-secret-access-key>
AWS_DEFAULT_REGION=<your-region>
AWS_BUCKET=<your-bucket>
```

7. Add your Mailer information in the `.env` file.

```text
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=<username>
MAIL_PASSWORD=<password>
MAIL_ENCRYPTION=tls
```


8. Set your image_cdn URL in the `.env` file.

```text
IMAGE_CDN_URL="https://cdn.yourwebsite.com/"
```

9. Run Sail using the following command:

```bash
$ ./vendor/bin/sail up
```
Run migrations using the following command:
```bash
$ php artisan migrate:fresh
```
If you want to run migrations using Docker, use the following command:

```bash
$ docker exec -d <container_name> php artisan migrate:fresh
```

### Troubleshooting

Below is a list of common issues:

- If you encounter permission issues for the logs folder, check [this issue on StackOverflow][stackoverflow-issue].

## Contributing

When contributing to this repository, please first discuss the change you wish to make via [github discussions][github-discussions-page],
before making a change.

Please note we have a [code of conduct][coc], please follow it in all your interactions with the project.

## Code of Conduct

In order to ensure that the MangaDB community is welcoming to all, please review and abide by the [Code of Conduct][coc].

## Security Vulnerabilities

If you discover a security vulnerability within MangaDB, please DM Gerula on Twitter [@g3ru1a][g3-twitter] or on [Discord][discord-invite]. All security vulnerabilities will be promptly addressed.

## License

The MangaDB is open-sourced software licensed under the [LGPL-3.0](LICENSE).

[docs-url]: https://docs.manga-db.com
[docker-docs]: https://docs.docker.com/get-docker/
[stackoverflow-issue]: https://stackoverflow.com/questions/50552970/laravel-docker-the-stream-or-file-var-www-html-storage-logs-laravel-log-co
[github-discussions-page]: https://github.com/g3ru1a/mangadb-api/discussions
[coc]: /CODE_OF_CONDUCT.md
[g3-twitter]: https://twitter.com/g3ru1a
[discord-invite]: https://discord.gg/gheM6fn9DN
