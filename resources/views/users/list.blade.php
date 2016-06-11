@extends('master')

@section('content')


<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="javascript:;">Administration</a></li>
				<li class="active">Users</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">System Users</h1>
			<!-- end page-header -->
			
			<!-- begin section-container -->
			<div class="section-container section-with-top-border">
                <p class="m-b-20">
                    
                </p>
                <!-- begin panel -->
                <div class="panel pagination-inverse clearfix m-b-0">
                    <table id="users-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
                        <thead>
                            <tr class="inverse">
                                <th data-sorting="disabled"></th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Surname</th>
                                <th>Cellphone</th>
                                <th>Email</th>
                                <th>Id Number</th>
                                <th>Active</th>
                                <th data-sorting="disabled"></th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
                <!-- end panel -->
			</div>
			<!-- end section-container -->

@endsection

@section('custom_stript')

<script src="{{ asset('assets/js/users.js') }}"></script>

@endsection