<?php
// src/Core/View.php
namespace App\Core;

class View
{
    private $basePath;

    public function __construct(string $basePath)
    { $this->basePath = rtrim($basePath, '/'); }

    public function render(string $view, array $params = [], ?string $layout = 'layout.php'): void
    {
        $viewFile = $this->basePath . '/' . ltrim($view, '/');
        if (!file_exists($viewFile)) {
            http_response_code(500);
            echo 'Vue introuvable: ' . htmlspecialchars($viewFile, ENT_QUOTES, 'UTF-8');
            return;
        }
        extract($params, EXTR_SKIP);

        ob_start();
        require $viewFile; 
        $content = ob_get_clean();

        if ($layout) {
    $layoutFile = $this->basePath . '/' . $layout;

    if (file_exists($layoutFile)) {

        $contentLayout = $content;   // on copie la variable

        require $layoutFile;

    } else {
        echo $content;
    }
} else {
    echo $content;
}
    }
}