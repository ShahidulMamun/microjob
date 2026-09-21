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
            <div class="col-lg-12">
             <div class="card rounded-1">
                   <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6"><a class="btn btn-primary btn-sm" href="#" role="button"><i class="bi bi-arrow-right-square"></i> {{$pageTitle}}</a></div>
                        <div class="col-lg-6 text-end"><a class="btn btn-primary btn-sm" href="#" role="button"><i class="bi bi-list-ul"></i> {{count($notifications)}} Result</a></div>
                    </div>
                   </div>
               </div>
               <!--table-->
               <div class="card rounded-1 mt-3">
                   <div class="card-body">
                <table class="table table-responsive">
                  <thead class="table-light">
                    <tr class="">
                      <th scope="col">Notice</th>
                      <th scope="col">Status</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($notifications as $notification)
                    <tr>
                      <td>{{$notification->message}}</td>
                      <td>
                        @if($notification->status=="pending")
                        <span class="text-dark"><i class="fa fa-spinner" aria-hidden="true"></i> {{$notification->status}}</span>
                
                        @elseif($notification->status=="read")
                        <span class="text-success"><i class="fa fa-check" aria-hidden="true"></i> {{$notification->status}}</span>
                       
                        @endif
                
                      </td>
                     
                       <td>{{$notification->created_at->format('d M Y, h:i A')}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                     </div>
                  </div>
               <!--end table-->
               </div>
               </div>
               </div>

<footer class="mt-5 footer-section">
    @include('user.layouts.partials.footer')
</footer>
@endsection