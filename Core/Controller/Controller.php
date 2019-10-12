<?php
namespace Core\Controller;


class Controller{
    
    protected $viewPath;
    protected $template;

    protected function render($view, $variables = [])
    {
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    protected function forbiden()
    {
        header('HTTP/1.0 403 Forbiden');
        die('Acces interdit');
    }

    protected function notFound()
    {
        header('HTTP/1.0 404 Not found');
        die('Page Introuvable');
    }
}