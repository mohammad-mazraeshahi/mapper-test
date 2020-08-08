# Mapper Project

## How to use:

- clone docker compose
```bash
git clone https://github.com/mohammad-mazraeshahi/mapper-docker.git
```

- run docker compose
```bash
cd mapper-docker
docker-compose up -d
```

- go to src directory
```bash
cd ../src
```

- clone this project
```bash
git clone https://github.com/mohammad-mazraeshahi/mapper-test.git .
```

- config environment variables
```bash
cp .env.example .env
```

- migration and seed database
```bash
docker-composer --rm artisan migrate --seed
```

- run unit test
```bash
 ./vendor/bin/phpunit
```


---


- Restful API Document
```
https://documenter.getpostman.com/view/3771240/T1LJk8RW
```
