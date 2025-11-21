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

echo "zero-length buffer: byteOffset = ";
var_dump($view->byteOffset);
echo "zero-length buffer: byteLength = ";
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

echo "zero-length view: byteOffset = ";
var_dump($view2->byteOffset);
echo "zero-length view: byteLength = ";
var_dump($view2->byteLength);

try {
    $view2->getInt8(0);
    echo "ERROR: Should have thrown\n";
} catch (Exception $e) {
    echo "OK: Read from zero-length view caught\n";
}

?>
--EXPECT--
zero-length buffer: byteOffset = int(0)
zero-length buffer: byteLength = int(0)
OK: Read from zero-length buffer caught
OK: Write to zero-length buffer caught
zero-length view: byteOffset = int(8)
zero-length view: byteLength = int(0)
OK: Read from zero-length view caught

