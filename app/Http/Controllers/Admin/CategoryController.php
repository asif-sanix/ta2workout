<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Category\CategoryCollection;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index(Request $request)
    {
       // if ($request->ajax()) {
       //      $datas = Category::orderBy('created_at','desc')->select(['id','name','slug','status','image','created_at']);
       //      $search = $request->search['value'];

       //      if ($search) {
       //          $datas->where('name', 'like', '%'.$search.'%');
       //          $datas->orWhere('slug', 'like', '%'.$search.'%');
              
       //      }
       //      $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
       //      $datas = $datas->paginate($request->length);
       //      return response()->json(new CategoryCollection($datas));
           
       //  }



        if ($request->expectsJson()) {

            $categories = Category::select(['id','name','position','parent'])->orderBy('created_at','asc')->get();
            $cat = array();
            foreach ($categories as $cat2) {
                $cat[]=['id'=>$cat2->id,'position'=>$cat2->position,'text'=>$cat2->name,'a_attr'=>['href'=>route('admin.category.show',$cat2->id)],'parent'=>($cat2->parent)?$cat2->parent:'#'];
            }
            return response()->json($cat);
        }

        return view('admin.category.create',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
            'name'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'body' =>'required',
            'status'=>'required|integer',
        ]);
        
        $category = new Category;
        $category->name = $request->name;
        $category->body = $request->body;
        $category->status = $request->status;

        $category->name = $request->name;
        $category->meta_title = $request->metaTitle??$request->name;
        $category->meta_keywords = $request->metaKeywords??$request->name;
        $category->meta_description = $request->metaDescription??$request->body;
        $category->parent = $request->parent;
        $category->status = $request->status;

        if($request->hasFile('image')){
            $category->image = 'storage/'.$request->image->store('category');
        }  

        if($category->save()){ 
            // return redirect()->route('admin.category.index')->with(['class'=>'success','message'=>'Category Created successfully.']);
            return view('admin.category.create',compact('category'));
        }

        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.category.create',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'name'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'body' =>'required',
            'status'=>'required|integer',
        ]);
        
        $category = Category::find($id);
        $category->name = $request->name;
        $category->body = $request->body;
        $category->status = $request->status;

        $category->name = $request->name;
        $category->meta_title = $request->metaTitle??$request->name;
        $category->meta_keywords = $request->metaKeywords??$request->name;
        $category->meta_description = $request->metaDescription??$request->body;
        $category->status = $request->status;

        if($request->hasFile('image')){
            $category->image = 'storage/'.$request->image->store('category');
        }  

        if($category->save()){ 
            // return redirect()->route('admin.category.index')->with(['class'=>'success','message'=>'Category Created successfully.']);
            return view('admin.category.edit',compact('category'));
        }

        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, $id)
    {
        //return "ok";
        $catId = $id; 
        if(category::where('id',$id)->delete()){
            $cat1 = Category::select('id')->where('parent',$catId);
            if ($cat1->count()) {
               $cat2 = Category::select('id')->whereIn('parent',$cat1->get())->delete();
            }
            $cat1->delete();
            //  $logMessage= array(
            //     'user_id'=>auth('admin')->user()->id,
            //     'table'=>'Category',
            //     'table_id'=>$id
            // );
            
            return redirect()->route('admin.'.request()->segment(2).'.index')->with(['message'=>'Category deleted successfully ...', 'class'=>'success']);  
        }
        return redirect()->back()->with(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
