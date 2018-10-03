<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
    <head>
        <title>Panel administracyjny | {$pageTitle|default:$CONF.page_title}</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="keywords" content="{$pageKeywords}" />
        <meta name="description" content="{$pageDescription}" />
        <link rel="stylesheet" href="{$TPL_URL}/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{$TPL_URL}/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="{$TPL_URL}/css/matrix-style.css" />
        <link rel="stylesheet" href="{$TPL_URL}/css/matrix-media.css" />
        <link href="{$TPL_URL}/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'/>
            <link rel="shortcut icon" href="{$TPL_URL}/img/favicon.png" />
    </head>
    <body>
        <div id="header">
            <h1><a href="dashboard.html">Matrix Admin</a></h1>
        </div>
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav">
                <li class=""><a title="" href="{$BASE_URL}/admin"><i class="icon-cog"></i> <span class="text">Panel</span></a></li>
                <li class=""><a title="" href="{$CONF.base_url}/" target="_blank"><i class="icon-eye-open"></i> <span class="text">Podgląd strony</span></a></li>
                <li class=""><a title="" href="{$BASE_URL}/admin/wyloguj.php"><i class="icon icon-share-alt"></i> <span class="text">Wyloguj [ <b>{$user.login}</b> ]</span></a></li>
            </ul>
        </div>
        <div id="sidebar"> 
            <a href="#" class="visible-phone"><i class="icon icon-info-sign"></i> MENU</a>
            <ul>
                {if $user.privileges.menu_administration}
                    <li {if $menu_selected=='menu'}class="active"{/if}><a href="{$CONF.base_url}/admin/menu.php"><i class="icon-reorder"></i> <span>Zarządzanie menu</span></a> </li>
                    {/if}
                    {if $user.privileges.strony_administration}
                    <li class="submenu {if $menu_selected=='strony'}open active{/if}"><a href="#"><i class="icon icon-copy"></i> <span>Strony</span></a>
                        <ul>
                            <li><a href="{$CONF.base_url}/admin/strony.php?action=add">Dodaj nową</a></li>
                            <li><a href="{$CONF.base_url}/admin/strony.php">Zarządzanie</a></li>
                        </ul>
                    </li>
                {/if}
                {if $user.privileges.petycje_administration}
                    <li class="submenu {if $menu_selected=='petycje'}open active{/if}"><a href="#"><i class="icon icon-globe"></i> <span>Petycje</span></a>
                        <ul>
                            <li><a href="{$BASE_URL}/admin/petycje.php?action=add">Dodaj nową</a></li>
                            <li><a href="{$BASE_URL}/admin/petycje.php">Zarządzanie</a></li>
                        </ul>
                    </li>
                {/if}
                {if $user.privileges.biuletyn_administration}
                    <li class="submenu  {if $menu_selected=='newsletter'}open active{/if}"><a href="#"><i class="icon icon-heart"></i> <span>Newsletter</span></a>
                        <ul>
                            <li><a href="{$CONF.base_url}/admin/newsletter.php?action=edit_info">Informacje</a></li>
                            <li><a href="{$CONF.base_url}/admin/newsletter.php?action=edit_rules">Regulamin</a></li>
                            <li><a href="{$CONF.base_url}/admin/newsletter.php?action=user">Subskrybenci</a></li>
                            <li><a href="{$CONF.base_url}/admin/mailing.php">Szablony wiadomości</a></li>
                            <li><a href="{$CONF.base_url}/admin/newsletter.php?action=mailing">Wysyłka</a></li>
                        </ul>
                    </li>
                {/if}
                {if $user.privileges.galeria_administration}
                    <li class="submenu  {if $menu_selected=='galeria'}open active{/if}"><a href="#"><i class="icon icon-picture"></i> <span>Galeria</span></a>
                        <ul>
                            <li><a href="{$BASE_URL}/admin/galeria.php?action=add_gallery">Dodaj nową</a></li>
                            <li><a href="{$BASE_URL}/admin/galeria.php">Zarządzanie</a></li>
                            <li><a href="{$BASE_URL}/admin/zmieniarka.php" title="Zarządzanie zmieniarkami zdjęć">Slider</a></li>
                        </ul>
                    </li>
                {/if}
                {if $user.privileges.page_config}
                    <li class="submenu  {if $menu_selected=='ustawienia'}open active{/if}"><a href="#"><i class="icon icon-cog"></i> <span>Ustawienia</span></a>
                        <ul>
                            <li><a href="{$CONF.base_url}/admin/slownik.php">Słownik</a></li>
                            <li><a href="{$CONF.base_url}/admin/konfiguracja.php">Konfiguracja</a></li>
                            <li><a href="{$CONF.base_url}/admin/ranking.php">Google</a></li>
                            <li><a href="{$CONF.base_url}/admin/seo-konfiguracja.php">SEO</a></li>
                            <li><a href="{$CONF.base_url}/admin/szablony.php">Szablony strony</a></li>
                            <li><a href="{$CONF.base_url}/admin/uzytkownicy-mailing.php">Szablony email</a></li>
                            <li><a href="{$CONF.base_url}/admin/haslo.php">Zmiana hasła</a></li>
                            <li><a href="{$CONF.base_url}/admin/export-import-mysql.php">MySQL</a></li>
                        </ul>
                    </li>
                {/if}
            </ul>
        </div>
        <div id="content">
            {if $body}
                {include file=$body}
            {else}
                <div id="content-header">
                    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Panel</a> </div>
                    <h1>Panel główny</h1>
                </div>         
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span4">
                            {include file="statystyki/odwiedziny-strony.html"}
                            {include file="statystyki/odwiedziny-wpisy.html"}
                        </div>
                        <div class="span8">
                            {include file="statystyki/rejestr-zmian.html"}
                        </div>
                        <div class="span12" style='margin-left: 0;'>
                            {include file="statystyki/nieudane-logowania.html"}
                        </div>
                    </div>
                {/if}
            </div>
            <div class="row-fluid">
                <div id="footer" class="span12">
                    {$CONF.footer}</br>
                Realizacja: <a href="http://www.pkdevelop.pl/" title="PKDEVELOP - Paweł Kraus Usługi Pgorgrmistyczne">PKDEVELOP</a>
                </div>
            </div>
            <script src="{$TPL_URL}/js/jquery.min.js"></script> 
            <script src="{$TPL_URL}/js/jquery.ui.custom.js"></script> 
            <script src="{$TPL_URL}/js/bootstrap.min.js"></script> 
            <script src="{$TPL_URL}/js/matrix.js"></script>
            <script type="text/javascript" src="{$BASE_URL}/js/tinymce/tiny_mce.js"></script>
            <script type="text/javascript" src="{$BASE_URL}/js/tinymce.init.js"></script>
    </body>
</html>