@include('layouts.partials.head')
@include('layouts.partials.footer-scripts')
@include('admin.partials.nav')


     

 <div class="container d-flex justify-content-center">
 	<div class="row">

        
    
            <form action="{{url('insert')}}" class="contact-form" method="POST">
              {{csrf_field()}}
            	<h1 class="mt-4">Insertion des items</h1>
              <div class="form-group">
                <input id="nom" type="text" class="form-control" placeholder="nom" name="nom">
              </div>
              <div class="form-group">
                <input id="prix" name="prix" id="prix" class="form-control" placeholder="prix">
              </div>
                 <div>{{$errors->first('message') }}</div>
              <div class="form-group">
                <input name="send" type="submit" value="Inserer" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
      </div>

