@extends('layouts.navbar')

@section('content')
<link rel="stylesheet" href="{{ asset('css/notification.css') }}">

<div class="container">
<div class="notification-tab" id="notificationTab">
  <h2 class="notification-label">Notifications</h2>
  <div class="notification-container">
    @foreach($data as $row)
      @if($row->status === "Pending")
        <?php $color = 'orange' ?>
      @elseif($row->status === "Accepted")
        <?php $color = 'green' ?>
      @else
        <?php $color = 'red' ?>
      @endif
      <div class="notification-item {{Auth::user()->role == '2' && $row->status == 'Pending' ? 'show-popup' : ''}} {{Auth::user()->role == '0' && $row->status == 'Pending' ? 'cancel-popup' : ''}}" data-value="{{$row}}">
        <p style="font-weight: {{$row->status == 'Pending' ? 'bold' : ''}}">{{ucfirst($row->customer->firstname)}} {{ucfirst($row->customer->lastname)}} has {{$row->status}} booking!</p>
        <span class="notification-time"><b style="color: {{$color}}">{{$row->status}}</b></span>
        <span class="notification-time">{{date_format(date_create($row->book_datetime), "M d, Y h:i A")}} | </span>
        @if(Auth::user()->role == '2')
          <p class="notification-message">You have a {{$row->status}} from <b>{{ucfirst($row->customer->firstname)}} {{ucfirst($row->customer->lastname)}} </b></p>
        @else
          <p class="notification-message">Your booking status is: <b style="color: {{$color}}"> {{$row->status}} </b></p>
        @endif
      </div>
    @endforeach  
    <!-- <div class="notification-item" data-popup="myPopup">
      <p class="notification-title">Jane Booked You!</p><span class="notification-time">8:30 AM</span>
      <p class="notification-message">You have a new booking from Jane Smith</p>
    </div>
    <div class="notification-item" data-popup="myPopup">
      <p class="notification-title">Jake Booked You!</p><span class="notification-time">8:30 AM</span>
      <p class="notification-message">You have a new booking from Jane Smith</p>
    </div>
    <div class="notification-item" data-popup="myPopup">
      <p class="notification-title">Jake Booked You!</p><span class="notification-time">8:30 AM</span>
      <p class="notification-message">You have a new booking  from Jane Smith</p>
    </div> -->
  </div>
</div>
</div>

<div class="popup" id="myPopup" style="display:none">
  <div class="popup-content">
    <div class="customer-info">
    <img src="customer-image.jpg" alt="Customer Image">
      <div class="customer-details">
        <p><span class="name">Name:</span>&nbsp;&nbsp;<b id="name">John Doe</b>
        <p><span class="address">Address:</span>&nbsp;&nbsp;<b id="address"> Bagumbayan Sur</b></p>
        <p><span class="phone">Phone:</span>&nbsp;&nbsp;<b id="phone">09123456789&nbsp;</b></p>
        
        <!-- <p><span class="plate-number">Plate Number:</span>&nbsp;&nbsp;<b id="plate">ABC123</b></p> -->
        
        <!-- <p><span class="color">Description:</span>&nbsp;&nbsp;<b id="description">Blue</b></p> -->
      </div>
    </div>
    <div class="buttons">
      <button class="btn btn-danger" onclick="response('Accepted')" >Accept</button>
      <button class="btn btn-primary" onclick="response('Declined')" >Decline</button>
      <button class="btn btn-success" onclick="closePopup()" >Close</button>
    </div>
  </div>
</div>


<script>
// get all notification items by their class name
// var notificationItems = document.getElementsByClassName("notification-item");

// get the popup element by its ID
var popup = document.getElementById("myPopup");

// loop through all notification items and add a click event listener to each one
for (var i = 0; i < notificationItems.length; i++) {
  notificationItems[i].addEventListener("click", function() {
    // show the popup
    popup.style.display = "block";
  });
}

function closePopup() {
  var popup = document.getElementById("myPopup");
  popup.style.display = "none";
}
</script>


@endsection