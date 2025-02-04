@extends('layouts.master_user')
@section('header')

    <a href="{{ route('user_home') }}" type="button" style="color: rgb(188, 187, 187)" class="btn">DASHBOARD</a>
    <a href="{{ route('user_welcome') }}" type="button" style="color: rgb(188, 187, 187)" class="btn">WELCOME</a>
@endsection

@section('body')
    <div class="row">
        <div class="col">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                    </div>
                </div>

            </div>
            <br>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                    </div>
                </div>

            </div>
            <br>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
