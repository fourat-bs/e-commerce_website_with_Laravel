<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class PaymentController extends Controller
{  
   
    public function checkout(){
        return view('pages.stripe');
        
    }
    public function submit(Request $request)
    {
    	$this->validate($request,[
     'item' => '',
     'quantity' => '',
     'total' =>'',
       ]);
     $data = array(

     'item' =>$request->item,
     'quantity' =>(int)$request->quantity,
     'total' =>(float)$request->total,
 );
      $id=random_int(1,1000);
       \DB::table('queued')
        ->updateOrInsert(
        ['id'=> $id ,'item' => $data['item'], 'quantity' => $data['quantity'], 'total' => $data['total'] ,'userID'=>auth()->user()->id, ]
    );
        return redirect()->to('/checkout');
    } 
    public function  charge(Request $request)

    {   
       Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = Customer::create(array(
            'email' => $request->stripeEmail,
            'source'  => $request->stripeToken
        ));
        $id = auth()->user()->id;
        $tot=\DB::table('queued')->select('total')->where('userID',$id)->get();
        $total = json_decode(json_encode($tot[0]), true);
        $totalstripe=(float)$total['total']*100;
        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => $totalstripe,
            'currency' => 'eur',
        ));
        /* update commandes table */ 
        $idr = random_int(0,100000);
        $datar = \DB::table('queued')->select('item','total', 'quantity')->where('userID',$id)->get();
        $data= json_decode(json_encode($datar[0]),true);
 
        \DB::table('commandes')
        ->insert(array([ 'id' => $idr ,'item' => $data['item'], 'quantity' => $data['quantity'], 'total' => $data['total'] ,'userID'=>auth()->user()->id, ])
    );

        /* delete request */
        \DB::table('queued')->where('userID',$id)->delete();
        return redirect()->to('/myaccount');
    } 
}

