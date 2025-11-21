--TEST--
DataView Zero Length Tests
--DESCRIPTION--
Test DataView with zero-length buffer and edge cases
--SKIPIF--
<?php if(!extension_loaded('buffer')) die('skip buffer n/a'); ?>
--FILE--
<?php

$buffer = new ArrayBuffer(0);
$view = new DataView($buffer);

var_dump($view->byteOffset);
var_dump($view->byteLength);

try {
    $view->getInt8(0);
    echo "ERROR: Should have thrown\n";
} catch (Exception $e) {
    echo "OK: Read from zero-length buffer caught\n";
}

try {
    $view->setInt8(0, 0);
    echo "ERROR: Should have thrown\n";
} catch (Exception $e) {
    echo "OK: Write to zero-length buffer caught\n";
}

$buffer2 = new ArrayBuffer(16);
$view2 = new DataView($buffer2, 8, 0);

var_dump($view2->byteOffset);
var_dump($view2->byteLength);

try {
    $view2->getInt8(0);
    echo "ERROR: Should have thrown\n";
} catch (Exception $e) {
    echo "OK: Read from zero-length view caught\n";
}

?>
--EXPECT--
int(0)
int(0)
OK: Read from zero-length buffer caught
OK: Write to zero-length buffer caught
int(8)
int(0)
OK: Read from zero-length view caught

