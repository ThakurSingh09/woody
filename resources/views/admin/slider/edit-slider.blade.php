@include('admin.layouts.head')
@extends('admin.layouts.master')
@extends('admin.sidebar.sidebar')
@section('content')
<style>
   .notifaction-green {
   color: green;
   }
   .notification-red {
   color: red;
   }
   .col-md-18.text-right {
   margin: 5px;
   }
   .slider-container {
   position: relative;
   display: inline-block;
   }
   .image-wrapper {
   position: relative;
   display: inline-block;
   }
   .delete-link {
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   color: white;
   background-color: red;
   padding: 5px;
   border-radius: 50%;
   }
</style>
<section class="content">
   @if (Session::has('success')) 
   <div class="notifaction-green">
      <p>{{ Session::get('success') }}</p>
   </div>
   @endif 
   @if (Session::has('unsuccess')) 
   <div class="notifaction-red">
      <p> {{ Session::get('unsuccess') }}</p>
   </div>
   @endif
   <div class="col-md-18 text-right">
      <a href="{{ url('admin/all-sliders') }}" class="btn btn-primary">All Sliders</a>
   </div>
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Edit Slider</h3>
      </div>
      <form action="{{route('admin.update.slider', $sliders->id)}}" method="POST" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" value="{{$sliders->name}}" class="form-control">
            </div>
            <div class="form-group">
               <label for="short_desc">Short Desc</label>
               <textarea name="short_desc" class="form-control">{{$sliders->short_desc}}</textarea>
            </div>
            <div class="form-group">
               <label for="long_desc">Long Desc</label>
               <textarea name="long_desc" class="form-control">{{$sliders->long_desc}}</textarea>
            </div>
            <div class="form-group">
               <label for="image">Image</label>
               <input type="file" name="image" value="" class="form-control">
            </div>
            <div class="slider-container">
            <div class="image-wrapper">
               @if(!empty($sliders->image) && file_exists(public_path('uploads/admin/sliders/' . $sliders->image)))
               <img src="{{ asset('public/uploads/admin/sliders/' . $sliders->image) }}" width="150px" height="130px" alt="">
               <a class="delete-link" href="{{ url('admin/delete-attach', $sliders->id) }}"><i class="fas fa-times"></i></a>
               @else
                  No Image Available
               @endif
            </div>
          </div>
            <div class="form-group">
               <label for="start_date">Start Date</label>
               <input type="date" id="date" name="start_date" value="{{$sliders->start_date}}" class="form-control">
            </div>
            <div class="form-group">
               <label for="end_date">End Date</label>
               <input type="date" id="date" name="end_date" value="{{$sliders->end_date}}" class="form-control">
            </div>
            <div class="form-group">
               <label for="status">Status:</label>
               <select id="status" name="status" class="form-control">
                  <option value="active" @if($sliders->status == 'active') selected @endif>Active</option>
                  <option value="pending" @if($sliders->status == 'pending') selected @endif>Pending</option>
                  <option value="suspend" @if($sliders->status == 'suspend') selected @endif>Suspend</option>
                  <option value="approved" @if($sliders->status == 'approved') selected @endif>Approved</option>
               </select>
            </div>
            <div class="form-check">
               <input type="submit" class="btn btn-success submit_form" name="submit" value="Update">
               <label class="form-check-label" for="examplesubmit"></label>
            </div>
         </div>
   </div>
   </form>
</div>
</section>
@endsection