# Computer market @ Crazyheal Inc.

## Проектирование

### Структура базы данных

- **Пользователи**

Каждый пользователь имеет свою роль (реализовано: admin, user; в будущем планируется добавить роль manager - ответственный за целостность данных и проверку корректности данных, moderator - online помощник, консультат (мб просто реализовать как "Телефон службы поддержки")).

Пользователь с ролью admin не имеет ограничений в функционале.

Пользователь с ролью user не имеет доступ к администрированию приложения.

- **Компьютеры**

- **Комплектующие системного блока**

Т.к. количество устройств компьютера ограничено будет создана таблица для каждого устройства (процессор, видеокарта, etc.) с полями, которые будут соответствовать их основным характеристикам. Также необходимо иметь поле цены и поле доступности (после анализа документов наиактуальнейшей даты от поставщика будет отредактировано поле "доступность" и будет реализована проверка на достпуность при выводе шаблнов/генерации компьютера, если устройство недоступно для заказа, то пользователь не будет иметь возможности его заказать).

Список комплектующих: processor, videocard, motherboard, ram_module, cooler, power_supply, case (корпус), hdd, ssd, audiocard

- **Перефирия**

Устройства для перефирии не будут иметь связей с комплектующими. Они носят чисто индивидуальный характер для каждого пользователя.
 
Список переферийных устройств: mouse, keyboard, monitor.
- **Документы (расчетные чеки, прайс, договор о продаже)**

### Функционал

- **Сбор компьютера**

- **Шаблоны компьютеров**

- **Генерация чека**

- **Email сервис**


### Документы 

## Реализовано

Скоро опишу, влом писать. 

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
