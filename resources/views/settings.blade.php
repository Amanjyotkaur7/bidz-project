@extends('layouts.app')

<style>
    .title-color{
        color: rgba(74, 27, 244, 0.8);
    }

    .btn-primary {
        background-color: rgba(74, 27, 244, 0.8);
    }
</style>

@section('content')
<div class="container py-4">
    @include('includes.messages')
    
    <!-- AutoBid Settings Section -->
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body bg-white text-dark p-4">
                    <h4 class="mb-4 title-color">Auto-bid Settings</h4>
                    <form action="{{ route('saveSettings') }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if(auth()->user()->auto_bid == null)
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="enable" name="enable_disable">
                                <label class="form-check-label" for="enable">Enable AutoBid</label>
                            </div>
                        @else
                            <p class="mb-2">Do you want to disable AutoBid?</p>
                            <hr>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" type="checkbox" id="disable" name="enable_disable">
                                <label class="form-check-label" for="disable">Disable AutoBid</label>
                            </div>
                        @endif

                        <div class="mb-3 autoBidField">
                            <label for="auto_bid" class="form-label">AutoBid Amount</label>
                            <input
                                type="number"
                                class="form-control"
                                id="auto_bid"
                                name="auto_bid"
                                {{ auth()->user()->auto_bid == null ? 'disabled' : '' }}
                                value="{{ auth()->user()->auto_bid }}">
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary px-4" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Edit Section -->
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body bg-white text-dark p-4">
                    <h4 class="mb-4 title-color">Edit Profile</h4>
                    <form action="{{ route('updateProfile') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                value="{{ auth()->user()->name }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input
                                type="text"
                                class="form-control"
                                id="username"
                                name="username"
                                value="{{ auth()->user()->username }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{ auth()->user()->email }}"
                                required>
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary px-4" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const enable = document.querySelector('#enable');
    const disable = document.querySelector('#disable');
    const amountField = document.querySelector('#auto_bid');

    if (!amountField.value || amountField.value === '') {
        amountField.disabled = true;
    }

    if (enable) {
        enable.addEventListener('click', () => {
            amountField.disabled = !amountField.disabled;
        });
    }

    let oldVal = amountField.value;

    if (disable) {
        disable.addEventListener('click', () => {
            if (amountField.disabled) {
                amountField.disabled = false;
                amountField.value = oldVal;
            } else {
                amountField.disabled = true;
                amountField.value = '';
            }
        });
    }
</script>
@endsection
