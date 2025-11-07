<?php

require '../collection/collection.php';

// Hash Map
class HashMap implements MapInterface
{
    private array $map = [];
    
    public function put($key, $value): void
    {
        $this->map[$key] = $value;
    }
    
    public function get($key)
    {
        if (!$this->containsKey($key)) {
            throw new OutOfBoundsException("Key '$key' does not exist");
        }
        return $this->map[$key];
    }
    
    public function remove($key): bool
    {
        if ($this->containsKey($key)) {
            unset($this->map[$key]);
            return true;
        }
        return false;
    }
    
    public function containsKey($key): bool
    {
        return array_key_exists($key, $this->map);
    }
    
    public function containsValue($value): bool
    {
        return in_array($value, $this->map, true);
    }
    
    public function keys(): array
    {
        return array_keys($this->map);
    }
    
    public function values(): array
    {
        return array_values($this->map);
    }
    
    public function contains($element): bool
    {
        return $this->containsValue($element);
    }
    
    public function size(): int
    {
        return count($this->map);
    }
    
    public function isEmpty(): bool
    {
        return empty($this->map);
    }
    
    public function clear(): void
    {
        $this->map = [];
    }
    
    public function toArray(): array
    {
        return $this->map;
    }
}

echo "HashMap\n";
$hashMap = new HashMap();
$hashMap->put("nim", "123456");
$hashMap->put("nama", "Budi");
$hashMap->put("jurusan", "Informatika");
echo "Get 'nama': " . $hashMap->get("nama") . "\n";
echo "Contains key 'nim': " . ($hashMap->containsKey("nim") ? "Yes" : "No") . "\n";
echo "All keys: " . implode(", ", $hashMap->keys()) . "\n\n";
?>