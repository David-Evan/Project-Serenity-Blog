<?php 

namespace Library;

abstract class Entity{

    /**
     * id
     * @var int
     */
    protected $id;


    public function __construct(array $data = [])
    {
      if (!empty($data))
      {
        $this->hydrate($data);
      }
    }
  
    /**
     * hydate() - Permet l'hydratation d'un objet.
     * Pour chaque proriété XXX, si la méthode setXXX existe, l'execute.
     */
    public function hydrate(array $data)
    {
      foreach ($data as $properties => $value)
      {
        $method = 'set'.$properties;
  
        if (is_callable([$this, $method]))
        {
          $this->$method($value);
        }
      }
    }

    public function isValidEntity(){
      return true;
    }

    /** Getter / Setter **/
    public function getId(){
		return $this->id;
  }

    public function setId($id){
      $this->id = (int) $id;
    }

}