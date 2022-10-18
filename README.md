# HTTP аутентификация

## Текст задания
### Цель работы
Спроектировать и разработать систему авторизации пользователей на протоколе HTTP

## Ход работы
1) [Пользовательский интерфейс](https://www.figma.com/file/hSWGqjHNCLkkSetXraLjx5/IS_lr_1)
2) Пользовательские сценарии работы
![Пользовательские сценарии работы](пользовательские_сценарии.jpg)
3) API сервера и хореография
/
![lr_1](хореография.png)

4) Структура БД

| id | login | email | password | secret_word |
| ------ | ------ | ------ | ------ | ------ |

- id : INT(11), PRIMARY KEY, AUTO_INCREMENT
(уникальный идентификатор пользователя)
- login : VARCHAR(250), по умолчанию NULL
(логин)
- email: VARCHAR(255), по умолчанию NULL
(почта)
pass: VARCHAR(500), по умолчанию NULL
(хешированный пароль)
- secret_word: VARCHAR(255), по умолчанию NULL
(хешированное секретное слово для восстановления пароля)

5) Алгоритмы
- регистация
![алгоритмы_1](алгоритмы_1.jpg)
- авторизация
![алгоритмы_2](алгоритмы_2.jpg)
- выход

![алгоритмы_3](алгоритмы_3.jpg)
- обновление пароля
![алгоритмы_4](алгоритмы_4.jpg)
- смена пароля
![алгоритмы_5](алгоритмы_5.jpg)

## Примеры HTTP запросов и ответов

## Значимые фрагменты кода
В репозитории представлены все исходные файлы по лабораторной
