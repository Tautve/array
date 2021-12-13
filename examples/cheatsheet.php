<?php
require "./vendor/autoload.php";

use HiFolks\DataType\Arr;

$arr = Arr::make([1,2,3,4,5,6]);

// Returns new Arr joining 2 arrays together
print_result($arr->concat([10,11,12]));

// Joins all elements into a string separated by separator
print_result($arr->join());

// Returns a section of arr from start to end
print_result($arr->slice(1, 2));

//Returns index of first occurence of element in arr
print_result($arr->indexOf(5));

// Returns index of last occurence of element in arr
$arr2 = Arr::make([1,2,3,4,5,6,7,8,9,8,7,6,5,4,3,2,1]);
print_result($arr->lastIndexOf(5));


// Calls function fn for each element in the array
$x = $arr->forEach(
    function ($element, $key) {
        return $key * $element;
    }
);
print_result($x->arr());

// Returns true if all elements in arr pass the test in fn
$bool = $arr->every(fn($element) => $element > 1);
print_result($bool);

// Returns true if at least one element in arr pass the test in fn
$bool = $arr->some(fn($element, $key) => $element > 2);
print_result($bool);

// Returns new array with elements of arr passing the filtering function fn
$arr2 = $arr->filter(fn($element) => $element > 3);
print_result($arr2);

// Returns new array with the results of running fn on every element
$arr2 = $arr->map(fn($element) => $element + 1);
print_result($arr2);

// Returns a flatten array with subarrays concatenated
$arr = Arr::make([ 1, [2,3], 4 , [5,6,7]]);
$arr2 = $arr->flat();
print_result($arr2);

// Returns a Arr same as ->map() with a successive ->flat()
$arr = Arr::make([ 1,2,3,4,5,6,7]);
$arr2 = $arr->flatMap(fn($element) => [$element, $element*2]);
print_result($arr2);

// Changes all elements in range to a the specified value
$arr = Arr::make([1,2,3,4,5,6,7,8,9]);
$arr->fill(88, 2, 6);
print_result($arr);
// Fills array
$arr = Arr::make();
$arr->fill(99, 0, 5);
print_result($arr);

// Returns a single value which is the function's accumulated result L2R
$arr = Arr::make([ 1,2,3,4,5,6,7]);
$value = $arr->reduce(fn($previousValue, $currentValue) => $previousValue + $currentValue);
print_result($value);

// Returns a single value which is the function's accumulated result R2L
$arr = Arr::make([ 1,2,3,4,5,6,7]);
$value = $arr->reduceRight(fn($previousValue, $currentValue) => $previousValue + $currentValue);
print_result($value);

// Add element to start of arr and return new length
$arr = Arr::make([ 1,2,3,4,5,6,7]);
print_result($arr->unshift(0));
print_result($arr);

// Adds element to the end of arr and returns new length
$arr = Arr::make([ 1,2,3,4,5,6,7]);
print_result($arr->push(9999));
print_result($arr);

// Reverse order of arr
$arr = Arr::make([ 1,2,3,4,5,6,7]);
print_result($arr->reverse());

// Sort the elements of arr
$arr = Arr::make([ 6,2,4,2,1,9,7]);
print_result($arr->sort());

// Changes content of arr removing, replacing and adding elements
$months = Arr::make(['Jan', 'March', 'April', 'June']);
$months->splice(1, 0, 'Feb');
// ['Jan', 'Feb', 'March', 'April', 'June']
$months->splice(4, 1, 'May');
// ['Jan', 'Feb', 'March', 'April', 'May']

// Returns a string representing arr its elements (same as arr.join(','))
$arr = Arr::make(['Jan', 'Feb', 'March', 'April', 'May']);
print_result($arr->toString());

// Returns length of Arr
$arr = Arr::make(['Jan', 'Feb', 'March', 'April', 'May']);
print_result($arr->length());

// Returns true if arr is an array
$isArray = Arr::isArray(['Jan', 'Feb', 'March', 'April', 'May']);
print_result($isArray);

$arr = Arr::fromFunction(fn () => random_int(0, 10), 5);
print_result($arr);

$arr = Arr::fromValue(0, 3);
print_result($arr);

/**
 * Print a line for string, integer, array, boolean.
 */
function print_result(mixed $something): void
{
    switch (gettype($something)) {
    case 'string':
        echo "STRING  : " . $something . PHP_EOL;
        break;
    case 'integer':
        echo "INTEGER : " . $something . PHP_EOL;
        break;
    case 'array':
        echo "ARRAY   : " . implode(",", $something) . PHP_EOL;
        break;
    case 'boolean':
        echo "BOOLEAN : " . (($something) ? "true" : "false") . PHP_EOL;
        break;
    default:
        var_dump($something);
        break;
    }
}
