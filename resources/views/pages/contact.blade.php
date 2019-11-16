@extends('layouts.default')
@section('title', 'Contact - Nyeuseuh')

@section('content')
<section class="contact-page py-4" ">
    <div class="container py-2" id="contact">
        <div class="py-4">
            <h1 class="h2 text-primary">Contact Us</h1>
        </div>
    
        <div class="row">
            <div class="col-md-4">
                <h3>More Informations</h3>
                <hr>
                <p>
                    <strong>Phone: </strong>(111) 111 1111<br>
                    <strong>Email address: </strong><a href="mailto:iinfo@8geeks.com">info@nyeuseuh.com</a>
                </p>
                <p class="mb-0"><a href="mailto:info@nyeuseuh.com"></a><strong>Business Hours:</strong></p>
                <p>Monday – Friday (8 am – 6:30 pm) <br>
                Saturday – Sunday (9 am – 2 pm)</p>
            </div>
            <div class="col-md-8">
                <form method="POST" id="form-contact">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
                            <small class="text-danger" id="emailAlert"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="tel" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number">
                            <small class="text-danger" id="phone_numberAlert"></small>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                            <small class="text-danger" id="nameAlert"></small>
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" class="form-control" id="message" placeholder="Your Message" rows="3"></textarea>
                            <small class="text-danger" id="messageAlert"></small>
                        </div>
                        
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
                        </div>
                    </div>				
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
