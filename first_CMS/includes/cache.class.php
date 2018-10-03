<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');
 

require_once(ROOT_PATH.'/includes/cache/Lite.php');

class Cache
{
    var $USE_CACHE;
    var $USE_CACHE_ON_LOGGED;
    var $cache_options;
    var $cl;

	
	function Cache(&$root)
	{
            $this -> USE_CACHE = $root -> conf -> vars['cache_on'];
            $this -> USE_CACHE_ON_LOGGED = $root -> conf -> vars['cache_logged_on'];

            $this -> cache_options = array(
                                    'cacheDir' => ROOT_PATH.'/_cache/',
                                    'lifeTime' => $root -> conf -> vars['cache_lifetime'],
                                    'automaticSerialization' => TRUE
                                    );

            $this->cl = new Cache_Lite($this -> cache_options);

	}

        /**
         * funkcja sprawdza czy ma uzywac cache, zwraca true jesli tak
         */
        function checkUseCache()
        {
            if(!$this -> USE_CACHE)
                    return false;

            if((!$this -> USE_CACHE_ON_LOGGED)&&($_SESSION['user']['id']))
                    return false;

            return true;
        }

        /**
         * metoda cachuje zmienna/tablice
         * nazwa cache generowana na podstawie id oraz zmiennych z get
         * @param <type> $var zmienna
         * @param <type> $id nazwa cache, np. 'produkty'
         * @param <type> $lifetime zmiana lifetime
         * @param <type> $ignore_url czy ignorowac request_url przy budowie nazwy - tak jesli zmienna jest taka sama na wszystkich podstronach
         * @return <type> 
         */
        function saveVariable($var, $id, $lifetime=false, $ignore_url=false)
        {
            if(!$this -> checkUseCache())
                    return;

            $id = $id.$_SESSION['lang'];

            $old_id = $id;
            if($ignore_url)
                $id = md5($id);
            else
                $id = md5($id.serialize($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));

            if($lifetime)
                $this->cl->setLifeTime($lifetime);

            if($this->cl->save($var, $id))
            {
//                echo "<br>zapisano cache:".$old_id."-".$id;
                return true;
            }
            else
            {
//                echo "<br>blad przy zapisie cache";
            }
        }

        function getVariable($id, $lifetime=false, $ignore_url=false)
        {
            if(!$this -> checkUseCache())
                    return;

            $id = $id.$_SESSION['lang'];

            $old_id = $id;
            if($ignore_url)
                $id = md5($id);
            else
                $id = md5($id.serialize($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));

            if($lifetime)
                $this->cl->setLifeTime($lifetime);

            //echo "<br>id:".$old_id.":".$id;

            return $this->cl->get($id);
        }

        function savePartial($content, $id, $lifetime=false, $ignore_url=false)
        {
            if(!$this -> checkUseCache())
                    return;

            $id = $id.$_SESSION['lang'];

            $old_id = $id;
            if($ignore_url)
                $id = md5($id);
            else
                $id = md5($id.serialize($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));

            if($lifetime)
                $this->cl->setLifeTime($lifetime);

            if($this->cl->save($content, $id))
            {
//                echo "<br>zapisano cache partial:".$old_id."-".$id;
                return true;
            }
            else
            {
//                echo "<br>blad przy zapisie cache";
            }
        }

        function getPartial($id, $lifetime=false, $ignore_url=false)
        {
            if(!$this -> checkUseCache())
                    return;

            $id = $id.$_SESSION['lang'];

            $old_id = $id;
            if($ignore_url)
                $id = md5($id);
            else
                $id = md5($id.serialize($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));

            if($lifetime)
                $this->cl->setLifeTime($lifetime);

            //echo "<br>id:".$old_id.":".$id;

            return $this->cl->get($id);
        }



	

}
?>
