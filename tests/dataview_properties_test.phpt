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

echo "view->buffer === buffer = ";
var_dump($view->buffer === $buffer);
echo "view->byteOffset = ";
var_dump($view->byteOffset);
echo "view->byteLength = ";
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
echo "view->byteOffset after operation = ";
var_dump($view->byteOffset);
echo "view->byteLength after operation = ";
var_dump($view->byteLength);
echo "view->buffer === buffer after operation = ";
var_dump($view->buffer === $buffer);

?>
--EXPECT--
view->buffer === buffer = bool(true)
view->byteOffset = int(4)
view->byteLength = int(8)
OK: byteOffset is readonly
OK: byteLength is readonly
OK: buffer is readonly
view->byteOffset after operation = int(4)
view->byteLength after operation = int(8)
view->buffer === buffer after operation = bool(true)

