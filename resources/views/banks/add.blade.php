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
                        
                        
                        
                        	{!! Form::open(['url'=>'save_bank','method'=>'post','class'=>'form-horizontal']) !!}

						  
                            <div class="form-group m-b-10 @if ($errors->has('bank_type_id')) has-error has-feedback @endif">
                               
                               {!! Form::label('Bank Name', 'Bank Name', array('class' => 'col-md-3 control-label')) !!}   
                                <div class="col-md-7">
                                    {!! Form::select('bank_type_id',$selectBankTypes,0,array('class' => 'form-control','id' => 'bank_type_id')) !!}
                                </div>
                            </div>

                          
                            <div class="form-group m-b-10 @if ($errors->has('account_holder')) has-error has-feedback @endif">
                                {!! Form::label('Bank Holder Names', 'Bank Holder Names', array('class' => 'col-md-3 control-label')) !!}  
                                
                                <div class="col-md-7">
                                    {!! Form::text('account_holder',NULL,['class' =>'form-control','id' => 'account_holder' ]) !!}   
                                </div>
                            </div>
                            <div class="form-group m-b-10 @if ($errors->has('account_number')) has-error has-feedback @endif">

                                {!! Form::label('Bank Account Number', 'Bank Account Number', array('class' => 'col-md-3 control-label')) !!}   
                               
                                <div class="col-md-7">
                                    {!! Form::text('account_number',NULL,['class' =>'form-control','id' => 'account_number' ]) !!} 
                                </div>
                            </div>

                             <div class="form-group m-b-10">

                                {!! Form::label('Bank Branch Code', 'Bank Branch Code', array('class' => 'col-md-3 control-label')) !!}   

                                <div class="col-md-7">

                                    {!! Form::text('branch_code',NULL,['class' =>'form-control','id' => 'branch_code' ]) !!} 

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