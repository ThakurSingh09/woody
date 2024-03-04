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
         <h3 class="card-title">Add New Slider</h3>
      </div>
      <form action="{{route('admin.submit.slider')}}" method="POST" enctype="multipart/form-data">
         @csrf 
         <div class="card-body">
            <div class="form-group">
               <label for="name">Name</label>
               <input type="text" name="name" value="" class="form-control">
            </div>
            <div class="form-group">
               <label for="short_desc">Short Desc</label>
               <textarea name="short_desc" class="form-control"></textarea>
            </div>
            <div class="form-group">
               <label for="long_desc">Long Desc</label>
               <textarea name="long_desc" class="form-control"></textarea>
            </div>
            <div class="form-group">
               <label for="image">Image</label>
               <input type="file"  name="image" multiple value="" class="form-control">
            </div>
            <div class="form-group">
               <label for="start_date">Start Date</label>
               <input type="date" id="date" name="start_date" value="" class="form-control">
            </div>
            <div class="form-group">
               <label for="end_date">End Date</label>
               <input type="date" id="date" name="end_date" value="" class="form-control">
            </div>
            <div class="form-group">
               <label for="status">Status:</label>
               <select id="status" name="status" class="form-control">
                  <option value="active">Active</option>
                  <option value="pending">Pending</option>
                  <option value="suspend">Suspend</option>
                  <option value="approved">Approved</option>
               </select>
            </div>
            <div class="form-check">
               <input type="submit" class="btn btn-success submit_form" name="submit" value="Save">
               <label class="form-check-label" for="examplesubmit"></label>
            </div>
         </div>
   </div>
   </form>
</div>
</section>
@endsection