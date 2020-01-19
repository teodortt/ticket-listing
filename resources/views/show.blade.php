@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make order<span class="float-right"><a href='/' class="btn btn-secondary">Back</a>
                <!-- <button class="btn btn-warning" onclick="myFunction()">Print</button> -->
                </div>

                                                                                <script>
                                                                                function myFunction() {
                                                                                window.print();
                                                                                }
                                                                                </script>
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            Event: {{ $listings->event }}
                        </div>
                        <form method="post" action="/orders">
                    @csrf           
                    <br>
                    <div class="form-group">
                    <div class="list-group-item">
                    
                    <input type="hidden" class="form-control" id="event" name="event" value="{{ $listings->event }}">
                    <label for="ename">Agent</label>
                    <select class="form-control" name="ename" id="ename">
                    @if($agents->count() > 0)
                    @foreach($agents as $agent)
                    <option>{{$agent->agent_name}}</option>
                    @endForeach
                    @else
                    No Record Found
                        @endif   
                    </select>
                    <br>
                    <label for="info">Info:</label>
                    <input type="text" class="form-control" name="info" id="info" placeholder="Notes">
                    <br>
                    <label for="price">Price $:</label>
                    <input type="currency" class="form-control" name="price" id="price" placeholder="$" onKeyUp="sum()">
                    </div>
                    <div class="form-control" name="date" id="date">
                    Order Date: {{date("Y-m-d")}}
                    </div>
                    <br>
                    <div>
                    <span class="float-left">
                    <tr>
                                                <td>Quantity:</td>
                                                
                                                <td>
                                                <button type="button" onclick="minus(); sum();">-</button>
<input type="number" name="quantity" id="quantity" min="0" max="50" onKeyUp="sum()">
<button type="button" onclick="plus(); sum();">+</button>

<script>
function plus() {
  document.getElementById("quantity").stepUp(1);
}
function minus() {
  document.getElementById("quantity").stepDown(1);
}
</script>

                                                </td>
                                                </span>
                                                <span class="float-right">

                                                <td><b>Total:
                                                    <i>$</i>
                                                    <input name="total" id="total" readonly>
                                                </b></td>
                                                </tr>
                                                </span>
                                                </div>
                                                    <script>
                                                    function sum() {
                                                    a = Number(document.getElementById('quantity').value);
                                                    b = Number(document.getElementById('price').value);
                                                    c = a * b;
                                                    document.getElementById('total').value = c;}
                                                    </script>
                </div>
                <br>
                <span class="float-right">
        <button type="submit" class="btn btn-primary">Submit</button>
        </span>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection