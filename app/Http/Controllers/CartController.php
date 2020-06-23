<?php

namespace App\Http\Controllers;

use App\Mail\LivraisonMail;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request)
    {

        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->product_id;
        });

        if ($duplicata->isNotEmpty()) {
            return redirect()->route('products.index')->with('success','Le produit a deja été ajouté');
        }

        $product = Product::find($request->product_id);

        Cart::add($product->id, $product->title, 1, $product->price)->associate('App\Product');
        return redirect()->route('products.index')->with('success','Le produit a bien été ajouté');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return back()->with('success','le produit a été supprimé');
    }

    public function liraison()
    {
        Mail::to('admin@admin.com')->send(new LivraisonMail);
        Cart::destroy();
        return view('checkout.thankyou');
    }
}
