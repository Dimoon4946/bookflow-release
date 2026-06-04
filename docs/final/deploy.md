# Инструкция по развёртыванию

## Требования

* Docker Desktop
* Docker Compose

## Получение проекта

```bash
git clone https://github.com/Dimoon4946/bookflow-release.git
```

## Переход в каталог проекта

```bash
cd bookflow-release
```

## Запуск контейнеров

```bash
docker compose up -d
```

## Остановка контейнеров

```bash
docker compose down
```

## Резервное копирование

База данных хранится в Docker Volume.

Для создания резервной копии можно использовать экспорт базы данных через phpMyAdmin.
