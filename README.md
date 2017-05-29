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
