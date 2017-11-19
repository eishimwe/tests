@extends('master')


@section('content')


<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li><a href="{{ url('/banking-details') }}">Order Details</a></li>
				<li class="active">Add New</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Add new order</h1>
			<!-- end page-header -->
			
			<!-- begin section-container -->
			<div class="section-container section-with-top-border p-b-10">
			    <!-- begin row -->
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-6">
                        
                        
                        
                        	{!! Form::open(['url'=>'save_donation','method'=>'post','class'=>'form-horizontal']) !!}

						  
                            <div class="form-group m-b-10 @if ($errors->has('donation_amount')) has-error has-feedback @endif">
                                {!! Form::label('Order amount', 'Order amount', array('class' => 'col-md-3 control-label')) !!}
                                
                                <div class="col-md-7">
                                    {!! Form::text('donation_amount',NULL,['class' =>'form-control','id' => 'donation_amount' ]) !!}   
                                </div>
                            </div>

                            <div  class="form-group m-b-10">

                                {!! Form::label('Month(s)', 'Month(s)', array('class' => 'col-md-3 control-label')) !!}

                                <div class="col-md-7">

                                    {!! Form::select('month',['1' => '1','2' => '2','3' => '3','4' => '4' ],1,['class' => 'form-control' ,'id' => 'month']) !!}


                                </div>

                            </div>



                        <div class="form-group m-b-10">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-inverse ">Add Order</button>
                                </div>
                            </div>

                            
                           
            
                       {!! Form::close() !!}
                    </div>
                    <!-- end col-6 -->
                  
                </div>
                <!-- end row -->
                <div class="row">

                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Month</th>
                            <th>Return Percentage</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td>1</td>
                            <td>50%</td>

                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>2</td>
                            <td>75%</td>

                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>3</td>
                            <td>80%</td>

                        </tr>
                        </tbody>
                    </table>


                </div>
			</div>
			<!-- end section-container -->



@endsection