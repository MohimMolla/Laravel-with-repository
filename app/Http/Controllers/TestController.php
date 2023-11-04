<?php

namespace App\Http\Controllers;


use App\Models\TestModel;
use App\Repository\TestRepository;
use Illuminate\Http\Request;


class TestController extends Controller
{
    protected $test;

    public function __construct(TestRepository $test) {
        $this->test = $test;
    }
    
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $tests = TestModel::get();

    //     return view('test.all', get_defined_vars());
    // }
    public function index()
    {
       $tests = $this->test->all();

        return view('test.all', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {

    //     $request->validate([
    //         'name' => 'required',
    //         'phone' => 'required',
    //         'address' => 'required',
    //     ]);
    //     TestModel::create($request->all());
    //     return redirect()->back()->with('massage', 'User created successfully');
    // }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
       $this->test->store($request->all());
        return redirect()->back()->with('massage', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $test = $this->test->get($id);
        return view('test.edit', get_defined_vars());
    }

//     public function edit($id)
// {
//     $test = TestModel::find($id);
//     return view('test.edit', get_defined_vars());
// }

    // public function edit(string $id)
    // {
    //     $test = TestModel::find($id);
    //     $update = $test;
    //     return view('test.edit', get_defined_vars());
    // }

//     public function edit($id)
// {
//     $test = TestModel::find($id);
//     $update = $test; // Assign $test to $update
//     return view('test.edit', get_defined_vars());
// }
    

 


    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request, )
    {
    
     $this->test->update($id,$request->all());
        return redirect('test');
    }
    // public function update(Request $request, $id)
    // {
    //     $test = TestModel::find($id);
    //     $test->update($request->all());
    //     return redirect('test');
    // }
    

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
    




public function delete($id)
{
    $this->test->delete($id);
    return redirect('test'); // Remove get_defined_vars()
}

// public function delete($id)
// {
//     $delete = TestModel::find($id);
//     $delete->delete();
//     return redirect('test'); // Remove get_defined_vars()
// }
}
