<?php

require '../collection/collection.php';
// node
class Node
{
    public $data;
    public ?Node $next;
    
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

//linked list
class LinkedList implements ListInterface
{
    private ?Node $head = null;
    private int $count = 0;
    
    public function add($element): void
    {
        $this->addLast($element);
    }
    
    public function addFirst($element): void
    {
        $newNode = new Node($element);
        $newNode->next = $this->head;
        $this->head = $newNode;
        $this->count++;
    }
    
    public function addLast($element): void
    {
        $newNode = new Node($element);
        
        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
        $this->count++;
    }
    
    public function get(int $index)
    {
        if ($index < 0 || $index >= $this->count) {
            throw new OutOfBoundsException("Index $index out of bounds");
        }
        
        $current = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $current = $current->next;
        }
        return $current->data;
    }
    
    public function set(int $index, $element): void
    {
        if ($index < 0 || $index >= $this->count) {
            throw new OutOfBoundsException("Index $index out of bounds");
        }
        
        $current = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $current = $current->next;
        }
        $current->data = $element;
    }
    
    public function remove(int $index): void
    {
        if ($index < 0 || $index >= $this->count) {
            throw new OutOfBoundsException("Index $index out of bounds");
        }
        
        if ($index === 0) {
            $this->head = $this->head->next;
        } else {
            $current = $this->head;
            for ($i = 0; $i < $index - 1; $i++) {
                $current = $current->next;
            }
            $current->next = $current->next->next;
        }
        $this->count--;
    }
    
    public function indexOf($element): int|false
    {
        $current = $this->head;
        $index = 0;
        
        while ($current !== null) {
            if ($current->data === $element) {
                return $index;
            }
            $current = $current->next;
            $index++;
        }
        return false;
    }
    
    public function contains($element): bool
    {
        return $this->indexOf($element) !== false;
    }
    
    public function size(): int
    {
        return $this->count;
    }
    
    public function isEmpty(): bool
    {
        return $this->count === 0;
    }
    
    public function clear(): void
    {
        $this->head = null;
        $this->count = 0;
    }
    
    public function toArray(): array
    {
        $array = [];
        $current = $this->head;
        
        while ($current !== null) {
            $array[] = $current->data;
            $current = $current->next;
        }
        return $array;
    }
}

echo "LinkedList\n";
$linkedList = new LinkedList();
$linkedList->addFirst("First");
$linkedList->addLast("Last");
$linkedList->add("Middle");
echo "Size: " . $linkedList->size() . "\n";
echo "Elements: " . implode(", ", $linkedList->toArray()) . "\n\n";
?>