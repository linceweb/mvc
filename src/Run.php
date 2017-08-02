<?php
	
	namespace Mvc;
	use Phroute\Phroute\RouteCollector;
	use Phroute\Phroute\Dispatcher;
	use Illuminate\Database\Capsule\Manager as Capsule;

	class Run {

		public $config;
		public $dir;

		public function _getFolder($folder){
			return array_filter(scandir($folder), function($item){
				return !strstr('..', $item) and !strstr('.', $item);
			});
		}

		public function _getApp(){
			
			$folders = array_filter($this->_getFolder($this->dir), function($item){
				return !strstr('Settings.php', $item) and !strstr('Routes.php', $item) and !strstr('views', $item);
			});

			foreach($folders as $folder){
				$folderFiles = $this->_getFolder($this->dir.'/'.$folder);
				foreach($folderFiles as $file){
					require $this->dir.'/'.$folder.'/'.$file;
				}
			}
		}

		public function boot($dir){

			$this->dir = $dir;
			if(!file_exists($this->dir)){
				mkdir('assets');
				mkdir('assets/imagens');
				mkdir('assets/css');
				mkdir('assets/js');
				$zip = new \ZipArchive;
				if($zip->open(__DIR__.'/app.zip') === TRUE) {
					$zip->extractTo($this->dir);
					$zip->close();
				}
				$this->work();
			} else {
				$this->work();
			}

		}

		public function work(){

			$this->config = require($this->dir.'/Settings.php');
			$this->_getApp();
			$app = new RouteCollector();
			require($this->dir.'/Routes.php');
			
			$capsule = new Capsule;
			$capsule->addConnection($this->config['database']);
			$capsule->setAsGlobal();
			$capsule->bootEloquent();

			$dispatcher = new Dispatcher($app->getData());
			return $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

		}

		public function view($view, $data = []){
			$loader = new \Twig_Loader_Filesystem($this->dir.'/views');
			$twig = new \Twig_Environment($loader);
			echo $twig->render($view.'.twig', $data);
		}

	}
