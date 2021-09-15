<?php

namespace App\Http\Controllers;

use App\Models\Product;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Session\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $getData=Product::all();
        $getData=Product::paginate(3);
        // $getData=Product::simplePaginate(3);
        return view('products',compact('getData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $prod )
    {   
        $val=['pname' => 'required|max:15',
        'pdetail' => 'required|max:300',
        'pimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',];
        $this->validate($request,$val);
        $prod->name=$request->pname;
        $prod->detail=$request->pdetail;
        
        if ($image = $request->file('pimage')) {
            $dest_Path = 'storage/app/image/';
            $prod_image = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($dest_Path, $prod_image);
            $prod->image = "$prod_image";
        }
       
        $prod->save();
        return redirect('/')
        ->with('success','Product added successfully.');
        
       
        // $input = $request->all();
  
        // if ($image = $request->file('pimage')) {
        //     $destinationPath = 'storage/app/image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['pimage'] = "$profileImage";
        // }
    
        // Product::create($input);
     
        // return redirect()->route('/')
        //                 ->with('success','Product created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id=null)
    {   
        $editData=Product::find($id);
        return view('edit',compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   
       $editData=Product::find($id);
        $val=['pname' => 'required|max:15',
        'pdetail' => 'required|max:300',
        'pimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',];
        $this->validate($request,$val);
        $editData->name=$request->pname;
        $editData->detail=$request->pdetail;
        
        if ($image = $request->file('pimage')) {
            $file='storage/app/image/'.$editData->image;
            if(File::exists($file)){
                File::delete($file);
            }
            $dest_Path = 'storage/app/image/';
            $prod_image = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($dest_Path, $prod_image);
            $editData->image = "$prod_image";
        }
        
       
        $editData->save();
        return redirect('/')
        ->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,$id)
    {
        $product=Product::find($id);
        $product->delete();
        
        return redirect('/')
        ->with('success','Product Deleted successfully.');
    }
}
