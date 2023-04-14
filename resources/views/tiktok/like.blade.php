@extends('layouts.vuexy')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Like My Post Instagram') }}</div>
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
                                @foreach ($linkPosts as $linkPost)
                                    @if (count($linkPost->fakeUsers) > 0)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ $linkPost->username }}">{{ $linkPost->username }}</a></td>
                                            <td>
                                                <form method="POST" action="{{ route('follow.follow') }}">
                                                    @csrf
                                                    <input type="hidden" name="real_account_id"
                                                        value="{{ $linkPost->id }}">
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <input type="text" value="{{ $linkPost->category }}"
                                                                name="type" hidden>
                                                            <select id="fake_account_id"
                                                                class="form-control @error('fake_account_id') is-invalid @enderror"
                                                                name="fake_account_id" required>
                                                                <option value="">-- Select Fake User --</option>
                                                                @foreach ($linkPost->fakeUsers as $fakeUser)
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
