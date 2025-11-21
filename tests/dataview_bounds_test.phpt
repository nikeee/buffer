--TEST--
DataView Bounds Checking Tests
--DESCRIPTION--
Test bounds checking and error conditions
--SKIPIF--
<?php if(!extension_loaded('buffer')) die('skip buffer n/a'); ?>
--FILE--
<?php

$buffer = new ArrayBuffer(16);
$view = new DataView($buffer);

try {
    new DataView($buffer, -1);
    echo "ERROR: Should have thrown\n";
} catch (ValueError $e) {
    echo "OK: Negative byteOffset caught\n";
}

try {
    new DataView($buffer, 17);
    echo "ERROR: Should have thrown\n";
} catch (ValueError $e) {
    echo "OK: byteOffset > buffer length caught\n";
}

try {
    new DataView($buffer, 0, -1);
    echo "ERROR: Should have thrown\n";
} catch (ValueError $e) {
    echo "OK: Negative byteLength caught\n";
}

try {
    new DataView($buffer, 0, 17);
    echo "ERROR: Should have thrown\n";
} catch (ValueError $e) {
    echo "OK: byteLength > buffer length caught\n";
}

try {
    new DataView($buffer, 10, 10);
    echo "ERROR: Should have thrown\n";
} catch (ValueError $e) {
    echo "OK: byteOffset + byteLength > buffer length caught\n";
}

try {
    $view->getInt8(16);
    echo "ERROR: Should have thrown\n";
} catch (Exception $e) {
    echo "OK: Read out of bounds caught\n";
}

try {
    $view->getInt16(15);
    echo "ERROR: Should have thrown\n";
} catch (Exception $e) {
    echo "OK: Read overflow caught\n";
}

// Test write bounds
try {
    $view->setInt8(16, 0);
    echo "ERROR: Should have thrown\n";
} catch (Exception $e) {
    echo "OK: Write out of bounds caught\n";
}

try {
    $view->setInt32(14, 0);
    echo "ERROR: Should have thrown\n";
} catch (Exception $e) {
    echo "OK: Write overflow caught\n";
}

$view->setInt8(15, 42);
echo "getInt8(15) at boundary = ";
var_dump($view->getInt8(15));

$view->setInt16(14, 0x1234, true);
echo "getInt16(14) at boundary = ";
var_dump(dechex($view->getInt16(14, true)));

?>
--EXPECT--
OK: Negative byteOffset caught
OK: byteOffset > buffer length caught
OK: Negative byteLength caught
OK: byteLength > buffer length caught
OK: byteOffset + byteLength > buffer length caught
OK: Read out of bounds caught
OK: Read overflow caught
OK: Write out of bounds caught
OK: Write overflow caught
getInt8(15) at boundary = int(42)
getInt16(14) at boundary = string(4) "1234"

