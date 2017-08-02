### 1. Instalar pacote
```
composer require linceweb/mvc dev-master
```

### 2. Criar arquivo index.php
```php
<?php

require('vendor/autoload.php');

// Define Project Folder
define('project_folder', 'app');

// Boilerplate Code
$project = new Mvc\Run;
$project->boot(__DIR__.'/'.project_folder);
function response(){
  return $GLOBALS['project'];
}
```

# Configurações
Dentro da pasta do aplicativo **app** (padrão), vai existir o arquivo **Settings.php** que é onde deve ser configurado as informações básicas da aplicação, como por exemplo a conexão com o banco de dados.


## Conhecendo o diretório da aplicação

### base
Classes que servem como base para outras </br>

### controller
Todos os controllers devem seguir a nomeclatura padrão </br>
**Nome do arquivo:** NomeDoController.php </br>
**Nome da classe:** Controller_NomeDoController </br>

### model
*Um model por padrão deve extender Base_Model* </br>
Todos os models devem seguir a nomeclatura padrão </br>
**Nome do arquivo:** NomeDoModel.php </br>
**Nome da classe:** Model_NomeDoModel </br>

### views
Arquivos de template do Twig. </br>

## Referências
**Rotas:** [https://github.com/mrjgreen/phroute](https://github.com/mrjgreen/phroute) </br>
**Twig:** [https://twig.sensiolabs.org/doc/2.x/](https://twig.sensiolabs.org/doc/2.x/) </br>
**Eloquent:** [https://github.com/illuminate/database](https://github.com/illuminate/database) </br>
**Laravel:** [https://laravel.com/docs/5.4](https://laravel.com/docs/5.4) 
