<?php

namespace Core\Controller;


use Symfony\Component\HttpFoundation\Response;

/**
 * Controller parent
 */
abstract class BaseController
{
    /**
     * Pour éventuellement utiliser un autre layout que celui par defaut
     *
     * @var string
     */
    private static $layout;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        self::$layout = 'site';
    }

    /**
     * Eventuellement utiliser un autre layout que celui par defaut
     *
     * @param string $layout
     */
    final protected function setLayout(string $layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param string $view
     * @param array $data
     */
    final protected function view(string $view, array $data = [])
    {       
        if ($data) extract($data);

        ob_start();
        require base_path().'/app/views/'.$view.'.php';
        $contentInLayout = ob_get_clean();

        //var_dump($this->layout);

        require base_path().'/app/views/layouts/'.self::$layout.'.php';

        exit();
    }

    /**
     * @param int $http_code
     * @param string|null $content
     */
    final protected function header(int $http_code=200, string $content=null)
    {
        Response::create(null, $http_code)->send();
    }

}
