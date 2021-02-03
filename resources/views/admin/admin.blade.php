@include('layouts.partials.head')
@include('layouts.partials.footer-scripts')
@include('admin.partials.nav')
<?php $cmd = DB::select('select * from users 
INNER JOIN commandes ON users.id = commandes.userID where DATE(date) = CURRENT_DATE()');
$commandes = json_decode(json_encode($cmd), true);
?>
<div class="container">
    		<div class="row">
    			<h2 class="h4">Commandes de jour </h2>
    			<div class="table-responsive">
    			<table class="table">
                <thead>
                  <tr>
                  	<th scope="col">nom</th>
                    <th scope="col">email</th>
                    <th scope="col">adresse</th>
                    <th scope="col">Code Postal</th>
                    <th scope="col">télé</th>
                    <th scope="col">Items</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">total payé</th>
                    <th scope="col">effectué le</th>
                  </tr>
                </thead>
                <tbody id="product-tbody">
                @foreach($commandes as $commande)
                
                	<tr id="cart-row">
                    <td>                                          
                      <h5>{{$commande['name']}}</h5>
                    </td>
                    <td>
                      <h5>{{$commande['email']}}</h5>
                    </td>
                    <td>
                     <h5>{{$commande['adresse']}}</h5>
                    </td>
                    <td>
                      <h5>{{$commande['codePostal']}}</h5>
                    </td>
                    <td>                                          
                      <h5>{{$commande['phone']}}</h5>
                    </td>
                    <td>                                          
                      <h5>{{$commande['item']}}</h5>
                    </td>
                    <td>                                          
                      <h5>{{$commande['quantity']}}</h5>
                    </td>
                    <td>                                          
                      <h5>{{$commande['total']}}</h5>
                    </td>
                    <td>                                          
                      <h5>{{$commande['date']}}</h5>
                    </td>
                  </tr>
                  @endforeach
              </tbody>
             </div>
    		</div>
    	</div>


  