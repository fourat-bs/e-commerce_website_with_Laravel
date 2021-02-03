@include('layouts.partials.head')
@include('layouts.partials.footer-scripts')
@include('admin.partials.nav')
<?php 
$items = DB::select('select * from items');
$data=array();


foreach($items as $item)
{ 
  $data += array($item->nom => $item->prix);
}

?>
<div class="container d-flex justify-content-center">
 	<div class="row">

        
    
            <form action="{{url('update')}}" class="contact-form" method="POST">
              {{csrf_field()}}
            	<h1 class="mt-4">Modification des items</h1>
               <div class="form-group">
                         <select name="item" id="item" class="form-control">
                          @foreach($items as $item)
                          <option>{{$item->nom}}</option>
                         @endforeach
                        </select>
               </div>
              <div class="form-group">
                <input id="nom" type="text" class="form-control" placeholder="nom" name="nom">
              </div>
              <div class="form-group">
                <input id="prix" name="prix" id="prix" class="form-control" placeholder="prix">
              </div>
                 <div>{{$errors->first('message') }}</div>
              <div class="form-group">
                <input name="send" type="submit" value="Modifier" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
      </div>
