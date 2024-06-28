<!DOCTYPE html>
<html>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,900&amp;display=swap" rel="stylesheet">
    <!-- end font -->

    <link rel="stylesheet" href="css/bootstrap.css">
    {{-- <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/fakeLoader.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/style.css"> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
        <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="form-group">
            <label>image</label>
           <input type="file" name="Photos" placeholder="image" class="form-control"> 
           </div>
         
           <button type="submit"  class="btn btn-dark">submit </button>
        
      
        </form>
    </div>
</div>
</div>
</div>
        <div class="container" >
            <h2 style="text-align:center; margin-top:50px" class="h2">UPLOADED IMAGES</h2>
          <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($photo as $myPhoto) 
                <tr>
                    <td>{{  $myPhoto->id }}  </td>
                    <td><img src="{{ asset('/images/'.$myPhoto->Photos) }}"  width="80px" height="80px" alt="image"> </td>
                        <td><a href="{{ url('edit_image/'.$myPhoto->id ) }}" class="btn btn-primary btn-sm">Edit</a></td>
                        <td><a href="{{ url('delete_image/'.$myPhoto->id ) }}" class="btn btn-primary btn-sm">Delete</a></td>
                 
                  
                </tr>
                 
                @endforeach
            </tbody>
          </table>

        </div> 
    </div>
    
</x-app-layout>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/fakeLoader.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.filterizr.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/contact-form.js"></script>
<script src="js/main.js"></script>
