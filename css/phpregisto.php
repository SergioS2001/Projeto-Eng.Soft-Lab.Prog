
<?php class Utilizador {
     private $id;
     private $name;
     private $type;
     private $email;
    # equivalent of a Java constructorpublic 
    function __construct($id, $name,$type,$email) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->email = $email;
    }
}
?>