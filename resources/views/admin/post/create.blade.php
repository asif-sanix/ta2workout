@extends('admin.layouts.master')
@section('title','Create Post')
@push('links')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/plugins/forms/switch.css')}}">
<link rel="stylesheet" href="{{asset('admin-assets/dropify/css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('admin-assets/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jstree/3.3.3/themes/default/style.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('main')

<div class="content-header row">

    <div class="content-header-left col-md-6 col-12 mb-2">
      <h5 class="content-header-title mb-0">Post Create</h5>
    </div>

    <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
            @can('add_slider')
                <a href="{{ route('admin.post.create') }}" class="btn btn-primary btn-sm">Add Post</a>
            @endcan
       </div>
    </div>
</div>
</div>

<div class="card">
    <div class="card-content">
        <div class="card-body">
          {!! Form::open(['method' => 'POST', 'route' => 'admin.post.store', 'class' => 'form-horizontal','files'=>true]) !!}

            <div class="row my-1">
                <div class="col-lg-7 col-7">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Post Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Post Title']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                            {!! Form::label('subtitle', 'Subtitle') !!}
                            {!! Form::text('subtitle', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Post Subtitle']) !!}
                            <small class="text-danger">{{ $errors->first('subtitle') }}</small>
                        </div>


                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            {!! Form::label('body', 'Content') !!}
                            {!! Form::textarea('body', null, ['class' => 'form-control summernote', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('body') }}</small>
                        </div>
                    
                        <div class="btn-group">
                            {!! Form::submit("Add Post", ['class' => 'btn btn-info']) !!}
                        </div>

                </div>

                <div class="col-lg-5 col-5">

                    
                    <div class="form-group">
                        <div class="checkbox{{ $errors->has('status') ? ' has-error' : '' }}">
                            {!! Form::label('status', 'Status') !!}<br>
                             {!! Form::checkbox('status', '1', 1, ['id' => 'switch1','class'=>'switch']) !!} 
                        </div>
                        <small class="text-danger">{{ $errors->first('status') }}</small>
                    </div>


                    <div class="form-group clearfix categorySection">
                        <label class="control-label">Select Category</label>
                        {!! Form::hidden('category',null, ['id'=>'categoryId','required']) !!}
                        <div class="input-group m-b-10">
                            {!! Form::text('categories[]', null, ['readonly', 'id'=>'categoryInput', 'class'=>'form-control','required']) !!}
                            <div class="input-group-btn">
                                <button id="loadTree" tabindex="-1" class="btn btn-gray" type="button"><i class="fa fa-list"></i></button>
                            </div>
                        </div>

                        <div class="categoryTree" style="display: none;position: absolute;z-index: 1;background-color: #ddd;border:1px solid #999;width: 95%;margin-top: 0px;z-index:1000" id="category">
                            <i class="fa fa-spinner fa-spin"></i>
                        </div>
                        <p class="text-danger">{{ $errors->first('category') }}</p>
                    </div>



                    <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">

                            {!! Form::label('image', 'Image') !!}

                            {!! Form::file('image', ['class'=>'dropify']) !!}

                            <small class="text-danger">{{ $errors->first('image') }}</small>

                    </div>
                    
                </div>
            </div>
            {!! Form::close() !!}

        </div>
             
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('admin-assets/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('admin-assets/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
  type="text/javascript"></script>
<script src="{{asset('admin-assets/dropify/js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/dropify/dropify.js')}}"></script>
<script src="{{asset('admin-assets/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('admin-assets/app-assets/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jstree/3.3.3/jstree.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>

<script type="text/javascript">

    jQuery(document).ready(function() {



        $('.summernote').summernote({

height: 350, // set editor height

minHeight: null, // set minimum height of editor

maxHeight: null, // set maximum height of editor

focus: false, // set focus to editable area after initializing summernote

popover: { image: [], link: [], air: [] }

});



        $('.inline-editor').summernote({

            airMode: true

        });



    });

     $("#back").click(function(){
            window.location.href="{{ route('admin.'.'post'.'.index') }}"
        }) 

    document.onclick = function(ev){
        if(ev.target.nodeName !== 'I' && ev.target.nodeName !== 'A')  {
            $('#category').slideUp('medium');
        }
    };
   $('#loadTree').on('click',function(event){
       $('#category').slideToggle('medium'); 
       jsTreeLoad();
       event.stopPropagation();
   }); 
   
    $('#category').on('changed.jstree',function(e,data){
        var i, j, r = [],s = []; 
        for(i = 0, j = data.selected.length; i < j; i++) {
           r.push(data.instance.get_node(data.selected[i]).text); 
           s.push(data.instance.get_node(data.selected[i]).id); 
        } 
        $('#categoryInput').val(r.join(', ')); 
        $('#categoryId').val(s.join(', ')); 
    }); 
    function jsTreeLoad(){
        $('#category').jstree({
           'core' : {
               'data' : {
                   'url' : '{{ route('admin.'.request()->segment(2).'.index')}}?type=category',
               } 
           }, 
        }); 
    } 

 </script>

@endpush