<?php
class Car {
    var $maker = null;
    var $price = 0;
    var $capacity = 0;
    var $speed = 0;


    public function accele() {
        print('加速します');
    }

    public function brake() {
        print('ストップします');
    }
}

?>