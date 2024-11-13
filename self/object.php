<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .color {
            font-size: 30px;
            color: aqua;
        }
    </style>
</head>
<body>
    <?php
        class Students { 
            private $name;
            private $age;
            private $address;
            private $class;

            public function __construct($name, $age, $address, $class) {
                $this->name = $name;
                $this->age = $age;
                $this->address = $address;
                $this->class = $class;
            }

            public function getName() {
                return $this->name;
            }

            public function getAge() {
                return $this->age;
            }

            public function getAddress() {
                return $this->address;
            }

            public function getClass() {
                return $this->class;
            }
        }

        $student = new Students("Hoàng Thanh Bình", 19, "Quảng Trị", "PNV26A");
        echo "<div class='color'>Name: " . $student->getName() . "<br></div>";
        echo "Age: " . $student->getAge() . "<br>";
        echo "Address: " . $student->getAddress() . "<br>";
        echo "Class: " . $student->getClass() . "<br>";
    ?>
</body>
</html>
