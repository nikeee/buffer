--TEST--
DataView Properties Tests
--DESCRIPTION--
Test readonly properties and property access
--SKIPIF--
<?php if(!extension_loaded('buffer')) die('skip buffer n/a'); ?>
--FILE--
<?php

$buffer = new ArrayBuffer(16);
$view = new DataView($buffer, 4, 8);

var_dump($view->buffer === $buffer);
var_dump($view->byteOffset);
var_dump($view->byteLength);

try {
    $view->byteOffset = 10;
    echo "ERROR: Should not be able to modify byteOffset\n";
} catch (Exception $e) {
    echo "OK: byteOffset is readonly\n";
}

try {
    $view->byteLength = 20;
    echo "ERROR: Should not be able to modify byteLength\n";
} catch (Exception $e) {
    echo "OK: byteLength is readonly\n";
}

try {
    $view->buffer = new ArrayBuffer(8);
    echo "ERROR: Should not be able to modify buffer\n";
} catch (Exception $e) {
    echo "OK: buffer is readonly\n";
}

$view->setInt8(0, 42);
var_dump($view->byteOffset);
var_dump($view->byteLength);
var_dump($view->buffer === $buffer);

?>
--EXPECT--
bool(true)
int(4)
int(8)
OK: byteOffset is readonly
OK: byteLength is readonly
OK: buffer is readonly
int(4)
int(8)
bool(true)

