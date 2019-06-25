<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Slider\SliderCollection;
use App\Model\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $datas = Slider::orderBy('created_at','desc')->select(['id','title','sub_title','button_text','button_link','status','image','created_at']);
            $search = $request->search['value'];

            if ($search) {
                $datas->where('job_no', 'like', '%'.$search.'%');
                $datas->orWhere('po_date', 'like', '%'.$search.'%');
              
            }
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $datas = $datas->paginate($request->length);
            return response()->json(new SliderCollection($datas));
           
        }

        return view('admin.slider.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        return view('admin.slider.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id )
    {   
       
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request) {

            $this->validate($request,[
                'title'=>'required',
                'sub_title'=>'required',
                'button_text'=>'required',
                'button_link'=>'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4000',    
            ]);

            $slider = new Slider;
          
            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->button_text = $request->button_text;
            $slider->button_link = $request->button_link;
            $slider->status = $request->status?1:0;

            if($request->hasFile('image')){
                $slider->image = 'storage/'.$request->image->store('slider');
            }   

            if($slider->save()){ 
                return redirect()->route('admin.slider.index')->with(['class'=>'success','message'=>'Slider Created successfully.']);
            }

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }


    public function edit(Request $request, $id )
    {   
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }
        
   
    public function update(Request $request, $id)
    {
        $this->validate($request,[
                'title'=>'required',
                'sub_title'=>'required',
                'button_text'=>'required',
                'button_link'=>'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4000',    
            ]);

            $slider = Slider::find($id);
          
            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->button_text = $request->button_text;
            $slider->button_link = $request->button_link;
            $slider->status = $request->status?1:0;

            if($request->hasFile('image')){
                $slider->image = 'storage/'.$request->image->store('slider');
            }   

            if($slider->save()){ 
                return redirect()->route('admin.slider.index')->with(['class'=>'success','message'=>'Slider Updated successfully.']);
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
        if(Slider::where('id',$id)->delete()){
            
            return response()->json(['message'=>'Slider Deleted successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
