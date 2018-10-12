<?php
require_once('vendor/autoload.php');


use Symfony\Component\Yaml\Parser;

/*
 * This new version of the helper file includes the fix to the extension problem
 * the previous version only supported .php files this one includes .php and .html as well
 * TODO: absolute symlinks are not yet tested  
 */
class helper
{
    /**
     * Contains the pages of the website
     *
     * @var array
     */
    private static $pages;

    /**
     * Contains global information about the company [Address|ZipCode|City]
     *
     * @var array
     */
    private static $infos;

    public static function generateMenu()
    {
        (new helper)->parseFile();
        $currentPage = self::explodeAndReturnPageNameWithoutExtension(basename($_SERVER['PHP_SELF']));
          foreach(self::$pages as $url=>$value) {
            $urlWithoutExtension = self::explodeAndReturnPageNameWithoutExtension($url);
            // this was otimized by removing the || check, and checking just the name without the extension 
            if(($urlWithoutExtension === "mentions-legales")) break;
            $active = '';
            if ($currentPage === $urlWithoutExtension) {
                // Change according to csrequired css class
                $active = 'active';
            }
            if (isset($value['sub-pages'])) {
                @self::generateSubMenu($value, $active, $url);
            } else {
                if (strtolower($value['title']) === 'contact') {
                    echo "<li class='$active'><a class='' href='$url'>" . $value['title'] . "</a></li>";
                } else {
                    echo "<li class='$active'><a class='' href='$url'>" . $value['title'] . "</a></li>";
                }
            }
          }
    }

    /**
     * Generates the title and the description of the current page
     * IMPORTANT: this generator does not handle the case when the index is a sub-page 
     */
    public static function generateTitle()
    {
        (new helper)->parseFile();
        $currentPage = self::explodeAndReturnPageNameWithoutExtension(basename($_SERVER['PHP_SELF']));
        echo "<meta name=\"keywords\" content=\"" . self::$infos['keywords'] ."\">\n\t";
        // echo "<pre>"; // TODO: remove this after debbuging!
        foreach (self::$pages as $url => $value) {
            $url = self::explodeAndReturnPageNameWithoutExtension($url);
            if ($currentPage === 'index' || $currentPage === 'accueil') {
                self::indextitle($value);
                break;
            } else {
                if (array_key_exists('sub-pages', $value)) {
                    // if yes then just render the sub-page title
                    foreach ($value['sub-pages'] as $subURL => $subValue) {
                        $subURL = self::explodeAndReturnPageNameWithoutExtension($subURL);
                        if ($subURL === $currentPage) {
                            self::regularTitle($subValue);
                            break;
                        }
                    }
                } else if($url === $currentPage) {
                    // this is always reached!
                    self::regularTitle($value);
                    break;
                }
            }
        }

    }
 

    /**
     * Parse the content of the yaml file
     */
    private function parseFile ()
    {
        $yaml = new Parser();
        $content = $yaml->parse(file_get_contents('config/content.yml'));
        self::$pages = $content['pages'];
        self::$infos = $content['infos'];
    }

    /**
     * Generates a dropdown with the sub-menus
     * 
     * @param array the array holding the sub menus
    */
    private function generateSubMenu($array, $active, $url) {
        $longText = "<li class=\"menu-item-has-children $active\"><a class='' href=".$url.">". $array['title'] ."</a>
                <ul class=\"sub-menu\">";
        
        foreach ($array['sub-pages'] as $href => $values) { 
            $longText .= "<li class=\"\"><a class='' href=". $href .">" . $values['title'] . "</a></li>";
        }
        
        echo $longText .= "</ul></li>";
    }

    // In case of the index page.

    private function indexTitle ($value) { 
        echo "<title>". self::$infos['name'] ." - " . self::$infos['address'] . ", " . self::$infos['zipcode'] . ", " . self::$infos['city'] . "</title>\n\t";
        echo "<meta name=\"description\" content=\"" . $value['description'] ."\">\n\t";
        echo "<meta name=\"title\" content=\"" . self::$infos['name'] ."\">\n\t";
        
    }

    // in case of any other page(including the sub-pages).

    private function regularTitle ($value) { 
        echo "<title> " . $value['title'] . " - " . self::$infos['name'] . " </title>\n\t";
        echo "<meta name=\"description\" content=\"" . $value['description'] ."\">\n\t";
        echo "<meta name=\"title\" content=\"" . self::$infos['name'] ."\">\n\t";
        
    }

    /**
    * Helps getting the page name without the extension, this is usefull when you don't know if the pages are going to be html or php pages 
    * So this returns just the page name and use it to check for current page and to generate title
    */ 
    private function explodeAndReturnPageNameWithoutExtension ($pageName) {
        return explode('.', $pageName)[0];
    }

    /**
     * Prints the value of the given key from the infos array
     */
    public function get($key) {
        echo self::$infos[$key];
    } 

    public static function getFullAddress () {
        return self::$infos['address'] . ', ' . self::$infos['zipcode'] . ', ' . self::$infos['city'];
    }



}
