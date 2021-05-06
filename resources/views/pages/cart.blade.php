@extends('layouts.app')

@section('title')
   Store Cart Page
@endsection

@section('content')
   <div class="page-content page-cart">
      <section
         class="store-breadcrumbs"
         data-aos="fade-down"
         data-aos-delay="100">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <nav>
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                           <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Cart</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </section>
      <section class="store-cart">
         <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
               <div class="col-12 table-responsive">
                  <table class="table table-borderless table-cart">
                     <thead>
                        <tr>
                           <td>Image</td>
                           <td>Name &amp; Seller</td>
                           <td>Price</td>
                           <td>Menu</td>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($carts as $cart)
                           <tr>
                              <td style="width: 20%">
                                 @if ($cart->product->galleries)
                                    <img
                                       src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                                       alt=""
                                       class="cart-image w-100" />
                                 @endif
                              </td>
                              <td style="width: 35%">
                                 <div class="product-title">{{ $cart->product->name }}</div>
                                 <div class="product-subtitle">by
                                    {{ $cart->product->user->store_name }}</div>
                              </td>
                              <td style="width: 35%">
                                 <div class="product-title">@currency($cart->product->price)</div>
                                 <div class="product-subtitle">Rupiah</div>
                              </td>
                              <td style="width: 20%">
                                 <form action="{{ route('cart-delete', $cart->id) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-remove-cart">Remove</button>
                                 </form>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
               <div class="col-12">
                  <hr class="mb-4" />
               </div>
               <div class="col-12">
                  <h2 class="mb-4">Shipping Details</h2>
               </div>
            </div>
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="addressOne">Address 1</label>
                     <input
                        type="text"
                        class="form-control"
                        id="addressOne"
                        name="addressOne"
                        value="Setra Duta Cemara" />
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="addressTwo">Address 2</label>
                     <input
                        type="text"
                        class="form-control"
                        id="addressTwo"
                        name="addressTwo"
                        value="Blok B2 No. 34" />
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="provence">Provence</label>
                     <select name="provence" id="provence" class="form-control">
                        <option value="West Java">West Java</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="city">City</label>
                     <select name="city" id="city" class="form-control">
                        <option value="Bandung">Bandung</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="postalCode">Postal Code</label>
                     <input
                        type="text"
                        class="form-control"
                        id="postalCode"
                        name="postalCode"
                        value="123999" />
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="country">Country</label>
                     <input
                        type="text"
                        class="form-control"
                        id="country"
                        name="country"
                        value="Blok B2 No. 34" />
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="mobile">Mobile</label>
                     <input
                        type="text"
                        class="form-control"
                        id="mobile"
                        name="mobile"
                        value="Blok B2 No. 34" />
                  </div>
               </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="250">
               <div class="col-12">
                  <hr class="mb-4" />
               </div>
               <div class="col-12">
                  <h2 class="mb-2">Payment Information</h2>
               </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="300">
               <div class="col-4 col-md-2">
                  <div class="product-title">$10</div>
                  <div class="product-subtitle">Country Tax</div>
               </div>
               <div class="col-4 col-md-3">
                  <div class="product-title">$280</div>
                  <div class="product-subtitle">Product Insurance</div>
               </div>
               <div class="col-4 col-md-2">
                  <div class="product-title">$580</div>
                  <div class="product-subtitle">Ship to Jakarta</div>
               </div>
               <div class="col-4 col-md-2">
                  <div class="product-title text-success">$290,420</div>
                  <div class="product-subtitle">Total</div>
               </div>
               <div class="col-8 col-md-3">
                  <a
                     href="{{ route('success') }}"
                     class="btn btn-success btn-checkout mt-4 px-4 py-2 btn-block">Checkout
                     Now</a>
               </div>
            </div>
         </div>
      </section>
   </div>
@endsection
