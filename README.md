# ISPManager PHP API

An English documentation is not ready, please use Google Translator

Этот код - попытка накидать клиент для API панели управления сервером ISPManager на PHP. В моем случае - я использую DNS хостинг, поэтому сделал все под себя (только управление ДНС). Однако, вы без труда, разбереретесь как напрогать классы для управления определенным разделом этой панели. Если у вас есть вопросы, с удовольствием на них отвечу.

### Использование

#### Установка:

```bash
composer require nagnit4enko/ispmanager-api
```

#### Подготовка сервера и пользователя

```php
include 'vendor/autoload.php';

$ispManager = new \IspManager\IspManager();
$result = $ispManager
      ->setLang('ru')
      ->connectToServer(new \IspManager\Server\Server('url-to-server', 1500))
      
      // Авторизация для получения токена в последующих запросах для авторизации будет передаваться токен либо использовать credentials о нем ниже
      ->addNewEvent(new \IspManager\Methods\Auth\Auth('login to server', 'password'))
      
      // Либо можно использовать вот такой способ авторизации но тогда логин и пароль будут передаваться при каждом запросе
      ->credentials(new \IspManager\Credentials\Credentials('login to server', 'password'))
      
      ->execute();
      
if (!isset($result['success'])) {
   throw new \Exception('Не удалось соединиться с сервером. Детали ошибки: '.$result['error']);
}
```
#### Добавление нового домена
```php
$result = $ispManager->addNewEvent(new \IspManager\Methods\WebDomain\Add('test.ru'))
      ->execute();
```
