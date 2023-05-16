@extends('layouts.navbar')

@section('content')

<head>
    <title>About Us</title>
    <link rel="stylesheet" href="{{ asset('css/aboutPage.css') }}">
</head>
<!-- <body> -->
    <!-- <div class="container"> -->
    <!-- <body class="bg-img"> -->
        <div class="row justify-content-center">
            <div class="col-md-8">
            <div class="content">
                <h1>About Us</h1>
                <p>TricyCall is an online tricycle booking system developed by 2nd Year BSIT students from Ateneo de Naga University. Our platform provides convenience and accessibility to both commuters and tricycle operators in Naga City.</p>
            
                <h2>Our Platform</h2>
                <div class="list">
                    <ul>
                        <li><strong>Easy to use:</strong> Our user-friendly interface makes it easy to book tricycle rides with just a few clicks.</li>
                        <li><strong>Reliable:</strong> Our tricycle operators are carefully screened and trained to provide safe and reliable services to commuters.</li>
                        <li><strong>Accessible:</strong> TricyCall is available 24/7, so you can book a ride whenever you need one.</li>
                        <li><strong>Transparent:</strong> Our platform provides transparent pricing and allows you to track your bookings and earnings.</li>
                    </ul>
                </div>
                <h2>Our Mission</h2>
                <p>TricyCall aims to revolutionize tricycle transportation in Naga City by providing reliable and safe services to commuters. Choose TricyCall for hassle-free tricycle booking!</p>
            </div>
            <h1 class="FT">Founding Team</h1> 
            <div class="founder-card-container">
                <div class="team">
                    <div class="member">
                        <img src= "./assets/images/robin.jpg" alt="Team member 1" class="avatar">
                        <div class="info">
                            <h2>Robin Joshua R. Hermocilla</h2>
                            <div class="line"></div>
                            <p>Ateneo de Naga University</p>
                        </div>
                    </div>
                    <div class="member">
                        <img src= "./assets/images/irvin.jpg" alt="Team member 2" class="avatar">
                        <div class="info">
                            <h2>John Irvin E. Panganiban</h2>
                            <div class="line"></div>
                            <p>Ateneo de Naga University</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </body> -->

@endsection
