@extends('layouts.mainlayout')
@section('content')
<?php
$id=auth()->user()->id;
$cmds=DB::table('commandes')->select('id','item','total','date')->where('userID',$id)->get();
$commandes = json_decode(json_encode($cmds,true));
 ?>
<section class="ftco-section contact-section">
      <div class="container">
        <div class="row">
					<div class="col-md-4 contact-info ftco-animate">
						<div class="row">
							<div class="col-md-12 mb-4">
	              <h2 class="h4">vos informations</h2>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Nom:     </span>{{auth()->user()->name}}</p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Email:   </span>{{auth()->user()->email}}</p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Adresse:    </span>{{auth()->user()->adresse}}</p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Code Postal:   </span>{{auth()->user()->codePostal}}</p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>téléphone:    </span>{{auth()->user()->phone}}</p>
	            </div>
					</div>
					</div>
					<div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate">
            <form action="{{url('myaccount')}}" class="contact-form" method="POST">
              {{csrf_field()}}
            	<div class="row">
            		<div class="col-md-6">
            			<div class="col-md-12 mb-4">
	              <h2 class="h4">Modifier vos Informations</h2>
	            </div>
	                <div class="form-group">
	                  <input id="name" type="text" class="form-control" placeholder="Nom" name="name">
	                </div>
                </div>
                <div class="col-md-6">
	                <div class="form-group">
	                  <input id="email" type="email" class="form-control" placeholder="Votre Email" name="email">
	                </div>
	                </div>
              </div>
              <div class="form-group">
                <input id="adresse" type="text" class="form-control" placeholder="Adresse" name="adresse">
              </div>
              <div class="form-group">
                <input id="codePostal" name="codePostal" id="" cols="30" rows="7" class="form-control" placeholder="Code Postal"></input>
                <div class="form-group">
                <input id="phone" name="phone" id="" cols="30" rows="7" class="form-control" placeholder="phone"></input>
                <div>{{$errors->first('message') }}</div>
              </div>

              <div class="form-group">
                <input name="send" type="submit" value="Enregistrer" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
      </div>
  </form>
</div>
</div>
</div>
</section>
<section class="ftco-section contact-section">
<div class="container">
    		<div class="row">
    			<h3 class="h4">Historique De Vos Commandes </h3>
    			<div class="table-responsive">
    			<table class="table">
                <thead>
                  <tr>
                    <th scope="col">Commande ID</th>
                    <th scope="col">Items</th>
                    <th scope="col">total payé</th>
                    <th scope="col">effectué le</th>
                  </tr>
                </thead>
                <tbody id="product-tbody">
                @foreach($commandes as $commande)
                
                	<tr id="cart-row">
                    <td>                                          
                      <h5>{{$commande->id}}</h5>
                    </td>
                    <td>
                      <h5>{{$commande->item}}</h5>
                    </td>
                    <td>
                     <h5>{{$commande->total}}</h5>
                    </td>
                    <td>
                      <h5>{{$commande->date}}</h5>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
             </div>
    		</div>
    	</div>
</section>
@endsection

