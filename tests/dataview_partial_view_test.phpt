--TEST--
DataView Partial View Tests
--DESCRIPTION--
Test DataView with byteOffset and byteLength
--SKIPIF--
<?php if(!extension_loaded('buffer')) die('skip buffer n/a'); ?>
--FILE--
<?php

$buffer = new ArrayBuffer(32);
$view1 = new DataView($buffer, 0, 16);
$view2 = new DataView($buffer, 16, 16);

$view1->setInt32(0, 0x11111111, true);
$view1->setInt32(4, 0x22222222, true);
$view1->setInt32(8, 0x33333333, true);
$view1->setInt32(12, 0x44444444, true);

$view2->setInt32(0, 0x55555555, true);
$view2->setInt32(4, 0x66666666, true);

echo "view1->getUint32(0) = ";
var_dump(dechex($view1->getUint32(0, true)));
echo "view1->getUint32(12) = ";
var_dump(dechex($view1->getUint32(12, true)));
echo "view2->getUint32(0) = ";
var_dump(dechex($view2->getUint32(0, true)));

echo "view1->byteOffset = ";
var_dump($view1->byteOffset);
echo "view1->byteLength = ";
var_dump($view1->byteLength);
echo "view2->byteOffset = ";
var_dump($view2->byteOffset);
echo "view2->byteLength = ";
var_dump($view2->byteLength);

try {
    $view2->getInt32(-4, true);
    echo "ERROR: Should have thrown\n";
} catch (Exception $e) {
    echo "OK: Negative offset in partial view caught\n";
}

$view3 = new DataView($buffer, 8);
echo "view3->byteLength (default) = ";
var_dump($view3->byteLength);

?>
--EXPECT--
view1->getUint32(0) = string(8) "11111111"
view1->getUint32(12) = string(8) "44444444"
view2->getUint32(0) = string(8) "55555555"
view1->byteOffset = int(0)
view1->byteLength = int(16)
view2->byteOffset = int(16)
view2->byteLength = int(16)
OK: Negative offset in partial view caught
view3->byteLength (default) = int(24)

