<?php
/**
 * @generate-class-entries
 */

/** @strict-properties */
final class ArrayBuffer {
    public function __construct(int $byteLength) {}

    public function __serialize(): array {}

    public function __unserialize(array $data): void {}
}

/** @strict-properties */
abstract class TypedArray implements ArrayAccess, IteratorAggregate {
    /** @implementation-alias TypedArray::__construct */
    public function __construct(ArrayBuffer $buffer, int $byteOffset = 0, ?int $length = null) {}

    /**
     * @param int $offset
     */
    public function offsetGet($offset): int|float {}

    /**
     * @param int $offset
     * @param int|float $value
     */
    public function offsetSet($offset, $value): void {}

    /**
     * @param int $offset
     */
    public function offsetExists($offset): bool {}

    /**
     * @param int $offset
     */
    public function offsetUnset($offset): void {}

    public function getIterator(): Iterator {}

    public function __serialize(): array {}

    public function __unserialize(array $data): void {}
}

final class Int8Array extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): int {}
}

final class UInt8Array extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): int {}
}

final class Int16Array extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): int {}
}

final class UInt16Array extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): int {}
}

final class Int32Array extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): int {}
}

final class UInt32Array extends TypedArray {
}

final class FloatArray extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): float {}
}

final class DoubleArray extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): float {}
}

/** @strict-properties */
final class DataView {
    public readonly ArrayBuffer $buffer;
    public readonly int $byteOffset;
    public readonly int $byteLength;

    public function __construct(ArrayBuffer $buffer, int $byteOffset = 0, ?int $byteLength = null) {}

    public function getInt8(int $byteOffset): int {}
    public function getUint8(int $byteOffset): int {}
    public function getInt16(int $byteOffset, bool $littleEndian = false): int {}
    public function getUint16(int $byteOffset, bool $littleEndian = false): int {}
    public function getInt32(int $byteOffset, bool $littleEndian = false): int {}
    public function getUint32(int $byteOffset, bool $littleEndian = false): int {}
    public function getFloat32(int $byteOffset, bool $littleEndian = false): float {}
    public function getFloat64(int $byteOffset, bool $littleEndian = false): float {}

    public function setInt8(int $byteOffset, int $value): void {}
    public function setUint8(int $byteOffset, int $value): void {}
    public function setInt16(int $byteOffset, int $value, bool $littleEndian = false): void {}
    public function setUint16(int $byteOffset, int $value, bool $littleEndian = false): void {}
    public function setInt32(int $byteOffset, int $value, bool $littleEndian = false): void {}
    public function setUint32(int $byteOffset, int $value, bool $littleEndian = false): void {}
    public function setFloat32(int $byteOffset, float $value, bool $littleEndian = false): void {}
    public function setFloat64(int $byteOffset, float $value, bool $littleEndian = false): void {}

    public function __serialize(): array {}
    public function __unserialize(array $data): void {}
}
