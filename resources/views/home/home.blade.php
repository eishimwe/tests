  
    @extends('master')

    @section('content')

       
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li><a href="javascript:;">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
            <!-- end breadcrumb -->

            @if(\Auth::user()->user_registration_statuses_id == 2)

            <div class="alert alert-warning fade in m-b-10">
                    <strong>Successfully registered!</strong>
                    Your account is pending activation
                    <span class="close" data-dismiss="alert">&times;</span>
            </div>
            <!-- begin page-header -->

            @elseif(Auth::user()->user_registration_statuses_id == 3)
             <div class="alert alert-success fade in m-b-10">
                <strong>Congratulations!</strong>
                Your account has been successfully activated,your personal referral identification is '<strong>{{ \Request::root() }}/sponsor/{{ \Auth::user()->username }}</strong>'
                <span class="close" data-dismiss="alert">&times;</span>
            </div>
    
            @else

            <h1 class="page-header">Home <small>header small text goes here...</small></h1>
           

            @endif
            <!-- end page-header -->

      
          <!-- begin section-container -->
            <div class="section-container section-with-top-border p-b-5">
                <h5 class="m-t-0"></h5>
                <!-- begin row -->
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-12">
                        <!-- begin nav-pills -->
                        <ul class="nav nav-pills nav-pills-success">

                          <li class="active">

                               
                                <!--    begin widget -->
                                 <div class="widget widget-stat widget-stat-right bg-inverse text-white">
                                     <div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                                     <div class="widget-stat-icon"><i class="fa fa-user"></i></div>
                                     <div class="widget-stat-info">
                                         <div class="widget-stat-title">My Sponsors</div>
                                         <div class="widget-stat-number"> <a href="#nav-pills-tab-1" data-toggle="tab">{{ $number_of_sponsors_users }} </a></div>
                                     </div>
                                     <div class="widget-stat-progress">
                                         <div class="progress">
                                             <div class="progress-bar" style="width: 80%"></div>
                                         </div>
                                     </div>
                                     <div class="widget-stat-footer text-left"></div>
                                 </div>
                                 <!-- end widget -->
                              </li>
                            <li>

                                  <!-- begin widget -->
                                  <div class="widget widget-stat widget-stat-right bg-success text-white">
                                      <div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                                      <div class="widget-stat-icon"><i class="fa fa-user"></i></div>
                                      <div class="widget-stat-info">
                                          <div class="widget-stat-title">My Team</div>
                                          <div class="widget-stat-number"><a href="#nav-pills-tab-2" data-toggle="tab">{{ $number_of_sponsored_users }}</a></div>
                                      </div>
                                      <div class="widget-stat-progress">
                                          <div class="progress">
                                              <div class="progress-bar" style="width: 60%"></div>
                                          </div>
                                      </div>
                                      <div class="widget-stat-footer"></div>
                                  </div>
                                  <!-- end widget -->

                            </li>

                            @if(\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2)
                            <li>

                                  <!-- begin widget -->
                                  <div class="widget widget-stat widget-stat-right bg-info text-white">
                                      <div class="widget-stat-btn"><a href="javascript:;" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                                      <div class="widget-stat-icon"><i class="fa fa-chrome"></i></div>
                                      <div class="widget-stat-info">
                                          <div class="widget-stat-title">Transactions</div>
                                          <div class="widget-stat-number"><a href="#nav-pills-tab-3" data-toggle="tab">{{ $number_of_transactions }}</a></div>
                                      </div>
                                      <div class="widget-stat-progress">
                                          <div class="progress">
                                              <div class="progress-bar" style="width: 60%"></div>
                                          </div>
                                      </div>
                                      <div class="widget-stat-footer"></div>
                                  </div>
                                  <!-- end widget -->

                            </li>
                            @endif
                           
                        </ul>
                        <!-- end nav-pills -->
                        <!-- begin tab-content -->
                        <div class="tab-content panel">
                            <div class="tab-pane fade active in" id="nav-pills-tab-1">
                                <h4>My Sponsors</h4>


                                  <!-- begin panel -->
                                  <div class="panel pagination-inverse m-b-0 clearfix">
                                      <table id="sponsors-users-table" data-order='[[0,"asc"]]' class="table-responsive table table-bordered table-hover">
                                          <thead>
                                              <tr class="inverse">
                                                  <th>Sponsor Type</th>
                                                  <th>Username</th>
                                                  <th>First Name</th>
                                                  <th>Surname</th>
                                                  <th>Primary Contact</th>
                                                  <th>Amount</th>
                                                  <th data-sorting="disabled"></th>
                                              </tr>
                                          </thead>
                                         
                                      </table>
                                  </div>
                                  <!-- end panel -->
                                                

                            </div>
                            <div class="tab-pane fade" id="nav-pills-tab-2">
                                <h4>My Team</h4>

                                 <!-- begin panel -->
                                  <div class="panel pagination-inverse m-b-0 clearfix">
                                      <table id="sponsored-users-table" data-order='[[0,"desc"]]' class="table-responsive table table-bordered table-hover">
                                          <thead>
                                              <tr class="inverse">
                                                  <th>Created at</th>
                                                  <th>Username</th>
                                                  <th>First Name</th>
                                                  <th>Surname</th>
                                                  <th>Primary Contact</th>
                                                  <th>Status</th>
                                                  <th>Amount</th>
                                                  <th data-sorting="disabled"></th>
                                              </tr>
                                          </thead>
                                         
                                      </table>
                                  </div>
                                  <!-- end panel -->



                               
                            </div>

                            @if(\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2)

                            <div class="tab-pane fade" id="nav-pills-tab-3">
                                <h4>Transactions</h4>

                                 <!-- begin panel -->
                                  <div class="panel pagination-inverse m-b-0 clearfix">
                                      <table id="transactions-table" data-order='[[0,"desc"]]' class="table-responsive table table-bordered table-hover">
                                          <thead>
                                              <tr class="inverse">
                                                  <th>Transaction Id</th>
                                                  <th>Username</th>
                                                  <th>First Name</th>
                                                  <th>Surname</th>
                                                  <th>Primary Contact</th>
                                                  <th>Status</th>
                                                  <th>Amount</th>
                                                  <th data-sorting="disabled"></th>
                                              </tr>
                                          </thead>
                                         
                                      </table>
                                  </div>
                                  <!-- end panel -->



                               
                            </div>
                            @endif

                             <!-- #modal-dialog -->
                          <div class="modal fade modalBank" id="modalBank">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Banking Details</h4>
                                        </div>
                                        <div class="modal-body">

                                            <!-- begin panel -->
                                            <div class="panel pagination-inverse m-b-0 clearfix">
                                                <table id="sponsors-banking-details-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr class="inverse">
                                                          <th>Bank Name</th>
                                                          <th>Bank Holder</th>
                                                          <th>Bank Account</th>
                                                          <th>Branch Code</th>
                                                         
                                                        </tr>
                                                    </thead>
                                                   
                                                </table>
                                            </div>
                                            <!-- end panel -->

                                          
                                        </div>
                                        <div class="modal-footer">
                                            <a href="javascript:;" class="btn width-100 btn-default" data-dismiss="modal">Close</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                              <div class="modal fade modalAmount" id="modalAmount">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Add Payout Amount</h4>
                                        </div>
                                        <div class="modal-body">

                                          {!! Form::open(['url'=>'save_transaction_payout_amount','method'=>'post','class'=>'form-horizontal','id' => 'transaction_amount_form']) !!}
                                        
                                            {!! Form::hidden('transactionID',NULL,['id' => 'transactionID']) !!}
                                          
                                            <div class="form-group m-b-10 @if ($errors->has('payout_amount')) has-error has-feedback @endif">
                                                {!! Form::label('Payout Amount', 'Payout Amount', array('class' => 'col-md-3 control-label')) !!}  
                                                
                                                <div class="col-md-7">
                                                    {!! Form::text('payout_amount',NULL,['class' =>'form-control','id' => 'payout_amount' ]) !!}   
                                                </div>
                                            </div>
                                         

                                             <div class="form-group m-b-10">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-7">
                                                    <a id="submit_transaction_payout_amount" class="btn btn-inverse">Add Amount</a>
                                                </div>
                                            </div>

                                      
            
                                          {!! Form::close() !!}

                                         
                                          
                                        </div>
                                        <div class="modal-footer">
                                            <a href="javascript:;" class="btn width-100 btn-default" data-dismiss="modal">Close</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <!-- end tab-content -->
                    </div>
                    <!-- end col-6 -->
                  
                </div>
                <!-- end row -->
            </div>
            <!-- end section-container -->
          
                  
        @endsection

        @section('custom_stript')

            <script src="{{ asset('assets/js/home.js') }}"></script>


            <script>

            var oTable;
            var oTableAmount;

                function launchBankModal(bank_id){

                  if ($.fn.dataTable.isDataTable('#sponsors-banking-details-table')) {

                     oTable.destroy();
                  }        
   
                    oTable = $('#sponsors-banking-details-table').DataTable({
                        dom: '<"toolbar">',
                        responsive: true,
                        serveSide:true,
                        autoFill: false,
                        colReorder: true,
                        rowReorder: true,
                        ajax : "sponsors-banking-list/" + bank_id,
                        columns :[
                           
                            {data: 'description', name: 'bank_types.description'},
                            {data: 'account_holder', name: 'bank_accounts.account_holder'},
                            {data: 'account_number', name: 'bank_accounts.account_number'}, 
                            {data: 'branch_code', name: 'bank_accounts.branch_code'}, 
                            

                        ]
                    });

                   
                  
                  $(".modalBank").modal('show');

                }

              function launchAmountModal(transaction_id){

                  $("#transaction_amount_form #transactionID").val(transaction_id);
                  $(".modalAmount").modal('show');

                }



                $("#submit_transaction_payout_amount").on("click",function(){


            
                        var myForm   = $("#transaction_amount_form")[0];
                        var formData = new FormData(myForm);
                        var token    = $('input[name="_token"]').val();


                          $.ajax({
                          type    :"POST",
                          data    : formData,
                          contentType: false,
                          processData: false,
                          headers : { 'X-CSRF-Token': token },
                          url     :"{!! url('/save_transaction_payout_amount')!!}",
                          beforeSend : function() {
                              

                          },
                          success : function(data){


                            if (data) {


                              $('#modalAmount').modal('toggle');


                            }


                          },
                        error: function(data){

                           
                            

                            alert("Wrong Amount entered");
                           

                        }

                      })

                       });



            </script>


        @endsection