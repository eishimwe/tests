@extends('master')


@section('content')


<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="{{ url('/banking-details') }}">Banking Details</a></li>
				<li class="active">Add New</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Add new banking details</h1>
			<!-- end page-header -->
			
			<!-- begin section-container -->
			<div class="section-container section-with-top-border p-b-10">
			    <!-- begin row -->
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-6">
                        
                        
                        

                        	{!! Form::open(['url'=>'save_bank_account','method'=>'post','class'=>'form-horizontal']) !!}

						  
                            <div class="form-group m-b-10">
                                <label class="col-md-3 control-label">Bank Name</label>
                                <div class="col-md-7">
                                    {!! Form::select('Bank Name',$selectBankTypes,0,array('class' => 'form-control')) !!}
                                </div>
                            </div>


                            <div class="form-group m-b-10">
                                <label class="col-md-3 control-label">Bank Holder Names</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" placeholder="Default input" />
                                </div>
                            </div>
                            <div class="form-group m-b-10">
                                <label class="col-md-3 control-label">Bank Account Number</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" placeholder="Default input" />
                                </div>
                            </div>

                             <div class="form-group m-b-10">
                                <label class="col-md-3 control-label">Bank Branch Code</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" placeholder="Default input" />
                                </div>
                            </div>

                             <div class="form-group m-b-10">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-inverse ">Add Account</button>
                                </div>
                            </div>

                            
                           
            
                       {!! Form::close() !!}
                    </div>
                    <!-- end col-6 -->
                  
                </div>
                <!-- end row -->
			</div>
			<!-- end section-container -->



@endsection