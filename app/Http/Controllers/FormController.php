<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Model\Product;
use App\Contact;
use Validator;
use Auth;
 
class FormController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function newcreate()
    {
        return view('create');
    } 

    public function thankyou() 
    {
        return view('thanks');
    }

    public function AjaxImageUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|min:3|unique:products',
            'description' => 'required',
            'price' => 'required|max:10',
            'category' => 'required|max:20',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'color' => 'required'
      ]);


      if ($validator->passes()) {
        $input = $request->all();
        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->image = $input['image'];
        $product->color = $request->color;
        $product->user_id = Auth::user()->id;


        // Product::create($input);
        if ($product->save()) {
        return response()->json(['success'=>'done', 'image' => $input['image'], 'productName' => $request->name, 'description' => $request->description, 'price' => $request->price, 'category' => $request->category, 'color' => $request->color]);
        } else
        {
            return response()->json(['success'=>'failed']);
        }
      }
      return response()->json(['error'=>$validator->errors()->all()]);
    }


    public function imagecreate()
    {
        return view('newcreate');
    }

}