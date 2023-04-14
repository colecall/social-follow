{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Follow My Account Instagram') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>From</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($realInstagramAccount as $realUser)
                                    @if (count($realUser->fakeUsers) > 0)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $realUser->username }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('follow.follow') }}">
                                                    @csrf
                                                    <input type="hidden" name="real_account_id" value="{{ $realUser->id }}">
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <input type="text" value="{{ $realUser->category }}"
                                                                name="type" hidden>
                                                            <select id="fake_account_id"
                                                                class="form-control @error('fake_account_id') is-invalid @enderror"
                                                                name="fake_account_id" required>
                                                                <option value="">-- Select Fake User --</option>
                                                                @foreach ($realUser->fakeUsers as $fakeUser)
                                                                    <option value="{{ $fakeUser->id }}">
                                                                        {{ $fakeUser->username }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('fake_account_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                            <td>
                                                <button type="submit" class="btn btn-primary">Follow
                                                </button>
                                            </td>
                                            </form>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

--}}

@extends('layouts.vuexy')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Follow My Account Instagram') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>From</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($realTiktokAccount as $realUser)
                                    @if (count($realUser->fakeUsers) > 0)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $realUser->username }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('follow.follow') }}">
                                                    @csrf
                                                    <input type="hidden" name="real_account_id" value="{{ $realUser->id }}">
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <input type="text" value="{{ $realUser->category }}"
                                                                name="type" hidden>
                                                            <select id="fake_account_id"
                                                                class="form-control @error('fake_account_id') is-invalid @enderror"
                                                                name="fake_account_id" required>
                                                                <option value="">-- Select Fake User --</option>
                                                                @foreach ($realUser->fakeUsers as $fakeUser)
                                                                    <option value="{{ $fakeUser->id }}">
                                                                        {{ $fakeUser->username }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('fake_account_id')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                            <td>
                                                <button type="submit" class="btn btn-primary">Follow
                                                </button>
                                            </td>
                                            </form>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#fake_account_id').select2();
        });
    </script>
@endsection
