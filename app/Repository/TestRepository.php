<?php
namespace App\Repository;

use App\Models\TestModel;

class TestRepository implements TestInterface{
    public function all(){
        return TestModel::get();
    }
    public function get($id){
        return TestModel::find($id);
    }
    public function store($data){
        return TestModel::create($data);
    }
    public function update($id,$data){
        return TestModel::find($id)->update($data);
    }
    
    public function delete($id)
    {
        return TestModel::destroy($id);
    }
    
}
