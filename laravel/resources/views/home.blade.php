@extends('layouts.app')

@section('content')


<section id="slider">
      <div class="container">
      <div class="col-lg-12 np-l">
        <div class="col-lg-8 np-l">
          <div class="discovery">
            <h1>Find your perfect event</h1>
            <h3>Brings people together through live<br>experiences discover events that match<br> your passions.</h3> 
          </div>
        </div>
        <div class="col-lg-4">
          <div class="search">
            <form role="form" action="#">
            <div class="form-group">
              <input name="search_term" type="text" class="form-control" id="search_term" placeholder="Search Term">
            </div>
            <div class="form-group">
              <select class="form-control input-lg" name="city_id">
                <option value="">Qyteti</option>
              </select>
            </div>
            <div class="form-group">
              <div class="col-lg-6 np-l np-r">
                <input type="text" class="form-control datepicker" id="date" placeholder="Date" name="date">
              </div>
            <div class="col-lg-6 np-r">
              <button type="submit" class="btn btn-search btn-lg btn-block">Search</button>
            </div>
            <div class="form-group count">
              <h5>We are counting  <b><?php echo 3; ?> events</b> </h5>
            </div>
            </div>
          </form>
        </div>
          </div>
        </div>
      </div>
</section>


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
$(function(){
    // Testing Ajax API

    var eventData = {
        name: "Triton Revolution",
        category_id: 1,
        country_id: 18,
        city_id: 1,
        date: '2016-01-21', // This is validating with 'date' validation rule,
        description: "Test Event",
        address_1: "My Address",
        start: "2016-01-24 21:00",
        longitude: -100,
        latitude: 80,
        tags:"tag1, tag4, hello world, cool tag",
        recurring: 1,
        recurring_data: JSON.stringify({
            'monday': {start:'12:00', 'end':'23:00'},
            'friday': {start:'12:00'},
        })
    }

    jQuery.ajax({
        headers:{
            // key: 'e1f17e600eba600861c302f68ff06ea4706bdbd' // 7
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method:'post',
        url:'http://localhost/Kuekur/public/api/events/35',
        data: eventData, 
        success:function(data){
            console.log(data);
        }
    });

})
</script>

@endsection
