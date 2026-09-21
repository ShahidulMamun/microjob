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
               <!--job table-->
               <div class="col-lg-12">
                <div class="card border-0 rounded-2">
                    <div class="card-body">
                        <div class="filter-scroll">
                <form>
                <div class="row flex-nowrap flex-sm-wrap">
                       <div class="col-5 col-sm-5 col-md-5 mt-3 text-start">
                            <span>400 Result</span>
                        </div>
                                
                    <div class="col-10 col-sm-3 col-md-3 mt-3">
                        <select class="filter-select w-100">
                            <option>All Categories</option>
                            <option value="">Categories</option>
                              <option>Ads Click</option>
                              <option>SEO</option>
                              <option>Visit</option>
                              <option>Search</option>
                              <option>Engage</option>
                        </select>
                    </div>

                    <div class="col-10 col-sm-2 col-md-2 mt-3">
                        <div class="position-relative">
                            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                            <input type="text" class="form-control ps-5" placeholder="Search Jobs Here">
                        </div>
                    </div>
                    <div class="col-10 col-sm-2 col-md-2 mt-3">
                        <select class="filter-select w-100 bg-white">
                             <option>Most Recent</option>
                              <option>Oldest First</option>
                              <option>Highest Pay</option>
                              <option>Lowest Pay</option>
                        </select>
                    </div>
                            </div>
                        </form>
                    </div>
                </div>
               </div>
               <!--table all jobs-->
               <div class="card border-0 rounded-2 mt-3">
                   <div class="card-body">
                       <div class="table-responsive">
                       <table class="table">
                      <thead>
                        <tr>
                         <th scope="col">Status</th>
                          <th scope="col">Job Name</th>
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
                          <td>@mdo</td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                   </div>
               </div>
               </div>
           </div>
       </div>
<footer class="mt-5 footer-section">
    @include('user.layouts.partials.footer')
</footer>
@endsection