<!-- It's recommendes create a class per php file with the same name -->

<!-- Ther are 3 types of atributes to implement encapsulation
- private: only the own class can access them
- public: all classes can access them
- protected: only the own class and his subclasses can access them -->

<!-- To access members of the own class use $this  -->
<!-- As you can see the members are accessed wihout $ -->
<?php 
    class Animal {

        // Static atributes: same than constant, but can changes the value
        // To change it in the class you must use self, self is the $this of the classes
        // The use is self::$variable. 
        // Is like $this -> variable => self::$variable

        private static $counter = 0;
        protected $edad = 0;

        public static function getCounter() {
            return self::$counter;
        }
        
        // Static methods just static before  public | private | protected
        // Now this method is attached to the class not to the object
        // So you cant use it using the $this
        
        public static function move() {
            echo "The animal moves <br/>";
        }
        
        
        private $color = "gray";
        private $weight = 10;

        //Class constants "const NAME = value

        const LIGTH_WEIGTH = 5;
        const MEDIUM_WEIGTH = 10;
        const HEAVY_WEIGTH = 15;

        // The constructor it defines by __consctruct and hasnt return. 
        // This function is called always that you call new Object()
        // You cannot define more than one constructor

        public function __construct($color, $weight) {
            $this -> color = $color;
            $this -> weight = $weight;
            // be carefull you dont use $self, but use self::$variable
            self::$counter += 1;
        }

        // getters and setters
        public function getColor() {
            return $this -> color;
        }
        public function getWeight() {
            return $this -> weight;
        }

        public function setColor($newColor) {
            $this -> color = $newColor;
        }

        public function setWeight($newWeight) {
            $this -> weight = $newWeight;
        }

        // pass Custom objets as arguments

        public function eat(Animal $animalEated) {
            $this -> weight += $animalEated -> getWeight();
            $animalEated -> setWeight(0);
            $animalEated -> setColor("");
        }


        public function add_weight() {
            $this -> weight = $this -> weight + 1;
        }

        // Destructor: delete objects of the memory. It's called automatically at the tends of the php script
        // or when the object is destroyed.
        // The function to define es __destruct

        public function __destruct() {
            echo 'destructor called <br />';
        }

        // to String function allow print a class instance.
        public function __toString()
        {
            return "Im $this->weight kg and my color is $this -> color";
        }
    }
?>