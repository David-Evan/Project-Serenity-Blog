<?php

/* frontend/index.html */
class __TwigTemplate_94f61618d4d7d22d56864fbada5b5d8f9af7d8d245cd0ee52826d1baf9c829f0 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
  <title>Discovery - Minimalist Blog Template</title>
  <!-- Externals -->
  <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\">
  <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Karla:400,700\">
  <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.2.0/css/all.css\">
  <!-- Internal -->
  <link rel=\"stylesheet\" href=\"css/style.css\">
  <link rel=\"icon\" type=\"image/png\" href=\"images/logo-discovery.png\" />
</head>
<body>
  <div class=\"container-fluid\">
  <div>
    <!--
    [START SECTION] - HEADER
    -->
    <header class=\"main-header\">
      <!-- HEARDER : MAIN MENU -->
      <nav class=\"main-menu navbar navbar-expand-lg navbar-light fixed-top mx-auto\">
        <a class=\"navbar-brand\" href=\"#\">
          <img src=\"./images/logo-discovery.png\" width=\"40\" height=\"40\" class=\"d-inline-block align-top\" alt=\"Logo discovery\">
          Discovery
        </a>
        <!-- Main menu : Toggle button -->
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>

        <!-- Main menu : Item list -->
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
          <ul class=\"navbar-nav mx-auto\">
            <li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"index.html\">Home</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"single-post.html\">Single Post</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"about.html\">About Author</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"#\">Admin</a>
            </li>
          </ul>
        </div>

      </nav>

      <!-- HEADER : PAGE TITLE -->
      <div class=\"header-title\">
        <h1>Discovery ";
        // line 57
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "</h1>
        <h2>Amazing minimalist blog template</h2>
      </div>
    </header>
    <!--
    [END SECTION] - HEADER
    -->
    <div class=\"content row\">
      <!--
      [START SECTION] - MAIN CONTENT
      -->
      <main class=\"content-wrapper col-lg-8 mx-auto\">

        <!-- MAIN CONTENT : POST PREVIEW -->
        <article class=\"mc_post\">
          <!-- Post preview - Header -->
          <header class=\"row justify-content\">
            <div class=\"mc_post-date date col-12\">
              16/08/2018
            </div>
            <h2 class=\"mc_post-title col-12\">Lorem ipsum dolor sit.</h2>
          </header>

          <!-- Post preview - Content -->
          <div class=\"mc_post-content\">
            <figure class=\"mc_post-picture\">
              <img src=\"https://dummyimage.com/500x340/ccc/000.png&text=Blog+post+illustration\" alt=\"\" >
            </figure>

            <div class=\"mc_post-content prev\">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam ab at cupiditate ad nam labore voluptatum doloremque sapiente praesentium voluptates eveniet dolores pariatur numquam, porro. Magnam illo quibusdam sequi quidem adipisci, velit architecto laudantium culpa esse voluptatem ratione ad quis temporibus sint laborum, dolorem possimus officia maiores fugiat labore eius incidunt vitae numquam mollitia animi. Dolor id reiciendis doloremque rem ad eaque consequuntur ab pariatur.
            </div>
            <footer class=\"mc_post-footer\">
              <button class=\"mc_post-readmore light-btn\">Afficher la suite</button>
            </footer>
          </div>
            <hr>
          </article>

        <!-- MAIN CONTENT : POST PREVIEW -->
        <article class=\"mc_post\">
          <header>
            <div class=\"mc_post-date date\">
              16/08/2018
            </div>
            <h2 class=\"mc_post-title\">Optio possimus suscipit quas!</h2>
          </header>
          <div class=\"mc_post-content-wrapper\">
            <figure class=\"mc_post-picture\"><img src=\"https://dummyimage.com/500x340/ccc/000.png&text=Blog+post+illustration\" alt=\"\" ></figure>
            <div class=\"mc_post-content prev\">
              Facere harum, doloribus? Id perferendis cum culpa sunt, fugit ratione dolorum aliquam impedit. Amet illum nisi debitis eaque, est, autem! Dicta iste illo, veritatis! Quae consequuntur aliquid facilis, fugiat laborum! Nostrum nobis esse mollitia eveniet laborum ut facere laboriosam deleniti eos sed vitae quia veritatis voluptates similique dicta pariatur alias quis, amet rerum! Fuga fugiat iste, dignissimos, laborum ipsum voluptatibus qui consequatur quos iure vel.
            </div>
            <footer class=\"mc_post-footer\"><button class=\"mc_post-readmore light-btn\">Afficher la suite</button></footer>
          </div>
          <hr>
        </article>

        <!-- MAIN CONTENT : POST PREVIEW -->
        <article class=\"mc_post\">
          <header>
            <div class=\"mc_post-date date\">
              16/08/2018
            </div>
            <h2 class=\"mc_post-title\">Tenetur culpa laudantium officiis?</h2>
          </header>
          <div class=\"mc_post-content\">
            <figure class=\"mc_post-picture\"><img src=\"https://dummyimage.com/500x340/ccc/000.png&text=Blog+post+illustration\" alt=\"\" ></figure>
            <div class=\"mc_post-content prev\">
              Voluptatibus exercitationem quo commodi, quibusdam deserunt nam magni aspernatur suscipit repellat praesentium sequi vero, voluptas tenetur sunt ea saepe et eius debitis, enim beatae in error numquam. Fugiat ipsum, enim iure aperiam, nam officiis vitae. Fugiat nobis a quasi iste veritatis hic facere, nemo harum doloribus porro aut vitae, minima sequi est libero ut cumque maiores tempore necessitatibus neque nostrum sint omnis voluptatum. Atque, recusandae.
            </div>
            <footer class=\"mc_post-footer\"><button class=\"mc_post-readmore light-btn\">Afficher la suite</button></footer>
          </div>
        </article>

        <nav aria-label=\"pagination\">
          <ul class=\"pagination\">
            <li class=\"page-item\">
              <a class=\"page-link\" href=\"#\" tabindex=\"-1\"><i class=\"fa fa-chevron-left\"></i></a>
            </li>
            <li class=\"page-item\"><a class=\"page-link\" href=\"#\">1</a></li>
            <li class=\"page-item active\">
              <a class=\"page-link\" href=\"#\">2 <span class=\"sr-only\">(current)</span></a>
            </li>
            <li class=\"page-item\"><a class=\"page-link\" href=\"#\">3</a></li>
            <li class=\"page-item\">
              <a class=\"page-link\" href=\"#\"><i class=\"fa fa-chevron-right\"></i></a>
            </li>
          </ul>
        </nav>
        <hr>
      </main>
      <!--
      [END SECTION] - MAIN CONTENT
      -->

      <!--
      [START SECTION] - SIDEBAR
      -->
      <div class=\"sidebar col-lg-4 col-xl-3 offset-xl-1\">
        <div class=\"row\">
        <!-- SIDEBAR : ABOUT -->
        <section class=\"sidebar_about col-sm-9 col-md-6 col-lg-12 mx-auto\">
          <h3 class=\"sidebar-title\">Hello</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quisquam quibusdam alias molestiae culpa quo.</p>
        </section>

        <!-- SIDEBAR : SOCIAL -->
        <section class=\"sidebar_social col-sm-9 col-md-6 col-lg-12 mx-auto\">
          <h3 class=\"sidebar-title\">Gardons le contact</h3>
          <ul class=\"list-inline\">
            <li class=\"list-inline-item\"><a class=\"alt-color\" href=\"#\"><i class=\"fab fa-twitter\"></i></a></li>
            <li class=\"list-inline-item\"><a class=\"alt-color\" href=\"#\"><i class=\"fab fa-facebook\"></i></a></li>
            <li class=\"list-inline-item\"><a class=\"alt-color\" href=\"#\"><i class=\"fab fa-instagram\"></i></a></li>
            <li class=\"list-inline-item\"><a class=\"alt-color\" href=\"#\"><i class=\"fab fa-snapchat-ghost\"></i></a></li>
            <li class=\"list-inline-item\"><a class=\"alt-color\" href=\"#\"><i class=\"fab fa-youtube\"></i></a></li>
          </ul>
        </section>

        <!-- SIDEBAR : MAILING -->
        <section class=\"sidebar_mailing d-none d-lg-block col-lg-12\">
          <h3 class=\"sidebar-title\">Newsletter</h3>
          <form action=\"#\">

            <div class=\"col-auto\">
              <label class=\"sr-only\" for=\"inlineFormInputGroup\">Username</label>
              <div class=\"input-group mb-2\">
                <div class=\"input-group-prepend\">
                  <div class=\"input-group-text\">@</div>
                </div>
                <input type=\"text\" class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"Newsletter\"><input type=\"submit\" class=\"btn collapse-right sidebar_mailing-send\" value=\"Envoyer\"/>
              </div>
            </div>
          </form>
        </section>

        <!-- SIDEBAR : LAST POST -->
        <section class=\"sidebar_lastpost col-sm-9 col-md-7 col-lg-12 mx-auto\">
          <h3 class=\"sidebar-title\">Derniers billets</h3>

          <section class=\"sb-lp_post\">
            <h4 class=\"sb-lp_post-title\">Post Title 1</h4>
            <p class=\"sb-lp_post-content\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil officia eaque, quidem quaerat sequi, quisquam eveniet.</p>
          </section>
          <section class=\"sb-lp_post\">
            <h4 class=\"sb-lp_post-title\">Post Title 2</h4>
            <p class=\"sb-lp_post-content\">Esse iusto at molestias hic culpa ratione, minus reiciendis incidunt sunt explicabo, officiis modi recusandae velit!</p>
          </section>
          <section class=\"sb-lp_post\">
            <h4 class=\"sb-lp_post-title\">Post Title 3</h4>
            <p class=\"sb-lp_post-content\">Nostrum doloribus ad aut ex saepe ipsam eaque enim illum dignissimos maxime quis porro hic, vel?</p>
          </section>
          <section class=\"sb-lp_post\">
            <h4 class=\"sb-lp_post-title\">Post Title 4</h4>
            <p class=\"sb-lp_post-content\">Nobis, dignissimos architecto. Itaque cupiditate quae reprehenderit asperiores ullam! Facere, modi. Perspiciatis quisquam ut dicta quasi.</p>
          </section>

        </section>
        </div>
      </div>
      <!--
      [END SECTION] - SIDEBAR
      -->

      <!--
      [START SECTION] -  COOKIES ALERT
      -->
      <section class=\"cookies-alert\">
        <h2>Informations</h2>
        <p class=\"cookies-alert_content col-10\">Ce site utilise des cookies provenant de Google pour fournir ses services et analyser le trafic. Votre adresse IP et votre user-agent, ainsi que des statistiques relatives aux performances et à la sécurité, sont transmis à Google afin d'assurer un service de qualité, de générer des statistiques d'utilisation, et de détecter et de résoudre les problèmes d'abus.</p>
        <p class=\"cookies-alert_links-container col-2\">
        <a href=\"\" class=\"cookies-alert_links\">Ok</a> <a href=\"\" class=\"cookies-alert_links\">En savoir plus</a>
      </section>
      <!--
      [END SECTION] - COOKIES ALERT
      -->
    </div>
      <!--
      [START SECTION] - FOOTER
      -->
    <footer class=\"main-footer\">
      <div class=\"footer-copyright\">Copyright &copy; 2018 - Designed by <a href=\"https://www.david-evan.fr\">David EVAN</a></div>
    </footer>
    <!--
    [END SECTION] - FOOTER
    -->
  </div>
  </div>
  <script src=\"https://code.jquery.com/jquery-3.1.1.min.js\"></script>
  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js\" integrity=\"sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49\" crossorigin=\"anonymous\"></script>
  <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js\" integrity=\"sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy\" crossorigin=\"anonymous\"></script>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "frontend/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 57,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
  <title>Discovery - Minimalist Blog Template</title>
  <!-- Externals -->
  <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\">
  <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Karla:400,700\">
  <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.2.0/css/all.css\">
  <!-- Internal -->
  <link rel=\"stylesheet\" href=\"css/style.css\">
  <link rel=\"icon\" type=\"image/png\" href=\"images/logo-discovery.png\" />
</head>
<body>
  <div class=\"container-fluid\">
  <div>
    <!--
    [START SECTION] - HEADER
    -->
    <header class=\"main-header\">
      <!-- HEARDER : MAIN MENU -->
      <nav class=\"main-menu navbar navbar-expand-lg navbar-light fixed-top mx-auto\">
        <a class=\"navbar-brand\" href=\"#\">
          <img src=\"./images/logo-discovery.png\" width=\"40\" height=\"40\" class=\"d-inline-block align-top\" alt=\"Logo discovery\">
          Discovery
        </a>
        <!-- Main menu : Toggle button -->
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          <span class=\"navbar-toggler-icon\"></span>
        </button>

        <!-- Main menu : Item list -->
        <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
          <ul class=\"navbar-nav mx-auto\">
            <li class=\"nav-item active\">
              <a class=\"nav-link\" href=\"index.html\">Home</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"single-post.html\">Single Post</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"about.html\">About Author</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"#\">Admin</a>
            </li>
          </ul>
        </div>

      </nav>

      <!-- HEADER : PAGE TITLE -->
      <div class=\"header-title\">
        <h1>Discovery {{name}}</h1>
        <h2>Amazing minimalist blog template</h2>
      </div>
    </header>
    <!--
    [END SECTION] - HEADER
    -->
    <div class=\"content row\">
      <!--
      [START SECTION] - MAIN CONTENT
      -->
      <main class=\"content-wrapper col-lg-8 mx-auto\">

        <!-- MAIN CONTENT : POST PREVIEW -->
        <article class=\"mc_post\">
          <!-- Post preview - Header -->
          <header class=\"row justify-content\">
            <div class=\"mc_post-date date col-12\">
              16/08/2018
            </div>
            <h2 class=\"mc_post-title col-12\">Lorem ipsum dolor sit.</h2>
          </header>

          <!-- Post preview - Content -->
          <div class=\"mc_post-content\">
            <figure class=\"mc_post-picture\">
              <img src=\"https://dummyimage.com/500x340/ccc/000.png&text=Blog+post+illustration\" alt=\"\" >
            </figure>

            <div class=\"mc_post-content prev\">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam ab at cupiditate ad nam labore voluptatum doloremque sapiente praesentium voluptates eveniet dolores pariatur numquam, porro. Magnam illo quibusdam sequi quidem adipisci, velit architecto laudantium culpa esse voluptatem ratione ad quis temporibus sint laborum, dolorem possimus officia maiores fugiat labore eius incidunt vitae numquam mollitia animi. Dolor id reiciendis doloremque rem ad eaque consequuntur ab pariatur.
            </div>
            <footer class=\"mc_post-footer\">
              <button class=\"mc_post-readmore light-btn\">Afficher la suite</button>
            </footer>
          </div>
            <hr>
          </article>

        <!-- MAIN CONTENT : POST PREVIEW -->
        <article class=\"mc_post\">
          <header>
            <div class=\"mc_post-date date\">
              16/08/2018
            </div>
            <h2 class=\"mc_post-title\">Optio possimus suscipit quas!</h2>
          </header>
          <div class=\"mc_post-content-wrapper\">
            <figure class=\"mc_post-picture\"><img src=\"https://dummyimage.com/500x340/ccc/000.png&text=Blog+post+illustration\" alt=\"\" ></figure>
            <div class=\"mc_post-content prev\">
              Facere harum, doloribus? Id perferendis cum culpa sunt, fugit ratione dolorum aliquam impedit. Amet illum nisi debitis eaque, est, autem! Dicta iste illo, veritatis! Quae consequuntur aliquid facilis, fugiat laborum! Nostrum nobis esse mollitia eveniet laborum ut facere laboriosam deleniti eos sed vitae quia veritatis voluptates similique dicta pariatur alias quis, amet rerum! Fuga fugiat iste, dignissimos, laborum ipsum voluptatibus qui consequatur quos iure vel.
            </div>
            <footer class=\"mc_post-footer\"><button class=\"mc_post-readmore light-btn\">Afficher la suite</button></footer>
          </div>
          <hr>
        </article>

        <!-- MAIN CONTENT : POST PREVIEW -->
        <article class=\"mc_post\">
          <header>
            <div class=\"mc_post-date date\">
              16/08/2018
            </div>
            <h2 class=\"mc_post-title\">Tenetur culpa laudantium officiis?</h2>
          </header>
          <div class=\"mc_post-content\">
            <figure class=\"mc_post-picture\"><img src=\"https://dummyimage.com/500x340/ccc/000.png&text=Blog+post+illustration\" alt=\"\" ></figure>
            <div class=\"mc_post-content prev\">
              Voluptatibus exercitationem quo commodi, quibusdam deserunt nam magni aspernatur suscipit repellat praesentium sequi vero, voluptas tenetur sunt ea saepe et eius debitis, enim beatae in error numquam. Fugiat ipsum, enim iure aperiam, nam officiis vitae. Fugiat nobis a quasi iste veritatis hic facere, nemo harum doloribus porro aut vitae, minima sequi est libero ut cumque maiores tempore necessitatibus neque nostrum sint omnis voluptatum. Atque, recusandae.
            </div>
            <footer class=\"mc_post-footer\"><button class=\"mc_post-readmore light-btn\">Afficher la suite</button></footer>
          </div>
        </article>

        <nav aria-label=\"pagination\">
          <ul class=\"pagination\">
            <li class=\"page-item\">
              <a class=\"page-link\" href=\"#\" tabindex=\"-1\"><i class=\"fa fa-chevron-left\"></i></a>
            </li>
            <li class=\"page-item\"><a class=\"page-link\" href=\"#\">1</a></li>
            <li class=\"page-item active\">
              <a class=\"page-link\" href=\"#\">2 <span class=\"sr-only\">(current)</span></a>
            </li>
            <li class=\"page-item\"><a class=\"page-link\" href=\"#\">3</a></li>
            <li class=\"page-item\">
              <a class=\"page-link\" href=\"#\"><i class=\"fa fa-chevron-right\"></i></a>
            </li>
          </ul>
        </nav>
        <hr>
      </main>
      <!--
      [END SECTION] - MAIN CONTENT
      -->

      <!--
      [START SECTION] - SIDEBAR
      -->
      <div class=\"sidebar col-lg-4 col-xl-3 offset-xl-1\">
        <div class=\"row\">
        <!-- SIDEBAR : ABOUT -->
        <section class=\"sidebar_about col-sm-9 col-md-6 col-lg-12 mx-auto\">
          <h3 class=\"sidebar-title\">Hello</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum quisquam quibusdam alias molestiae culpa quo.</p>
        </section>

        <!-- SIDEBAR : SOCIAL -->
        <section class=\"sidebar_social col-sm-9 col-md-6 col-lg-12 mx-auto\">
          <h3 class=\"sidebar-title\">Gardons le contact</h3>
          <ul class=\"list-inline\">
            <li class=\"list-inline-item\"><a class=\"alt-color\" href=\"#\"><i class=\"fab fa-twitter\"></i></a></li>
            <li class=\"list-inline-item\"><a class=\"alt-color\" href=\"#\"><i class=\"fab fa-facebook\"></i></a></li>
            <li class=\"list-inline-item\"><a class=\"alt-color\" href=\"#\"><i class=\"fab fa-instagram\"></i></a></li>
            <li class=\"list-inline-item\"><a class=\"alt-color\" href=\"#\"><i class=\"fab fa-snapchat-ghost\"></i></a></li>
            <li class=\"list-inline-item\"><a class=\"alt-color\" href=\"#\"><i class=\"fab fa-youtube\"></i></a></li>
          </ul>
        </section>

        <!-- SIDEBAR : MAILING -->
        <section class=\"sidebar_mailing d-none d-lg-block col-lg-12\">
          <h3 class=\"sidebar-title\">Newsletter</h3>
          <form action=\"#\">

            <div class=\"col-auto\">
              <label class=\"sr-only\" for=\"inlineFormInputGroup\">Username</label>
              <div class=\"input-group mb-2\">
                <div class=\"input-group-prepend\">
                  <div class=\"input-group-text\">@</div>
                </div>
                <input type=\"text\" class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"Newsletter\"><input type=\"submit\" class=\"btn collapse-right sidebar_mailing-send\" value=\"Envoyer\"/>
              </div>
            </div>
          </form>
        </section>

        <!-- SIDEBAR : LAST POST -->
        <section class=\"sidebar_lastpost col-sm-9 col-md-7 col-lg-12 mx-auto\">
          <h3 class=\"sidebar-title\">Derniers billets</h3>

          <section class=\"sb-lp_post\">
            <h4 class=\"sb-lp_post-title\">Post Title 1</h4>
            <p class=\"sb-lp_post-content\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil officia eaque, quidem quaerat sequi, quisquam eveniet.</p>
          </section>
          <section class=\"sb-lp_post\">
            <h4 class=\"sb-lp_post-title\">Post Title 2</h4>
            <p class=\"sb-lp_post-content\">Esse iusto at molestias hic culpa ratione, minus reiciendis incidunt sunt explicabo, officiis modi recusandae velit!</p>
          </section>
          <section class=\"sb-lp_post\">
            <h4 class=\"sb-lp_post-title\">Post Title 3</h4>
            <p class=\"sb-lp_post-content\">Nostrum doloribus ad aut ex saepe ipsam eaque enim illum dignissimos maxime quis porro hic, vel?</p>
          </section>
          <section class=\"sb-lp_post\">
            <h4 class=\"sb-lp_post-title\">Post Title 4</h4>
            <p class=\"sb-lp_post-content\">Nobis, dignissimos architecto. Itaque cupiditate quae reprehenderit asperiores ullam! Facere, modi. Perspiciatis quisquam ut dicta quasi.</p>
          </section>

        </section>
        </div>
      </div>
      <!--
      [END SECTION] - SIDEBAR
      -->

      <!--
      [START SECTION] -  COOKIES ALERT
      -->
      <section class=\"cookies-alert\">
        <h2>Informations</h2>
        <p class=\"cookies-alert_content col-10\">Ce site utilise des cookies provenant de Google pour fournir ses services et analyser le trafic. Votre adresse IP et votre user-agent, ainsi que des statistiques relatives aux performances et à la sécurité, sont transmis à Google afin d'assurer un service de qualité, de générer des statistiques d'utilisation, et de détecter et de résoudre les problèmes d'abus.</p>
        <p class=\"cookies-alert_links-container col-2\">
        <a href=\"\" class=\"cookies-alert_links\">Ok</a> <a href=\"\" class=\"cookies-alert_links\">En savoir plus</a>
      </section>
      <!--
      [END SECTION] - COOKIES ALERT
      -->
    </div>
      <!--
      [START SECTION] - FOOTER
      -->
    <footer class=\"main-footer\">
      <div class=\"footer-copyright\">Copyright &copy; 2018 - Designed by <a href=\"https://www.david-evan.fr\">David EVAN</a></div>
    </footer>
    <!--
    [END SECTION] - FOOTER
    -->
  </div>
  </div>
  <script src=\"https://code.jquery.com/jquery-3.1.1.min.js\"></script>
  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js\" integrity=\"sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49\" crossorigin=\"anonymous\"></script>
  <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js\" integrity=\"sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy\" crossorigin=\"anonymous\"></script>
</body>
</html>
", "frontend/index.html", "C:\\xampp\\htdocs\\oc-wdj-project-8\\view\\frontend\\index.html");
    }
}
