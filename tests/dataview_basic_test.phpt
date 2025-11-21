--TEST--
DataView Basic Tests - Read/Write all types
--DESCRIPTION--
Test basic read/write operations for all DataView types
--SKIPIF--
<?php if(!extension_loaded('buffer')) die('skip buffer n/a'); ?>
--FILE--
<?php

$buffer = new ArrayBuffer(32);
$view = new DataView($buffer);

echo "int8\n";
$view->setInt8(0, -128);
$view->setInt8(1, 127);
var_dump($view->getInt8(0));
var_dump($view->getInt8(1));

echo "\nint8/uint8\n";
$view->setUint8(2, 0);
$view->setUint8(3, 255);
var_dump($view->getUint8(0));
var_dump($view->getUint8(1));
var_dump($view->getUint8(2));
var_dump($view->getUint8(3));
var_dump($view->getInt8(3));

echo "\nint16\n";

$view->setInt16(4, -32768, true);
$view->setInt16(6, 32767, true);
var_dump($view->getInt16(4, true));
var_dump($view->getInt16(6, true));

echo "\nuint16\n";

$view->setUint16(8, 0, true);
$view->setUint16(10, 65535, true);
var_dump($view->getUint16(8, true));
var_dump($view->getUint16(10, true));

echo "\nint32\n";

$view->setInt32(12, -2147483648, true);
$view->setInt32(16, 2147483647, true);
var_dump($view->getInt32(12, true));
var_dump($view->getInt32(16, true));

echo "\nuint32\n";

$view->setUint32(20, 0, true);
$view->setUint32(24, 4294967295, true);
$val1 = $view->getUint32(20, true);
$val2 = $view->getUint32(24, true);
var_dump($val1);

// On 64-bit systems this is int, on 32-bit it's float
if (is_int($val2)) {
    var_dump($val2);
} else {
    var_dump($val2);
}

// Test Float32
$view->setFloat32(28, 3.14159, true);
var_dump(round($view->getFloat32(28, true), 5));

?>
--EXPECT--
int8
int(-128)
int(127)

int8/uint8
int(128)
int(127)
int(0)
int(255)
int(-1)

int16
int(-32768)
int(32767)

uint16
int(0)
int(65535)

int32
int(-2147483648)
int(2147483647)

uint32
int(0)
int(4294967295)
float(3.14159)

