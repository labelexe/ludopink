@extends('admin.layout.master')
@section('title')
    Add New Tournament
@endsection
@section('css')
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <form class="create_product" method="post" action="{{ route('create.tournament.new') }}" enctype="multipart/form-data"
        data-parsley-validate autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p class="card-title"><i class="las la-plus-circle"></i> Add New Tournament</p>
                        <a href="{{ url('/') }}/admin/tournament">
                            <button type="button" class="btn btn-orange border-0 round"><i
                                    class="las la-arrow-alt-circle-left"></i> Back</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <!-- Basic multiple Column Form section start -->
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">Tournament Name</label>
                                                <input type="text" required class="form-control" name="title" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="last-name-column">Bet Amount</label>
                                                <input type="number" required class="form-control" name="bit_amount" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city-column">Joining Tournament Time</label>
                                                <div class="input-group mb-2">
                                                    <input type="number" required class="form-control"
                                                        name="tournament_interval" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="city-column">Select Player</label>
                                                <select class="select2 form-control form-control-lg player_select"
                                                    name="no_of_player" required>
                                                    <option value="">Select Player</option>
                                                    <option value="2">2 Player</option>
                                                    <option value="4">4 Player</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 twoplayer_win_amount d-none">
                                            <div class="form-group">
                                                <label for="last-name-column">Winning Amount</label>
                                                <input type="number" class="form-control twoPlayerWin"
                                                    name="two_player_winning" />
                                            </div>
                                        </div>

                                        <div class="col-12 selectNoOFWinner d-none">
                                            <div class="form-group">
                                                <label for="last-name-column">Please Select Winner</label>
                                                <select class="select2 selectWinner form-control form-control-lg"
                                                    name="no_of_winner">
                                                    <option value="">Please Select Number Winner</option>
                                                    <option value="1">1 Winner</option>
                                                    <option value="2">2 Winner</option>
                                                    <option value="3">3 Winner</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 four1wiiner d-none">
                                            <div class="form-group">
                                                <label for="last-name-column">1st Winning Amount</label>
                                                <input type="number" class="form-control 1stWinner"
                                                    name="four_player_winning_1" />
                                            </div>
                                        </div>
                                        <div class="col-12 four2wiiner d-none">
                                            <div class="form-group">
                                                <label for="last-name-column">2nd Winning Amount</label>
                                                <input type="number" class="form-control 2ndWinner"
                                                    name="four_player_winning_2" />
                                            </div>
                                        </div>
                                        <div class="col-12 four3wiiner d-none">
                                            <div class="form-group">
                                                <label for="last-name-column">3rd Winning Amount</label>
                                                <input type="number" class="form-control 3rdWinner"
                                                    name="four_player_winning_3" />
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button type="submit"
                                                class="btn btn-orange round float-right border-0 submit_btn">
                                                <i class="las la-plus-circle"></i> Create Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Basic Floating Label Form section end -->
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- END: Content-->
@endsection
@section('js')
    <!-- link custom js link here -->
    <script src="{{ URL::asset('admin-assets/css/custom/js/tournament/tournament.js') }}"></script>
@endsection
