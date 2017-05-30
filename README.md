# index.php
```php
// Define Project Folder
define('project_folder', 'app');

// Boilerplate Code
$project = new Mvc\Run;
$project->boot(__DIR__.'/'.project_folder);
function response(){
  return $GLOBALS['project'];
}
```
## Diretório da aplicação
```php
---- base
---- controller
---- extension
---- model
---- views
```

## Referências
##### Rotas: [https://github.com/mrjgreen/phroute](https://github.com/mrjgreen/phroute)
##### Twig: [https://twig.sensiolabs.org/doc/2.x/](https://twig.sensiolabs.org/doc/2.x/)
##### Eloquent: [https://github.com/illuminate/database](https://github.com/illuminate/database)
##### Laravel: [https://laravel.com/docs/5.4](https://laravel.com/docs/5.4)
