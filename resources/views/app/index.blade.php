@extends("layouts.layout")

@section("content")

<button id="btn-check-forecast" class=" mb-2 btn btn-primary btn-md">Forecast</button>
<div id="forecast-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Forecast</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="forecast-form">
            <div class="form-group">
                <label for="no-of-studies">No. of Studies</label>
                <input type="number" name="no-of-studies" class="form-control" placeholder="No of studies">
            </div>
            <div class="form-group">
                <label for="no-of-studies">Growth per Month(%)</label>
                <input type="number" name="growth-per-month" max="1000" class="form-control" placeholder="Growth per Month">
            </div>
            <div class="form-group">
                <label for="no-of-studies">Months to Forecast</label>
                <input type="number" name="months-to-forecast" class="form-control" placeholder="Months to forecast">
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="btn-get-forecast" class="btn btn-primary">Get Forecast</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>





<div id="forecast-table-container">
    <table id="forecast-table" class="mt-2 table table-bordered">
        <thead>
            <tr>
                <th>Month</th>
                <th>Number of Studies</th>
                <th>Forecasted Cost</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>


@endsection
