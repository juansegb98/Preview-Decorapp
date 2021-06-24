@extends('base')
@section('title')
New user registered
@endsection
@section('content')
<div class="container">
    <h1>New user was registered</h1>
    <div class="row">
        <div class="col-md-6">
        <h3>Contact Info:</h3>
            <div class="col">Name: {{ $userInfo->first_name }}</div>
            <div class="col">Email: {{ $userInfo->email }}</div>
            <div class="col">Phone # : {{ $userInfo->phone }}</div>
            <div class="col">Address: {{ $userInfo->address_street }}</div>
            <div class="col">City: {{ $userInfo->address_city }}</div>
            <div class="col">State: {{ $userInfo->address_state }}</div>
            <div class="col">Zip code: {{ $userInfo->address_zipcode }}</div>
            <div class="col">Country: {{ $userInfo->country }}</div>
            <div class="col">Company: {{ $userInfo->company_name }}</div>
            <div class="col">How did you hear about us: {{$companyInfo->reference}}</div>
        </div>
        <div class="col-md-6">
        <h3>Company Info:</h3>
            <div class="col">Date Established: {{ $companyInfo->dateCompany }}</div>
            <div class="col">TAX ID: {{ $companyInfo->taxId }}</div>
            <div class="col">Managing Director Name: {{ $companyInfo->directorName }}</div>
            <div class="col">Type Of Business: {{ $companyInfo->companyType }}</div>
            <div class="col">Showroom: {{ $companyInfo->showroom }}</div>
            <div class="col">Member Of A Trade Organization: {{ $companyInfo->tradeOrg }}</div>
        </div>
        
    </div>
</div>

@endsection