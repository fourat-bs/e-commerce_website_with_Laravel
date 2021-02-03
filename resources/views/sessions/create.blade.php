@extends('layouts.mainlayout')
@section('content')
<section class="ftco-section contact-section">
      <div class="container mt-5">
    <h2>Log In</h2>
    <form  method="POST" action="{{url('login')}}">
        {{ csrf_field() }}
        <div>
        <div class="mt-4">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
 
        <div class="mt-4" >
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
 
        <div class="d-flex justify-content-center mt-4" >
            <button style="cursor:pointer" type="submit" class="btn btn-primary ">Login</button>
        </div>
           <div>{{$errors->first('message') }} </div>
        </div>
    </form>
</div>
</section>
  @endsection