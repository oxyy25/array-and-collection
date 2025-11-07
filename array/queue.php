<?php
require '../collection/collection.php';

//Queue
class Queue implements QueueInterface
{
    private array $elements = [];
    
    public function enqueue($element): void
    {
        $this->elements[] = $element;
    }
    
    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue is empty");
        }
        return array_shift($this->elements);
    }
    
    public function peek()
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue is empty");
        }
        return $this->elements[0];
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

function printCollectionInfo(CollectionInterface $collection, string $name): void{
    echo "Collection: $name\n";
    echo "Size: " . $collection->size() . "\n";
    echo "Empty: " . ($collection->isEmpty() ? "Yes" : "No") . "\n";
    echo "Elements: " . implode(", ", $collection->toArray()) . "\n";
}

echo "Queue\n";
$queue = new Queue();
$queue->enqueue("Pembeli 1");
$queue->enqueue("Pembeli 2");
$queue->enqueue("Pembeli 3");
echo "Peek: " . $queue->peek() . "\n";
echo "Dequeue: " . $queue->dequeue() . "\n";
echo "After dequeue, peek: " . $queue->peek() . "\n\n";

printCollectionInfo($queue, "Queue");

?>
