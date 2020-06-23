@component('mail::message')
# Livraison

les produit a livré :
@foreach (Cart::content() as $product)
{{$product->model->title}} ,
@endforeach
<br>
a l'address : {{auth()->user()->address}}


{{ config('app.name') }}
@endcomponent
