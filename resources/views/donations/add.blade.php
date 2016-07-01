@extends('master')


@section('content')


<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="{{ url('/banking-details') }}">Donations Details</a></li>
				<li class="active">Add New</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Add new donation</h1>
			<!-- end page-header -->
			
			<!-- begin section-container -->
			<div class="section-container section-with-top-border p-b-10">
			    <!-- begin row -->
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-6">
                        
                        
                        
                        	{!! Form::open(['url'=>'save_donation','method'=>'post','class'=>'form-horizontal']) !!}

						  
                            <div class="form-group m-b-10 @if ($errors->has('donation_amount')) has-error has-feedback @endif">
                                {!! Form::label('Donation amount', 'Donation amount', array('class' => 'col-md-3 control-label')) !!}  
                                
                                <div class="col-md-7">
                                    {!! Form::text('donation_amount',NULL,['class' =>'form-control','id' => 'donation_amount' ]) !!}   
                                </div>
                            </div>
                         

                             <div class="form-group m-b-10">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-inverse ">Add Donation</button>
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