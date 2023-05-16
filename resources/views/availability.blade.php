@extends('layouts.navbar')

@section('content')
<body div class="bg-img"></div></body>

<link rel="stylesheet" href="{{ asset('css/availability.css') }}">

<div class="container1">
  <div class="availability-table">
    <div class="availability-row">
      <div class="availability-column name-column">
        <p class="column-label">Name</p>
        <!-- <p>John Doe</p> -->
      </div>
      <div class="availability-column plate-column">
        <p class="column-label">Plate Number</p>
        <!-- <p>ABC123</p> -->
      </div>
      <div class="availability-column color-column">
        <p class="column-label">Color</p>
        <!-- <p>Red</p> -->
      </div>
      <div class="availability-column availability-column">
        <p class="column-label">Availability</p>
        <!-- <p data-popup="myPopup" class= "check-availability">Available</p> -->
      </div>
    </div>
      @foreach($data as $row)
      <div class="availability-row">
        <div class="availability-column name-column">
          <p>{{ucfirst($row->firstname)}} {{ucfirst($row->lastname)}}</p>
        </div>
        <div class="availability-column plate-column">
          <p>{{$row->plateno}}</p>
        </div>
        <div class="availability-column color-column">
          <p data-popup="myPopup">{{$row->description}}</p>
        </div>
        <div class="availability-column availability-column">
          @if($row->is_booked)
            <p data-popup="myPopup" class= "check-availability">Unavailable</p>
          @else
            <button class= "book btn btn-sm btn-primary" data-driver="{{$row}}" style="cursor: pointer !important;">Available</button>
          @endif
        </div>
      </div>
      @endforeach
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
      
      <p><span class="plate-number">Plate Number:</span>&nbsp;&nbsp;<b id="plate">ABC123</b></p>
      
      <p><span class="color">Description:</span>&nbsp;&nbsp;<b id="description">Blue</b></p>

      </div>
    </div>
    <div class="buttons">
      <button class="accept-btn accept-btn-avail">Book</button>
      <button class="decline-btn" onclick="closePopup()" >Cancel</button>
    </div>
  </div>
</div>


<script>


// get all notification items by their class name
// var notificationItems = document.getElementsByClassName("availability-column availability-column");

// // get the popup element by its ID
// var popup = document.getElementById("myPopup");

// // loop through all notification items and add a click event listener to each one
// for (var i = 0; i < notificationItems.length; i++) {
//   notificationItems[i].addEventListener("click", function() {
//     var availabilityElement = this.querySelector(".check-availability");
//     var availability = availabilityElement.textContent.trim().toLowerCase();
//     if (availability === "available") {
//       // show the popup
//       popup.style.display = "block";
//     }
//   });
// }

function closePopup() {
  var popup = document.getElementById("myPopup");
  popup.style.display = "none";
}
// //Check Availability change to green if available, red if not

// // loop through all availability elements and set the color
// var availabilityElements = document.querySelectorAll(".check-availability");
// for (var i = 0; i < availabilityElements.length; i++) {
//   var availabilityElement = availabilityElements[i];
//   var availability = availabilityElement.textContent.trim().toLowerCase();
//   if (availability === "available") {
//     availabilityElement.classList.add("available");
//   } else {
//     availabilityElement.classList.add("unavailable");
//   }
// }

</script>

@endsection
