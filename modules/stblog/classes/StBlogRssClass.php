<?php
class StBlogRSS
{
    /** @var string Channel Title */
    protected $channel_title = '';
    
    /** @var string Channel Link */
    protected $channel_link = '';
    
    /** @var string Channel Description */
    protected $channel_description = '';
    
    /** @var string Channel Image URL */
    protected $channel_imgurl = '';
    
    /** @var string Channel Language */
    protected $language = 'en';
    
    /** @var datetime Publish Date*/
    protected $pubDate = '';
    
    /** @var datetime The last Build Date */
    protected $lastBuildDate = '';
 
    /** @var string The blog generator */
    protected $generator = 'StBlog RSS Generator';
 
    /** @var array Rss items */
    protected $items = array();
 
    /** 
     * @param string $title  RSS channel title
     * @param string $link  RSS channel link
     * @param string $description  RSS channel descritpion
     * @param string $imgurl  RSS channel images url
     */
    public function __construct($title='', $link='', $description='', $imgurl = '')
    {
        $this->channel_title = $title;
        $this->channel_link = $link;
        $this->channel_description = $description;
        $this->channel_imgurl = $imgurl;
        $this->pubDate = Date('Y-m-d H:i:s', time());
        $this->lastBuildDate = Date('Y-m-d H:i:s', time());
    }
 
    /**
     * @param string $key  Variable key
     * @param string $value  Variable value
     */
     public function config($key,$value)
     {
        $this->{$key} = $value;
     }
 
    /**
     * @param string $title  Item title
     * @param string $link  Item link
     * @param string $description  Item description
     * @param string $pubDate  Item publish data
     +----------------------------------------------------------
     */
     function addItem($title, $link, $description, $pubDate)
     {
        $this->items[] = array('title' => $title, 'link' => $link, 'description' => $description, 'pubDate' => $pubDate);
     }
 
     /**
      * @param void
      * @return string
      */
    public function fetch()
    {
        $rss = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\r\n";
        $rss .= "<rss version=\"2.0\">\r\n";
        $rss .= "<channel>\r\n";
        $rss .= "<title><![CDATA[{$this->channel_title}]]></title>\r\n";
        $rss .= "<description><![CDATA[{$this->channel_description}]]></description>\r\n";
        $rss .= "<link>{$this->channel_link}</link>\r\n";
        $rss .= "<language>{$this->language}</language>\r\n";
 
        if (!empty($this->pubDate))
            $rss .= "<pubDate>{$this->pubDate}</pubDate>\r\n";
        if (!empty($this->lastBuildDate))
            $rss .= "<lastBuildDate>{$this->lastBuildDate}</lastBuildDate>\r\n";
        if (!empty($this->generator))
            $rss .= "<generator>{$this->generator}</generator>\r\n";
 
        $rss .= "<ttl>5</ttl>\r\n";
 
        if (!empty($this->channel_imgurl)) {
            $rss .= "<image>\r\n";
            $rss .= "<title><![CDATA[{$this->channel_title}]]></title>\r\n";
            $rss .= "<link>{$this->channel_link}</link>\r\n";
            $rss .= "<url>{$this->channel_imgurl}</url>\r\n";
            $rss .= "</image>\r\n";
        }
 
        for ($i = 0; $i < count($this->items); $i++) {
            $rss .= "<item>\r\n";
            $rss .= "<title><![CDATA[{$this->items[$i]['title']}]]></title>\r\n";
            $rss .= "<link>{$this->items[$i]['link']}</link>\r\n";
            $rss .= "<description><![CDATA[{$this->items[$i]['description']}]]></description>\r\n";
            $rss .= "<pubDate>{$this->items[$i]['pubDate']}</pubDate>\r\n";
            $rss .= "</item>\r\n";
        }
 
        $rss .= "</channel>\r\n</rss>";
        return $rss;
    }
 
    /**
     * @param void
     * @return void
     */
    public function display()
    {
        header("Content-Type: text/xml; charset=utf-8");
        echo $this->fetch();
        exit;
    }
}
?>