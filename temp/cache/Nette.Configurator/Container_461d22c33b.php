<?php
// source: C:\Users\Jan Cimler\OneDrive\Projekty\tynim\app/config/config.neon 
// source: C:\Users\Jan Cimler\OneDrive\Projekty\tynim\app/config/config.local.neon 

class Container_461d22c33b extends Nette\DI\Container
{
	protected $meta = array(
		'types' => array(
			'Nette\Object' => array(
				array(
					'application.application',
					'application.linkGenerator',
					'database.default.connection',
					'database.default.structure',
					'database.default.context',
					'http.requestFactory',
					'http.request',
					'http.response',
					'http.context',
					'security.user',
					'session.session',
					'27_App_Forms_BlockForm',
					'28_App_Forms_ContactForm',
					'29_App_Forms_ContactSettingForm',
					'30_App_Forms_FooterForm',
					'31_App_Forms_FormFactory',
					'32_App_Forms_MenuForm',
					'33_App_Forms_SignForm',
					'34_App_Forms_SliderForm',
					'35_App_Forms_UserForm',
					'36_App_Forms_WebconfigForm',
					'37_App_Model_BlockRepository',
					'38_App_Model_FooterPicRepository',
					'40_App_Model_MenuRepository',
					'41_App_Model_SliderPicRepository',
					'42_App_Model_SliderSettingRepository',
					'43_App_Model_UserRepository',
					'44_App_Model_WebconfigRepository',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'container',
				),
			),
			'Nette\Application\Application' => array(1 => array('application.application')),
			'Nette\Application\IPresenterFactory' => array(
				1 => array('application.presenterFactory'),
			),
			'Nette\Application\LinkGenerator' => array(1 => array('application.linkGenerator')),
			'Nette\Caching\Storages\IJournal' => array(1 => array('cache.journal')),
			'Nette\Caching\IStorage' => array(1 => array('cache.storage')),
			'Nette\Database\Connection' => array(
				1 => array('database.default.connection'),
			),
			'Nette\Database\IStructure' => array(
				1 => array('database.default.structure'),
			),
			'Nette\Database\Structure' => array(
				1 => array('database.default.structure'),
			),
			'Nette\Database\IConventions' => array(
				1 => array('database.default.conventions'),
			),
			'Nette\Database\Conventions\DiscoveredConventions' => array(
				1 => array('database.default.conventions'),
			),
			'Nette\Database\Context' => array(1 => array('database.default.context')),
			'Nette\Http\RequestFactory' => array(1 => array('http.requestFactory')),
			'Nette\Http\IRequest' => array(1 => array('http.request')),
			'Nette\Http\Request' => array(1 => array('http.request')),
			'Nette\Http\IResponse' => array(1 => array('http.response')),
			'Nette\Http\Response' => array(1 => array('http.response')),
			'Nette\Http\Context' => array(1 => array('http.context')),
			'Nette\Bridges\ApplicationLatte\ILatteFactory' => array(1 => array('latte.latteFactory')),
			'Nette\Application\UI\ITemplateFactory' => array(1 => array('latte.templateFactory')),
			'Latte\Object' => array(array('nette.latte')),
			'Latte\Engine' => array(array('nette.latte')),
			'Nette\Mail\IMailer' => array(1 => array('mail.mailer')),
			'Nette\Application\IRouter' => array(1 => array('routing.router')),
			'Nette\Security\IUserStorage' => array(1 => array('security.userStorage')),
			'Nette\Security\User' => array(1 => array('security.user')),
			'Nette\Http\Session' => array(1 => array('session.session')),
			'Tracy\ILogger' => array(1 => array('tracy.logger')),
			'Tracy\BlueScreen' => array(1 => array('tracy.blueScreen')),
			'Tracy\Bar' => array(1 => array('tracy.bar')),
			'App\Controller\FileController' => array(
				1 => array('25_App_Controller_FileController'),
			),
			'App\Controller\MenuController' => array(
				1 => array('26_App_Controller_MenuController'),
			),
			'App\Forms\BlockForm' => array(1 => array('27_App_Forms_BlockForm')),
			'App\Forms\ContactForm' => array(1 => array('28_App_Forms_ContactForm')),
			'App\Forms\ContactSettingForm' => array(
				1 => array('29_App_Forms_ContactSettingForm'),
			),
			'App\Forms\FooterForm' => array(1 => array('30_App_Forms_FooterForm')),
			'App\Forms\FormFactory' => array(1 => array('31_App_Forms_FormFactory')),
			'App\Forms\MenuForm' => array(1 => array('32_App_Forms_MenuForm')),
			'App\Forms\SignForm' => array(1 => array('33_App_Forms_SignForm')),
			'App\Forms\SliderForm' => array(1 => array('34_App_Forms_SliderForm')),
			'App\Forms\UserForm' => array(1 => array('35_App_Forms_UserForm')),
			'App\Forms\WebconfigForm' => array(
				1 => array('36_App_Forms_WebconfigForm'),
			),
			'App\Model\BaseRepository' => array(
				1 => array(
					'37_App_Model_BlockRepository',
					'38_App_Model_FooterPicRepository',
					'40_App_Model_MenuRepository',
					'41_App_Model_SliderPicRepository',
					'42_App_Model_SliderSettingRepository',
					'43_App_Model_UserRepository',
					'44_App_Model_WebconfigRepository',
				),
			),
			'App\Model\BlockRepository' => array(
				1 => array('37_App_Model_BlockRepository'),
			),
			'App\Model\FooterPicRepository' => array(
				1 => array('38_App_Model_FooterPicRepository'),
			),
			'App\Model\LangRepository' => array(
				1 => array('39_App_Model_LangRepository'),
			),
			'App\Model\MenuRepository' => array(
				1 => array('40_App_Model_MenuRepository'),
			),
			'App\Model\SliderPicRepository' => array(
				1 => array('41_App_Model_SliderPicRepository'),
			),
			'App\Model\SliderSettingRepository' => array(
				1 => array('42_App_Model_SliderSettingRepository'),
			),
			'Nette\Security\IAuthenticator' => array(
				1 => array('43_App_Model_UserRepository'),
			),
			'App\Model\UserRepository' => array(
				1 => array('43_App_Model_UserRepository'),
			),
			'App\Model\WebconfigRepository' => array(
				1 => array('44_App_Model_WebconfigRepository'),
			),
			'Dibi\Connection' => array(1 => array('connection')),
			'App\AdminModule\Presenters\SignPresenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
				),
			),
			'App\FrontendModule\Presenters\BasePresenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.14',
				),
			),
			'Nette\Application\UI\Presenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.14',
				),
			),
			'Nette\Application\UI\Control' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.14',
				),
			),
			'Nette\Application\UI\PresenterComponent' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.14',
				),
			),
			'Nette\ComponentModel\Container' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.14',
				),
			),
			'Nette\ComponentModel\Component' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.14',
				),
			),
			'Nette\Application\IPresenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
				),
			),
			'ArrayAccess' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.14',
				),
			),
			'Nette\Application\UI\IStatePersistent' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.14',
				),
			),
			'Nette\Application\UI\ISignalReceiver' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.14',
				),
			),
			'Nette\ComponentModel\IComponent' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.14',
				),
			),
			'Nette\ComponentModel\IContainer' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.14',
				),
			),
			'Nette\Application\UI\IRenderable' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.14',
				),
			),
			'App\AdminModule\Presenters\BlockContentPresenter' => array(array('application.1')),
			'App\AdminModule\Presenters\BlockPresenter' => array(array('application.2')),
			'App\AdminModule\Presenters\ContactPresenter' => array(array('application.3')),
			'App\AdminModule\Presenters\DashboardPresenter' => array(array('application.4')),
			'App\AdminModule\Presenters\DefaultPresenter' => array(array('application.5')),
			'App\AdminModule\Presenters\FooterPresenter' => array(array('application.6')),
			'App\AdminModule\Presenters\MenuPresenter' => array(array('application.7')),
			'App\AdminModule\Presenters\SliderPresenter' => array(array('application.9')),
			'App\AdminModule\Presenters\UserPresenter' => array(array('application.10')),
			'App\AdminModule\Presenters\WebconfigPresenter' => array(array('application.11')),
			'App\FrontendModule\Presenters\Error4xxPresenter' => array(array('application.12')),
			'App\FrontendModule\Presenters\ErrorPresenter' => array(array('application.13')),
			'App\FrontendModule\Presenters\HomepagePresenter' => array(array('application.14')),
			'NetteModule\ErrorPresenter' => array(array('application.15')),
			'NetteModule\MicroPresenter' => array(array('application.16')),
			'Nette\DI\Container' => array(1 => array('container')),
		),
		'services' => array(
			'25_App_Controller_FileController' => 'App\Controller\FileController',
			'26_App_Controller_MenuController' => 'App\Controller\MenuController',
			'27_App_Forms_BlockForm' => 'App\Forms\BlockForm',
			'28_App_Forms_ContactForm' => 'App\Forms\ContactForm',
			'29_App_Forms_ContactSettingForm' => 'App\Forms\ContactSettingForm',
			'30_App_Forms_FooterForm' => 'App\Forms\FooterForm',
			'31_App_Forms_FormFactory' => 'App\Forms\FormFactory',
			'32_App_Forms_MenuForm' => 'App\Forms\MenuForm',
			'33_App_Forms_SignForm' => 'App\Forms\SignForm',
			'34_App_Forms_SliderForm' => 'App\Forms\SliderForm',
			'35_App_Forms_UserForm' => 'App\Forms\UserForm',
			'36_App_Forms_WebconfigForm' => 'App\Forms\WebconfigForm',
			'37_App_Model_BlockRepository' => 'App\Model\BlockRepository',
			'38_App_Model_FooterPicRepository' => 'App\Model\FooterPicRepository',
			'39_App_Model_LangRepository' => 'App\Model\LangRepository',
			'40_App_Model_MenuRepository' => 'App\Model\MenuRepository',
			'41_App_Model_SliderPicRepository' => 'App\Model\SliderPicRepository',
			'42_App_Model_SliderSettingRepository' => 'App\Model\SliderSettingRepository',
			'43_App_Model_UserRepository' => 'App\Model\UserRepository',
			'44_App_Model_WebconfigRepository' => 'App\Model\WebconfigRepository',
			'application.1' => 'App\AdminModule\Presenters\BlockContentPresenter',
			'application.10' => 'App\AdminModule\Presenters\UserPresenter',
			'application.11' => 'App\AdminModule\Presenters\WebconfigPresenter',
			'application.12' => 'App\FrontendModule\Presenters\Error4xxPresenter',
			'application.13' => 'App\FrontendModule\Presenters\ErrorPresenter',
			'application.14' => 'App\FrontendModule\Presenters\HomepagePresenter',
			'application.15' => 'NetteModule\ErrorPresenter',
			'application.16' => 'NetteModule\MicroPresenter',
			'application.2' => 'App\AdminModule\Presenters\BlockPresenter',
			'application.3' => 'App\AdminModule\Presenters\ContactPresenter',
			'application.4' => 'App\AdminModule\Presenters\DashboardPresenter',
			'application.5' => 'App\AdminModule\Presenters\DefaultPresenter',
			'application.6' => 'App\AdminModule\Presenters\FooterPresenter',
			'application.7' => 'App\AdminModule\Presenters\MenuPresenter',
			'application.8' => 'App\AdminModule\Presenters\SignPresenter',
			'application.9' => 'App\AdminModule\Presenters\SliderPresenter',
			'application.application' => 'Nette\Application\Application',
			'application.linkGenerator' => 'Nette\Application\LinkGenerator',
			'application.presenterFactory' => 'Nette\Application\IPresenterFactory',
			'cache.journal' => 'Nette\Caching\Storages\IJournal',
			'cache.storage' => 'Nette\Caching\IStorage',
			'connection' => 'Dibi\Connection',
			'container' => 'Nette\DI\Container',
			'database.default.connection' => 'Nette\Database\Connection',
			'database.default.context' => 'Nette\Database\Context',
			'database.default.conventions' => 'Nette\Database\Conventions\DiscoveredConventions',
			'database.default.structure' => 'Nette\Database\Structure',
			'http.context' => 'Nette\Http\Context',
			'http.request' => 'Nette\Http\Request',
			'http.requestFactory' => 'Nette\Http\RequestFactory',
			'http.response' => 'Nette\Http\Response',
			'latte.latteFactory' => 'Latte\Engine',
			'latte.templateFactory' => 'Nette\Application\UI\ITemplateFactory',
			'mail.mailer' => 'Nette\Mail\IMailer',
			'nette.latte' => 'Latte\Engine',
			'routing.router' => 'Nette\Application\IRouter',
			'security.user' => 'Nette\Security\User',
			'security.userStorage' => 'Nette\Security\IUserStorage',
			'session.session' => 'Nette\Http\Session',
			'tracy.bar' => 'Tracy\Bar',
			'tracy.blueScreen' => 'Tracy\BlueScreen',
			'tracy.logger' => 'Tracy\ILogger',
		),
		'tags' => array(
			'inject' => array(
				'application.1' => TRUE,
				'application.10' => TRUE,
				'application.11' => TRUE,
				'application.12' => TRUE,
				'application.13' => TRUE,
				'application.14' => TRUE,
				'application.15' => TRUE,
				'application.16' => TRUE,
				'application.2' => TRUE,
				'application.3' => TRUE,
				'application.4' => TRUE,
				'application.5' => TRUE,
				'application.6' => TRUE,
				'application.7' => TRUE,
				'application.8' => TRUE,
				'application.9' => TRUE,
			),
			'nette.presenter' => array(
				'application.1' => 'App\AdminModule\Presenters\BlockContentPresenter',
				'application.10' => 'App\AdminModule\Presenters\UserPresenter',
				'application.11' => 'App\AdminModule\Presenters\WebconfigPresenter',
				'application.12' => 'App\FrontendModule\Presenters\Error4xxPresenter',
				'application.13' => 'App\FrontendModule\Presenters\ErrorPresenter',
				'application.14' => 'App\FrontendModule\Presenters\HomepagePresenter',
				'application.15' => 'NetteModule\ErrorPresenter',
				'application.16' => 'NetteModule\MicroPresenter',
				'application.2' => 'App\AdminModule\Presenters\BlockPresenter',
				'application.3' => 'App\AdminModule\Presenters\ContactPresenter',
				'application.4' => 'App\AdminModule\Presenters\DashboardPresenter',
				'application.5' => 'App\AdminModule\Presenters\DefaultPresenter',
				'application.6' => 'App\AdminModule\Presenters\FooterPresenter',
				'application.7' => 'App\AdminModule\Presenters\MenuPresenter',
				'application.8' => 'App\AdminModule\Presenters\SignPresenter',
				'application.9' => 'App\AdminModule\Presenters\SliderPresenter',
			),
		),
		'aliases' => array(
			'application' => 'application.application',
			'cacheStorage' => 'cache.storage',
			'database.default' => 'database.default.connection',
			'httpRequest' => 'http.request',
			'httpResponse' => 'http.response',
			'nette.cacheJournal' => 'cache.journal',
			'nette.database.default' => 'database.default',
			'nette.database.default.context' => 'database.default.context',
			'nette.httpContext' => 'http.context',
			'nette.httpRequestFactory' => 'http.requestFactory',
			'nette.latteFactory' => 'latte.latteFactory',
			'nette.mailer' => 'mail.mailer',
			'nette.presenterFactory' => 'application.presenterFactory',
			'nette.templateFactory' => 'latte.templateFactory',
			'nette.userStorage' => 'security.userStorage',
			'router' => 'routing.router',
			'session' => 'session.session',
			'user' => 'security.user',
		),
	);


	public function __construct()
	{
		parent::__construct(array(
			'appDir' => 'C:\Users\Jan Cimler\OneDrive\Projekty\tynim\app',
			'wwwDir' => 'C:\Users\Jan Cimler\OneDrive\Projekty\tynim\www',
			'debugMode' => TRUE,
			'productionMode' => FALSE,
			'environment' => 'development',
			'consoleMode' => FALSE,
			'container' => array('class' => NULL, 'parent' => NULL),
			'tempDir' => 'C:\Users\Jan Cimler\OneDrive\Projekty\tynim\app/../temp',
			'database' => array(
				'host' => 'localhost',
				'username' => 'root',
				'password' => NULL,
				'database' => 'tynim',
				'lazy' => TRUE,
				'profiler' => array(
					'run' => TRUE,
					'explain' => TRUE,
					'filter' => 'DibiEvent::ALL',
					'file' => 'log.sql',
				),
			),
		));
	}


	/**
	 * @return App\Controller\FileController
	 */
	public function createService__25_App_Controller_FileController()
	{
		$service = new App\Controller\FileController;
		return $service;
	}


	/**
	 * @return App\Controller\MenuController
	 */
	public function createService__26_App_Controller_MenuController()
	{
		$service = new App\Controller\MenuController($this->getService('40_App_Model_MenuRepository'));
		return $service;
	}


	/**
	 * @return App\Forms\BlockForm
	 */
	public function createService__27_App_Forms_BlockForm()
	{
		$service = new App\Forms\BlockForm($this->getService('31_App_Forms_FormFactory'), $this->getService('39_App_Model_LangRepository'));
		return $service;
	}


	/**
	 * @return App\Forms\ContactForm
	 */
	public function createService__28_App_Forms_ContactForm()
	{
		$service = new App\Forms\ContactForm($this->getService('31_App_Forms_FormFactory'));
		return $service;
	}


	/**
	 * @return App\Forms\ContactSettingForm
	 */
	public function createService__29_App_Forms_ContactSettingForm()
	{
		$service = new App\Forms\ContactSettingForm($this->getService('31_App_Forms_FormFactory'));
		return $service;
	}


	/**
	 * @return App\Forms\FooterForm
	 */
	public function createService__30_App_Forms_FooterForm()
	{
		$service = new App\Forms\FooterForm($this->getService('31_App_Forms_FormFactory'));
		return $service;
	}


	/**
	 * @return App\Forms\FormFactory
	 */
	public function createService__31_App_Forms_FormFactory()
	{
		$service = new App\Forms\FormFactory;
		return $service;
	}


	/**
	 * @return App\Forms\MenuForm
	 */
	public function createService__32_App_Forms_MenuForm()
	{
		$service = new App\Forms\MenuForm($this->getService('31_App_Forms_FormFactory'));
		return $service;
	}


	/**
	 * @return App\Forms\SignForm
	 */
	public function createService__33_App_Forms_SignForm()
	{
		$service = new App\Forms\SignForm($this->getService('31_App_Forms_FormFactory'));
		return $service;
	}


	/**
	 * @return App\Forms\SliderForm
	 */
	public function createService__34_App_Forms_SliderForm()
	{
		$service = new App\Forms\SliderForm($this->getService('31_App_Forms_FormFactory'));
		return $service;
	}


	/**
	 * @return App\Forms\UserForm
	 */
	public function createService__35_App_Forms_UserForm()
	{
		$service = new App\Forms\UserForm($this->getService('31_App_Forms_FormFactory'));
		return $service;
	}


	/**
	 * @return App\Forms\WebconfigForm
	 */
	public function createService__36_App_Forms_WebconfigForm()
	{
		$service = new App\Forms\WebconfigForm($this->getService('31_App_Forms_FormFactory'), $this->getService('39_App_Model_LangRepository'));
		return $service;
	}


	/**
	 * @return App\Model\BlockRepository
	 */
	public function createService__37_App_Model_BlockRepository()
	{
		$service = new App\Model\BlockRepository($this->getService('connection'), $this->getService('40_App_Model_MenuRepository'),
			$this->getService('44_App_Model_WebconfigRepository'));
		return $service;
	}


	/**
	 * @return App\Model\FooterPicRepository
	 */
	public function createService__38_App_Model_FooterPicRepository()
	{
		$service = new App\Model\FooterPicRepository($this->getService('connection'));
		return $service;
	}


	/**
	 * @return App\Model\LangRepository
	 */
	public function createService__39_App_Model_LangRepository()
	{
		$service = new App\Model\LangRepository;
		return $service;
	}


	/**
	 * @return App\Model\MenuRepository
	 */
	public function createService__40_App_Model_MenuRepository()
	{
		$service = new App\Model\MenuRepository($this->getService('connection'));
		return $service;
	}


	/**
	 * @return App\Model\SliderPicRepository
	 */
	public function createService__41_App_Model_SliderPicRepository()
	{
		$service = new App\Model\SliderPicRepository($this->getService('connection'));
		return $service;
	}


	/**
	 * @return App\Model\SliderSettingRepository
	 */
	public function createService__42_App_Model_SliderSettingRepository()
	{
		$service = new App\Model\SliderSettingRepository($this->getService('connection'));
		return $service;
	}


	/**
	 * @return App\Model\UserRepository
	 */
	public function createService__43_App_Model_UserRepository()
	{
		$service = new App\Model\UserRepository($this->getService('connection'));
		return $service;
	}


	/**
	 * @return App\Model\WebconfigRepository
	 */
	public function createService__44_App_Model_WebconfigRepository()
	{
		$service = new App\Model\WebconfigRepository($this->getService('connection'));
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\BlockContentPresenter
	 */
	public function createServiceApplication__1()
	{
		$service = new App\AdminModule\Presenters\BlockContentPresenter($this->getService('40_App_Model_MenuRepository'),
			$this->getService('26_App_Controller_MenuController'), $this->getService('37_App_Model_BlockRepository'),
			$this->getService('39_App_Model_LangRepository'), $this->getService('44_App_Model_WebconfigRepository'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\UserPresenter
	 */
	public function createServiceApplication__10()
	{
		$service = new App\AdminModule\Presenters\UserPresenter($this->getService('43_App_Model_UserRepository'), $this->getService('35_App_Forms_UserForm'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\WebconfigPresenter
	 */
	public function createServiceApplication__11()
	{
		$service = new App\AdminModule\Presenters\WebconfigPresenter($this->getService('44_App_Model_WebconfigRepository'),
			$this->getService('36_App_Forms_WebconfigForm'), $this->getService('39_App_Model_LangRepository'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\FrontendModule\Presenters\Error4xxPresenter
	 */
	public function createServiceApplication__12()
	{
		$service = new App\FrontendModule\Presenters\Error4xxPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\FrontendModule\Presenters\ErrorPresenter
	 */
	public function createServiceApplication__13()
	{
		$service = new App\FrontendModule\Presenters\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	/**
	 * @return App\FrontendModule\Presenters\HomepagePresenter
	 */
	public function createServiceApplication__14()
	{
		$service = new App\FrontendModule\Presenters\HomepagePresenter($this->getService('44_App_Model_WebconfigRepository'),
			$this->getService('42_App_Model_SliderSettingRepository'), $this->getService('41_App_Model_SliderPicRepository'),
			$this->getService('28_App_Forms_ContactForm'), $this->getService('26_App_Controller_MenuController'),
			$this->getService('25_App_Controller_FileController'), $this->getService('37_App_Model_BlockRepository'),
			$this->getService('39_App_Model_LangRepository'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return NetteModule\ErrorPresenter
	 */
	public function createServiceApplication__15()
	{
		$service = new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
		return $service;
	}


	/**
	 * @return NetteModule\MicroPresenter
	 */
	public function createServiceApplication__16()
	{
		$service = new NetteModule\MicroPresenter($this, $this->getService('http.request'), $this->getService('routing.router'));
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\BlockPresenter
	 */
	public function createServiceApplication__2()
	{
		$service = new App\AdminModule\Presenters\BlockPresenter($this->getService('27_App_Forms_BlockForm'), $this->getService('37_App_Model_BlockRepository'),
			$this->getService('39_App_Model_LangRepository'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\ContactPresenter
	 */
	public function createServiceApplication__3()
	{
		$service = new App\AdminModule\Presenters\ContactPresenter($this->getService('44_App_Model_WebconfigRepository'),
			$this->getService('29_App_Forms_ContactSettingForm'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\DashboardPresenter
	 */
	public function createServiceApplication__4()
	{
		$service = new App\AdminModule\Presenters\DashboardPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\DefaultPresenter
	 */
	public function createServiceApplication__5()
	{
		$service = new App\AdminModule\Presenters\DefaultPresenter($this->getService('33_App_Forms_SignForm'), $this->getService('43_App_Model_UserRepository'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\FooterPresenter
	 */
	public function createServiceApplication__6()
	{
		$service = new App\AdminModule\Presenters\FooterPresenter($this->getService('44_App_Model_WebconfigRepository'), $this->getService('30_App_Forms_FooterForm'),
			$this->getService('38_App_Model_FooterPicRepository'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\MenuPresenter
	 */
	public function createServiceApplication__7()
	{
		$service = new App\AdminModule\Presenters\MenuPresenter($this->getService('32_App_Forms_MenuForm'), $this->getService('40_App_Model_MenuRepository'),
			$this->getService('39_App_Model_LangRepository'), $this->getService('26_App_Controller_MenuController'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\SignPresenter
	 */
	public function createServiceApplication__8()
	{
		$service = new App\AdminModule\Presenters\SignPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\SliderPresenter
	 */
	public function createServiceApplication__9()
	{
		$service = new App\AdminModule\Presenters\SliderPresenter($this->getService('34_App_Forms_SliderForm'), $this->getService('41_App_Model_SliderPicRepository'),
			$this->getService('42_App_Model_SliderSettingRepository'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return Nette\Application\Application
	 */
	public function createServiceApplication__application()
	{
		$service = new Nette\Application\Application($this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'));
		$service->catchExceptions = FALSE;
		$service->errorPresenter = 'Error';
		Nette\Bridges\ApplicationTracy\RoutingPanel::initializePanel($service);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel($this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('application.presenterFactory')));
		return $service;
	}


	/**
	 * @return Nette\Application\LinkGenerator
	 */
	public function createServiceApplication__linkGenerator()
	{
		$service = new Nette\Application\LinkGenerator($this->getService('routing.router'), $this->getService('http.request')->getUrl(),
			$this->getService('application.presenterFactory'));
		return $service;
	}


	/**
	 * @return Nette\Application\IPresenterFactory
	 */
	public function createServiceApplication__presenterFactory()
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback($this, 5, 'C:\Users\Jan Cimler\OneDrive\Projekty\tynim\app/../temp/cache/Nette%5CBridges%5CApplicationDI%5CApplicationExtension'));
		$service->setMapping(array(
			'*' => 'App\*Module\Presenters\*Presenter',
		));
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\IJournal
	 */
	public function createServiceCache__journal()
	{
		$service = new Nette\Caching\Storages\FileJournal('C:\Users\Jan Cimler\OneDrive\Projekty\tynim\app/../temp');
		return $service;
	}


	/**
	 * @return Nette\Caching\IStorage
	 */
	public function createServiceCache__storage()
	{
		$service = new Nette\Caching\Storages\FileStorage('C:\Users\Jan Cimler\OneDrive\Projekty\tynim\app/../temp/cache',
			$this->getService('cache.journal'));
		return $service;
	}


	/**
	 * @return Dibi\Connection
	 */
	public function createServiceConnection()
	{
		$service = new \Dibi\Connection(array(
			'host' => 'localhost',
			'username' => 'root',
			'password' => NULL,
			'database' => 'tynim',
			'lazy' => TRUE,
			'profiler' => array(
				'run' => TRUE,
				'explain' => TRUE,
				'filter' => DibiEvent::ALL,
				'file' => 'log.sql',
			),
		));
		if (!$service instanceof Dibi\Connection) {
			throw new Nette\UnexpectedValueException('Unable to create service \'connection\', value returned by factory is not Dibi\Connection type.');
		}
		return $service;
	}


	/**
	 * @return Nette\DI\Container
	 */
	public function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	public function createServiceDatabase__default__connection()
	{
		$service = new Nette\Database\Connection('mysql:host=127.0.0.1;dbname=test', NULL, NULL, array('lazy' => TRUE));
		$this->getService('tracy.blueScreen')->addPanel('Nette\Bridges\DatabaseTracy\ConnectionPanel::renderException');
		Nette\Database\Helpers::createDebugPanel($service, TRUE, 'default');
		return $service;
	}


	/**
	 * @return Nette\Database\Context
	 */
	public function createServiceDatabase__default__context()
	{
		$service = new Nette\Database\Context($this->getService('database.default.connection'), $this->getService('database.default.structure'),
			$this->getService('database.default.conventions'), $this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Database\Conventions\DiscoveredConventions
	 */
	public function createServiceDatabase__default__conventions()
	{
		$service = new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
		return $service;
	}


	/**
	 * @return Nette\Database\Structure
	 */
	public function createServiceDatabase__default__structure()
	{
		$service = new Nette\Database\Structure($this->getService('database.default.connection'), $this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Http\Context
	 */
	public function createServiceHttp__context()
	{
		$service = new Nette\Http\Context($this->getService('http.request'), $this->getService('http.response'));
		return $service;
	}


	/**
	 * @return Nette\Http\Request
	 */
	public function createServiceHttp__request()
	{
		$service = $this->getService('http.requestFactory')->createHttpRequest();
		if (!$service instanceof Nette\Http\Request) {
			throw new Nette\UnexpectedValueException('Unable to create service \'http.request\', value returned by factory is not Nette\Http\Request type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\RequestFactory
	 */
	public function createServiceHttp__requestFactory()
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy(array());
		return $service;
	}


	/**
	 * @return Nette\Http\Response
	 */
	public function createServiceHttp__response()
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	/**
	 * @return Nette\Bridges\ApplicationLatte\ILatteFactory
	 */
	public function createServiceLatte__latteFactory()
	{
		return new Container_461d22c33b_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory($this);
	}


	/**
	 * @return Nette\Application\UI\ITemplateFactory
	 */
	public function createServiceLatte__templateFactory()
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory($this->getService('latte.latteFactory'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('security.user'), $this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Mail\IMailer
	 */
	public function createServiceMail__mailer()
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	/**
	 * @return Latte\Engine
	 */
	public function createServiceNette__latte()
	{
		$service = new Latte\Engine;
		trigger_error('Service nette.latte is deprecated, implement Nette\Bridges\ApplicationLatte\ILatteFactory.',
			16384);
		$service->setTempDirectory('C:\Users\Jan Cimler\OneDrive\Projekty\tynim\app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		Nette\Utils\Html::$xhtml = FALSE;
		return $service;
	}


	/**
	 * @return Nette\Application\IRouter
	 */
	public function createServiceRouting__router()
	{
		$service = App\RouterFactory::createRouter();
		if (!$service instanceof Nette\Application\IRouter) {
			throw new Nette\UnexpectedValueException('Unable to create service \'routing.router\', value returned by factory is not Nette\Application\IRouter type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Security\User
	 */
	public function createServiceSecurity__user()
	{
		$service = new Nette\Security\User($this->getService('security.userStorage'), $this->getService('43_App_Model_UserRepository'));
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		return $service;
	}


	/**
	 * @return Nette\Security\IUserStorage
	 */
	public function createServiceSecurity__userStorage()
	{
		$service = new Nette\Http\UserStorage($this->getService('session.session'));
		return $service;
	}


	/**
	 * @return Nette\Http\Session
	 */
	public function createServiceSession__session()
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('14 days');
		return $service;
	}


	/**
	 * @return Tracy\Bar
	 */
	public function createServiceTracy__bar()
	{
		$service = Tracy\Debugger::getBar();
		if (!$service instanceof Tracy\Bar) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.bar\', value returned by factory is not Tracy\Bar type.');
		}
		return $service;
	}


	/**
	 * @return Tracy\BlueScreen
	 */
	public function createServiceTracy__blueScreen()
	{
		$service = Tracy\Debugger::getBlueScreen();
		if (!$service instanceof Tracy\BlueScreen) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.blueScreen\', value returned by factory is not Tracy\BlueScreen type.');
		}
		return $service;
	}


	/**
	 * @return Tracy\ILogger
	 */
	public function createServiceTracy__logger()
	{
		$service = Tracy\Debugger::getLogger();
		if (!$service instanceof Tracy\ILogger) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.logger\', value returned by factory is not Tracy\ILogger type.');
		}
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		header('X-Frame-Options: SAMEORIGIN');
		header('X-Powered-By: Nette Framework');
		header('Content-Type: text/html; charset=utf-8');
		Nette\Reflection\AnnotationsParser::setCacheStorage($this->getByType("Nette\Caching\IStorage"));
		Nette\Reflection\AnnotationsParser::$autoRefresh = TRUE;
		$this->getService('session.session')->exists() && $this->getService('session.session')->start();
		$this->getService('tracy.bar')->addPanel(new Dibi\Bridges\Tracy\Panel);
	}

}



final class Container_461d22c33b_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory implements Nette\Bridges\ApplicationLatte\ILatteFactory
{
	private $container;


	public function __construct(Container_461d22c33b $container)
	{
		$this->container = $container;
	}


	public function create()
	{
		$service = new Latte\Engine;
		$service->setTempDirectory('C:\Users\Jan Cimler\OneDrive\Projekty\tynim\app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		Nette\Utils\Html::$xhtml = FALSE;
		return $service;
	}

}
