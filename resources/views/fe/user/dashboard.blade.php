@extends('fe.layouts.master')

@section('content')


<div class="container">
<h1>Dashboard</h1>







<div class="menu1">
<p class="menup"><a href='{{url('')}}'>Home</a>/<a href="#">Dashboard</a></p>
</div>

<section class="checkout-section ptb-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 acc">
          <div class="acc1">
            <div class="dark-bg tab-title-bg">
              <div class="heading-part">
                
              </div>
            </div>
            <div class="account-tab-inner">
            @include('fe.includes.dashboard_menu')
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="account-content1">
         
            <div class="acdash">
              <div class="row">
                <div class="col-12">
                  <div class="heading-part">
                    <h3 class="sub-heading">Hello, Derick</h3>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.<a class="account-link" id="subscribelink" href="#">Click Here</a></p>
                </div>
              </div>
            </div>
            <div class="m-0">
              <div class="row">
                <div class="col-12 acdash1">
                  <div class="heading-part">
                    <h3 class="sub-heading">Account Information</h3>
                  </div>
                  <hr>
                </div>
                <div class="col-md-6">
                  <div class="cart-total-table address-box commun-table">
                    <div class="table1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Shipping Address</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><ul>
                                <li class="inner-heading"> <b>Derick Geo</b> </li>
                                <li>
                                  <p>xxxxx wwwww yyyyyyyyyy,</p>
                                </li>
                                <li>
                                  <p>rrrrrrrrrr,bbbbbbbb, fffffffff..</p>
                                </li>
                                <li>
                                  <p>India</p>
                                </li>
                              </ul></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="cart-total-table address-box commun-table">
                    <div class="table1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Billing Address</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <ul>
                                <li class="inner-heading"> <b>deric geo</b> </li>
                                <li>
                                  <p>xxxxx wwwww yyyyyyyyyy</p>
                                </li>
                                <li>
                                  <p>rrrrrrrrrr,bbbbbbbb, fffffffff.</p>
                                </li>
                                <li>
                                  <p>India</p>
                                </li>
                              </ul>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
              
         
          
        
        </div>
      </div>
    </div>
  </section>
</div>

@endsection