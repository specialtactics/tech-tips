<?php

/***********************************************************************************************************************
 * Simple Case
 **********************************************************************************************************************/

function arrayPrinter(array $listOfStuff = array()) {
    print_r($listOfStuff); echo '<br />';
}

// Works
arrayPrinter(array (1, 2, 3));

// Fatal
arrayPrinter('Obviously not an array');



/***********************************************************************************************************************
 * Callables
 **********************************************************************************************************************/
function multiplier(&$parameter) {
    $parameter *= 10;
}

function modifyArray(callable $sortFunction = null, $array) {
    if (!is_null($sortFunction)) {
        array_walk($array, $sortFunction);
    }

    print_r($array); echo '<br />';
}

// Works
modifyArray('arrayMultiplier', array (1, 3, 2));

// Fatal
modifyArray('open', array(1, 2, 3));



/***********************************************************************************************************************
 * Classes
 **********************************************************************************************************************/

class Factory {
    public function build() {
        return 'Built an empty box';
    }
}

class CarFactory extends Factory {
    public function build() {
        return 'Built a car!';
    }
}

class RealEstateAgency {}


function buildBMW(Factory $factory = null) {
    if (!is_null($factory)) {
        echo $factory->build() . '<br />';
    }
}

$factory = new Factory;
$carFactory = new CarFactory;
$realEstateAgency = new RealEstateAgency;

// Works
buildBMW($factory);

// Works
buildBMW($carFactory);

// Fatal
buildBMW($realEstateAgency);



/***********************************************************************************************************************
 * Future - PHP 5.7
 **********************************************************************************************************************/

public function (\Devices\Touch\Tablet) initiatePublicDisplay(resource $galaxyNote) {
    $outputScreen = new \Devices\Touch\Tablet($galaxyNote);

    $outputScreen->on();
    $outputScreen->url('http://www.4mation.com.au');

    return $outputScreen;
}
