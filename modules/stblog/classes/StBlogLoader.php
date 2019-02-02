<?php
class StBlogLoader
{
    public static function load($class)
    {
        $_class_path = dirname(__FILE__);
        if (!is_array($class))
            $class = (array)$class;
        foreach($class AS $cln)
        {
            if (file_exists($_class_path.'/StBlog'.$cln.'.php'))
                require_once($_class_path.'/StBlog'.$cln.'.php');
        }
    }
}