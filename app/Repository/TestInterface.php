<?php
namespace App\Repository;

interface TestInterface{
    public function all();
    public function get($id);
    public function store($data);
    public function update($id,$data);
    public function delete($id);

}
?>