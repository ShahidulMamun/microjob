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
                        <div class="col-lg-6"><h6 class="text-dark fw-bold mt-2">Deal Manage</h6></div>
                        <div class="col-lg-6 text-end"><a class="btn btn-primary btn-sm" href="#" role="button">Post New Deal</a></div>
                    </div>
                   </div>
               </div>
               <!--table-->
               <div class="card rounded-1 mt-3">
                   <div class="card-body">
                       <span class="text-dark px-0 mt-2">0 Result</span>
                       <div class="table-responsive">
                      <table class="table table-striped">
                          <thead class="table-light">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Status</th>
                              <th scope="col">job Name</th>
                              <th scope="col">Progress</th>
                              <th scope="col">Not Rated</th>
                              <th scope="col">Cost</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                          </tbody>
                      </table>
                    </div>
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