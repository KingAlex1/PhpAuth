Настройка проекта

1. Пример настройки файл Config.php находится в файле config.example.php,
файл Config.php поместите в директорию core
2. Создайте таблицу users 
    CREATE TABLE users
    (
      id INT PRIMARY KEY AUTO_INCREMENT,
      login VARCHAR(255),
      password VARCHAR(255),
      name VARCHAR(255),
      age INT,
      description VARCHAR(255),
      photo VARCHAR(255)
    );
3. Запустите сервер   
4. Примеры SQL запросов в папке SQL
5. Для создания БД используйте миграции (миграции находятся в папке migration)
6. Картинки сохраняются в директорию photos
7. Приятного использования. 