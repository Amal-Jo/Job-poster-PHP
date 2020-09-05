<?php class Template{
  //path to Template
    protected $template;
  //variables passed in
    protected $vars = array();

  //constructor
  public function __construct($template){
      $this->template = $template;
  }
  public function __get($key){
      return $this->vars[$key];
  }
  public function __set($key,$value){
      $this->vars[$key] = $value;
  }
  public function __toString(){
  // imports variables into the local symbol table from an array.
    extract($this->vars);
  //change directory
    chdir(dirname($this->template));
  // In order to enable the Output Buffering
    ob_start();

   include basename($this->template);
   //include basename('templates/frontpage.php');

  //Get current buffer contents and delete current output buffer
    return ob_get_clean();
  }

}

 ?>
