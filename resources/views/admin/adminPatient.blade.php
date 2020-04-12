@extends('admin.layout')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <section class="content">
      <div class="container-fluid">

      		<div class="row">
          <!-- Left col -->
          		<section class="col-lg-12 connectedSortable">

          	<div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  List of Patient
                </h3>
                <div class="card-tools">
                  <!-- <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul> -->
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                         
                       <table class="table">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">First</th>
						      <th scope="col">Last</th>
						      <th scope="col">Handle</th>
						      <th scope="col">Action</th>

						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						    <?php for($i=0;$i<5;$i++){ ?>
						      <th scope="row">1</th>
						      <td>Mark</td>
						      <td>Otto</td>
						      <td>@mdo</td>
						      <td>
						      	<a href="{{url('admin/dprofile',$i)}}">View profile</a>
						      	<a href="{{url('admin/approveDocotr',$i)}}">Approve</a>
						      	<a href="{{url('admin/rejactDoctor',$i)}}">reject</a>


						      </td>
						    </tr>
						<?php } ?>
						  </tbody>
						</table>


                   </div>
                </div>
              </div><!-- /.card-body -->
            </div>

          		</section>
          	</div>
      </div>
     </section> 

@endsection 