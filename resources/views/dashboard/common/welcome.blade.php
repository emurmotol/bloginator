@section('welcome')
    <div class="modal fade" tabindex="-1" id="message" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Welcome to <strong class="logo-font"><i class="fa fa-rss"
                                                                aria-hidden="true"></i>{{ trans('app.title') }}</strong>
                    </h4>
                </div>
                <div class="modal-body">
                    <p>Comming soon&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#message').modal('show');
        });
    </script>
@endsection