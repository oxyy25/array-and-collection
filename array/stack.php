<?php

require '../collection/collection.php';

//stack 
class Stack implements StackInterface
{
    private array $elements = [];
    
    public function push($element): void
    {
        $this->elements[] = $element;
    }
    
    public function pop()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Stack is empty");
        }
        return array_pop($this->elements);
    }
    
    public function peek()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Stack is empty");
        }
        return $this->elements[count($this->elements) - 1];
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

echo "Stack\n";
$stack = new Stack();
$stack->push("Page 1");
$stack->push("Page 2");
$stack->push("Page 3");
echo "Peek: " . $stack->peek() . "\n";
echo "Pop: " . $stack->pop() . "\n";
echo "After pop, peek: " . $stack->peek() . "\n\n";
?>