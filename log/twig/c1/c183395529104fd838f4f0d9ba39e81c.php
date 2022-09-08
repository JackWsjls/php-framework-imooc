<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layout.html */
class __TwigTemplate_3d007e2c30a11c14a332894df1aa7246 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<html>
  <body>
      <header>header</header>
      <content>
        ";
        // line 5
        $this->displayBlock('content', $context, $blocks);
        // line 7
        echo "      </content>
      <footer>footer</footer>
  </body>
</html>";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "        ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  57 => 6,  53 => 5,  46 => 7,  44 => 5,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<html>
  <body>
      <header>header</header>
      <content>
        {% block content %}
        {% endblock %}
      </content>
      <footer>footer</footer>
  </body>
</html>", "layout.html", "D:\\php\\xampp\\htdocs\\php-framework-imooc\\app\\views\\layout.html");
    }
}
