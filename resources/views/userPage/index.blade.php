<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate</title>
    <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
</head>

<body class="bg-secondary">
    <div class="d-flex justify-center align-items-center flex-row mt-5 p-5 gap-5">
    @foreach ($candidates as $candidate)
            <div class="card w-lg-50 w-90" style="overflow: hidden">
                <img src="{{ $candidate->photo }}" class="card-img-top" style="width: 400px; height: 400px; object-fit: cover alt="Candidate {{ $candidate->name }} photo">
                <div class="card-body">
                    <h5 class="card-title">{{ $candidate->name }}</h5>
                    <b>Vision :</b>
                    <p class="card-text">{!! $candidate->vision !!}</p>
                    <b>Mission :</b>
                    <p class="card-text">{!! $candidate->mission !!}</p>
                    {{-- Button Modal --}}
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$candidate->id}}">
                        Choose
                    </button>

                    {{-- Modal --}}

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop{{$candidate->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Are you sure?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to vote for <strong>{{$candidate->name}}</strong>? Your choice cannot be taken back.
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('electionPost')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
                                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-secondary">YES</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <footer>
            <div class="mb-5 text-center text-white">&copy; by <a target="_blank" href="https://instagram.com/mikmself"><strong class="text-white">Muhamad Irga Kh. M</strong></a> & <a target="_blank" href="https://instagram.com/hai.opit"><strong class="text-white">Taufik Hidyatullah</strong></a></div>

        </footer>
</body>
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>

</html>
