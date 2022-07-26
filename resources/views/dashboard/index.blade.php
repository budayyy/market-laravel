@extends('layouts.main')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Welcome Back <b>{{ $session->adm_name }}</b></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      {{-- alert --}}
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="content">
        <div class="container-fluid">

          @if ($session->role_id === 1)
              {{-- baris pertama --}}
            <div class="row">

              <!-- Category -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-info">
                 <div class="inner">
                     <h3>{{ $category }}</h3>
                     <p>Category</p>
                 </div>
                 <div class="icon">
                 <i class="fas fa-clone nav-icon"></i>
                 </div>
                 <a href="/category" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->

             <!-- Shipping -->
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-success">
                 <div class="inner">
                   <h3>{{ $shipping }}</h3>

                   <p>Shipping</p>
                 </div>
                 <div class="icon">
                   <i class="nav-icon fas fa-shopping-cart"></i>
                 </div>
                 <a href="/shipping" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
             <!-- ./col -->

             <!-- Orders -->
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-warning">
                 <div class="inner">
                   <h3>{{ $order }}</h3>

                   <p>Orders</p>
                 </div>
                 <div class="icon">
                   <i class="nav-icon fas fa-list-ul"></i>
                 </div>
                 <a href="/orders" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
             <!-- ./col -->

             <!-- Payment -->
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-danger">
                 <div class="inner">
                   <h3>{{ $payment }}</h3>

                   <p>Payment</p>
                 </div>
                 <div class="icon">
                 <i class="nav-icon fas fa-credit-card"></i>
                 </div>
                 <a href="/payment" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
             <!-- ./col -->

         </div>
         {{-- batas baris pertama --}}

         {{-- baris kedua --}}
         <div class="row">

           <!-- Member -->
           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-secondary">
               <div class="inner">
                 <h3>{{ $member }}</h3>
                 <p>Member</p>
               </div>
               <div class="icon">
               <i class="nav-icon fas fa-users"></i>
               </div>
               <a href="/member" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->

           {{-- City --}}
           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-gradient-danger">
               <div class="inner">
                 <h3>{{ $city }}</h3>
 
                 <p>Kota & Kabupaten</p>
               </div>
               <div class="icon">
               <i class="nav-icon fas fa-city"></i>
               </div>
               <a href="/city" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->

           {{-- consultant --}}
           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-gradient-primary">
               <div class="inner">
                 <h3>{{ $consult }}</h3>
 
                 <p>Consultant</p>
               </div>
               <div class="icon">
                 <i class="nav-icon fas fa-user-tie"></i>
               </div>
               <a href="/consultant" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->

           {{-- Builder --}}
           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-gradient-success">
               <div class="inner">
                 <h3>{{ $builder }}</h3>
 
                 <p>Builder</p>
               </div>
               <div class="icon">
                 <i class="nav-icon fas fa-users-cog"></i>
               </div>
               <a href="/builder" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->

         </div>
         {{-- /batas baris kedua --}}

         {{-- baris ketiga --}}
         <div class="row">

           <!-- User -->
           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-warning">
               <div class="inner">
                 <h3>{{ $user }}</h3>
                 <p>User</p>
               </div>
               <div class="icon">
               <i class="nav-icon fas fa-portrait"></i>
               </div>
               <a href="/users" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->

           <!-- Retail -->
           <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-secondary">
               <div class="inner">
                 <h3>{{ $retail }}</h3>
                 <p>Retail</p>
               </div>
               <div class="icon">
               <i class="nav-icon fas fa-store-alt"></i>
               </div>
               <a href="/retail" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->

         </div>
         {{-- batas baris ketiga --}}
          @elseif($session->role_id === 2)

          <div class="row">
           
           <!-- Category -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-info">
                 <div class="inner">
                     <h3>{{ $category }}</h3>
                     <p>Category</p>
                 </div>
                 <div class="icon">
                 <i class="fas fa-clone nav-icon"></i>
                 </div>
                 <a href="/category" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->

             <!-- Shipping -->
             <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $shipping }}</h3>

                  <p>Shipping</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                </div>
                <a href="/shipping" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <!-- Orders -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $order }}</h3>

                  <p>Orders</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-list-ul"></i>
                </div>
                <a href="/orders" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <!-- Retail -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $retail }}</h3>
                <p>Retail</p>
              </div>
              <div class="icon">
              <i class="nav-icon fas fa-store-alt"></i>
              </div>
              <a href="/retail" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           
          </div>
          @elseif($session->role_id === 3)
          <div class="row">
            <!-- Laporan -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <p>Laporan</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-file"></i>
                </div>
                <a href="/laporan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          @endif
            


        </div>
    </div>


@endsection