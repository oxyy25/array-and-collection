<?php
require '../collection/collection.php';

class ArrayList implements ListInterface
{
    private array $elements = [];
    
    public function add($element): void
    {
        $this->elements[] = $element;
    }
    
    public function addFirst($element): void
    {
        array_unshift($this->elements, $element);
    }
    
    public function addLast($element): void
    {
        $this->add($element);
    }
    
    public function get(int $index)
    {
        if (!isset($this->elements[$index])) {
            throw new OutOfBoundsException("Index $index out of bounds");
        }
        return $this->elements[$index];
    }
    
    public function set(int $index, $element): void
    {
        if (!isset($this->elements[$index])) {
            throw new OutOfBoundsException("Index $index out of bounds");
        }
        $this->elements[$index] = $element;
    }
    
    public function remove(int $index): void
    {
        if (!isset($this->elements[$index])) {
            throw new OutOfBoundsException("Index $index out of bounds");
        }
        unset($this->elements[$index]);
        $this->elements = array_values($this->elements);
    }
    
    public function indexOf($element): int|false
    {
        return array_search($element, $this->elements, true);
    }
    
    public function contains($element): bool
    {
        return in_array($element, $this->elements, true);
    }
    
    public function size(): int
    {
        return count($this->elements);
    }
    
    public function isEmpty(): bool
    {
        return empty($this->elements);
    }
    
    public function clear(): void
    {
        $this->elements = [];
    }
    
    public function toArray(): array
    {
        return $this->elements;
    }
}

echo "ArrayList\n";
$arrayList = new ArrayList();
$arrayList->add("Java");
$arrayList->add("PHP");
$arrayList->add("Python");
echo "Size: " . $arrayList->size() . "\n";
echo "Get index 1: " . $arrayList->get(1) . "\n";
echo "Contains 'PHP': " . ($arrayList->contains("PHP") ? "Yes" : "No") . "\n\n";

echo "Iterator\n";
$iterator = new CollectionIterator($arrayList);
echo "Iterating ArrayList: ";
while ($iterator->hasNext()) {
    echo $iterator->next() . " ";
}
echo "\n\n";
?>