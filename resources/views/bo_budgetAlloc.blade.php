@extends('bo_main') 

@section('title', 'Budget Year')

<!-- @section('brand', 'Budget Year') -->


@section('content')
<div class="row" style="padding-left: 35px; padding-right: 20px;">

          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Total Budget</p>
                      <p class="card-title">&#8369;{{ number_format($budgetYear->total(), 2) }}<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <!-- <div class="stats">
                  <i class="fa fa-calendar-o"></i> Total Budget
                </div> -->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-3">
                    <div class="icon-big text-center icon-warning">
                      <i class="lnr lnr-cart text-primary"></i>
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="numbers">
                      <p class="card-category">Total Budget Allocated</p>
                      <p class="card-title">$ 2,000
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <!-- <div class="stats">
                  <i class="fa fa-clock-o"></i> Total Budget Allocated
                </div> -->
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="lnr lnr-cart text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Remaining Budget</p>
                      <p class="card-title">&#8369;{{ number_format($budgetYear->remaining(), 2) }}<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <!-- <div class="stats">
                  <i class="fa fa-clock-o"></i> Remaining Budget
                </div> -->
              </div>
            </div>
          </div>

        </div>


  <!-- 
  <h3 style="font-family:Montserrat; padding-top: 0;"> Budget Proposal History &nbsp; </h3> -->
  <div class="row" style="padding-left: 35px; padding-right: 20px;">

    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-body" style="margin-top: 5px;">
          <div>
          <p style="position: absolute; font-size: 25px;"> Budget Allocated to Sectors </p>
          <button class="btn btn-default btn-sm" style="right: 30px; position: absolute !important;" data-toggle="modal"
          data-target="#BA">
            <i class="fa fa-plus"></i> &nbsp;New Budget Allocation
          </button>
          </div><br><br><br>
          <div class="table-responsive" style="overflow: visible;"> 
            <table class="table table-striped">
              <thead>
                <tr class=" text-primary">
                  <th>Sector</th>
                  <th>Fund 101</th>
                  <th>Fund 164</th>
                  <!-- <th class="text-center">Budget Status</th> -->
                </tr>
              </thead>

              <tbody>
                @if($sectorBudgets->count())
                  @foreach($sectorBudgets as $sectorBudget)
                  <tr>
                    <td>{{ $sectorBudget->sector->name }}</td>
                    <td>{{ $sectorBudget->fund_101 }}</td>
                    <td>{{ $sectorBudget->fund_164 }}</td>
                    <!-- <td class="text-center" >Active</td> -->
                  </tr>
                  @endforeach
                @endif
              </tbody>

            </table>

          </div>
        </div>
      </div>
    </div>
	</div>

  <div class="row" style="padding-left: 35px; padding-right: 20px;">

    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-body" style="margin-top: 5px;">
          <div>
          <p style="position: absolute; font-size: 25px;"> Budget Allocated to Offices </p>
          <button class="btn btn-default btn-sm" style="right: 30px; position: absolute !important;" data-toggle="modal"
          data-target="#BA">
            <i class="fa fa-plus"></i> &nbsp;New Budget Allocation
          </button>
          </div><br><br><br>
          <div class="table-responsive" style="overflow: visible;"> 
            <table class="table table-striped">
              <thead>
                <tr class=" text-primary">
                  <th>Office</th>
                  <th>Budget Allocated</th>
                  <th>Remaining Budget</th>
                  <th class="text-center">Budget Status</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>College of Science</td>
                  <td>15000000</td>
                  <td >9000000</td>
                  <td class="text-center" >Active</td>
                </tr>

              </tbody>

            </table>

          </div>
        </div>
      </div>
    </div>
	</div>

</div>

<!-- MODAL FOR BUDGET ALLOCATION -->
<div id="BA" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      
      <div class="modal-header" style="background-color: #f4f3ef;">
        <p class="modal-title text-center" style="color:#641E16; font-family:Montserrat; font-size:18px;"> Budget Allocation</p>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <ul class="nav nav-pills nav-pills-info nav-pills-icons" role="tablist" style="right: 30px; position: absolute !important;">
            <li class="nav-item">
                <a class="nav-link active" href="#sector" role="tab" data-toggle="tab">
                    <i class="nc-icon nc-app"></i>
                    For Sector
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#dept" role="tab" data-toggle="tab">
                    <i class="nc-icon nc-settings"></i>
                    For Department
                </a>
            </li>
        </ul> <br><br>


        <div class="tab-content tab-space" style="position: relative;">
          <div class="tab-pane active" id="sector">
            <form method="POST" action="/sector_budgets">
            @csrf
              <input type="hidden" name="budget_year_id" value="{{ $budgetYear->id }}">
              <div class="form-group">
                <label for="Status">Sector</label>
                <select name="sector_id" class="form-control" id="Status">
                  @foreach($sectors as $sector)
                  @if($sector->unallocated($budgetYear->id))
                  <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                  @endif
                  @endforeach
                </select>
              </div><br>
             
              <div class="form-group">
                <label for="Amount">Fund 101 (Remaining: &#8369;{{ number_format($budgetYear->remainingFund101(), 2) }})</label>
                <input type="number" min="0" step=".01" class="form-control" id="Amount" name="fund_101" value="{{ old('fund_101') }}">     
              </div><br>

              <div class="form-group">
                <label for="Amount">Fund 164 (Remaining: &#8369;{{ number_format($budgetYear->remainingFund164(), 2) }})</label>
                <input type="number" min="0" step=".01" class="form-control" id="Amount" name="fund_164" value="{{ old('fund_164') }}">              
              </div><br>

              <!-- <div class="form-group">
                <label for="Status">STATUS</label>
                <select class="form-control" id="Status">
                  <option> Active </option>
                  <option> Inactive </option>
                </select>
              </div><br> -->

              @include('errors')

              <button type="submit" class="btn btn-success btn-block">Save</button>
            </form>
          </div>


          <div class="tab-pane" id="dept">
            <form>
              <div class="form-group">
                <label for="sectorstat">SECTOR</label>
                <select class="form-control" id="sectorstat">
                  <option> sample 1 </option>
                  <option> sample 2</option>
                  <option> sample 3 </option>
                </select>
              </div><br>

              <div class="form-group">
                <label for="deptstat">DEPARTMENT</label>
                <select class="form-control" id="deptstat">
                  <option> sample 1 </option>
                  <option> sample 2</option>
                  <option> sample 3 </option>
                </select>
              </div><br>
               
              <div class="form-group">
                <label for="Amount">AMOUNT</label>
                <input type="number" class="form-control" id="Amount">
              </div><br>

              <div class="form-group">
                <label for="Status">STATUS</label>
                <select class="form-control" id="Status">
                  <option> Active </option>
                  <option> Inactive </option>
                </select>
              </div><br>

              <button type="submit" class="btn btn-success btn-block">Save</button>
            </form>
          </div>
         </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('scripts')
  @if ($errors->any())
  <script>$('#BA').modal('show')</script>
  @endif
@endsection