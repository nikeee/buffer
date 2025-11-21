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
echo "getInt8(0) = ";
var_dump($view->getInt8(0));
echo "getInt8(1) = ";
var_dump($view->getInt8(1));

echo "\nint8/uint8\n";
$view->setUint8(2, 0);
$view->setUint8(3, 255);
echo "getUint8(0) = ";
var_dump($view->getUint8(0));
echo "getUint8(1) = ";
var_dump($view->getUint8(1));
echo "getUint8(2) = ";
var_dump($view->getUint8(2));
echo "getUint8(3) = ";
var_dump($view->getUint8(3));
echo "getInt8(3) = ";
var_dump($view->getInt8(3));

echo "\nint16\n";

$view->setInt16(4, -32768, true);
$view->setInt16(6, 32767, true);
echo "getInt16(4) = ";
var_dump($view->getInt16(4, true));
echo "getInt16(6) = ";
var_dump($view->getInt16(6, true));

echo "\nuint16\n";

$view->setUint16(8, 0, true);
$view->setUint16(10, 65535, true);
echo "getUint16(8) = ";
var_dump($view->getUint16(8, true));
echo "getUint16(10) = ";
var_dump($view->getUint16(10, true));

echo "\nint32\n";

$view->setInt32(12, -2147483648, true);
$view->setInt32(16, 2147483647, true);
echo "getInt32(12) = ";
var_dump($view->getInt32(12, true));
echo "getInt32(16) = ";
var_dump($view->getInt32(16, true));

echo "\nuint32\n";

$view->setUint32(20, 0, true);
$view->setUint32(24, 4294967295, true);
$val1 = $view->getUint32(20, true);
$val2 = $view->getUint32(24, true);
echo "getUint32(20) = ";
var_dump($val1);

// On 64-bit systems this is int, on 32-bit it's float
echo "getUint32(24) = ";
if (is_int($val2)) {
    var_dump($val2);
} else {
    var_dump($val2);
}

// Test Float32
$view->setFloat32(28, 3.14159, true);
echo "getFloat32(28) = ";
var_dump(round($view->getFloat32(28, true), 5));

?>
--EXPECT--
int8
getInt8(0) = int(-128)
getInt8(1) = int(127)

int8/uint8
getUint8(0) = int(128)
getUint8(1) = int(127)
getUint8(2) = int(0)
getUint8(3) = int(255)
getInt8(3) = int(-1)

int16
getInt16(4) = int(-32768)
getInt16(6) = int(32767)

uint16
getUint16(8) = int(0)
getUint16(10) = int(65535)

int32
getInt32(12) = int(-2147483648)
getInt32(16) = int(2147483647)

uint32
getUint32(20) = int(0)
getUint32(24) = int(4294967295)
getFloat32(28) = float(3.14159)

