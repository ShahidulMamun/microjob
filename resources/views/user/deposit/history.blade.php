@extends('user.layouts.app')
@section('content')
    <header class="topbar">
        @include('user.layouts.partials.navbar') 
    </header>
  <aside class="sidebar" id="sidebar">
      @include('user.layouts.partials.sidebar')
  </aside>
  
  
  <div class="content">
             <div class="row g-4">
                    @include('user.layouts.partials.braking_news')
                  <div class="container mt-5">
     <div class="row">
           <div class="col-lg-12">
             <div class="card rounded-1">
                   <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6"><span class="text-success px-0 mt-2">{{$count}} Result</span></div>
                        <div class="col-lg-6 text-end"><a class="btn btn-primary btn-sm" href="{{ route('user.deposit')}}" role="button"><i class="bi bi-currency-dollar"></i> Deposit</a></div>
                    </div>
                   </div>
               </div>
<div class="col-12 mt-3 px-0">
    <table class="table table-striped table-responsive">
  <thead class="table-light">
    <tr class="">
      <th scope="col">Method</th>
      <th scope="col">TrnxID</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">Reason</th>
    </tr>
  </thead>
  <tbody>
    @foreach($deposits as $deposit)
    <tr>
      <td>{{$deposit->method->name}}</td>
      <td>{{$deposit->transaction_id}}</td>
      <td><strong class="text-success">${{$deposit->amount}}</strong></td>
     
      <td>
        @if($deposit->status=="pending")
        <span class="text-dark"><i class="fa fa-spinner" aria-hidden="true"></i> {{$deposit->status}}</span>

        @elseif($deposit->status=="approved")
        <span class="text-success"><i class="fa fa-check" aria-hidden="true"></i> {{$deposit->status}}</span>
         
        @elseif($deposit->status=="rejected")
        <span class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> {{$deposit->status}}</span>
        @endif



      </td>
      <td>

         @if($deposit->status=="pending")
          Request Sent {{$deposit->created_at->diffForHumans()}}

         @elseif($deposit->status=="approved")

         Approved {{ $deposit->approved_at->diffForHumans() }} 

         @elseif($deposit->status=="rejected")

          Rejected {{$deposit->updated_at->diffForHumans()}}
         @endif


        </td>
        <td>{{$deposit->reason}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
    </div>
     </div>
 </div>
 </div>
 </div>
  
<!--footer-->
<footer class="mt-5 footer-section">
    @include('user.layouts.partials.footer')
</footer>
@endsection