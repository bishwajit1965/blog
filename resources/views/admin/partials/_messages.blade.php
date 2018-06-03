@if (Session::has('Success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>Success</strong> {{ Session::get('Success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (count($errors)>0)
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>Errors are !!!</strong>
        <ol>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li> 
            @endforeach   
        </ol>
    </div>
@endif

@if (Session::has('Updated'))
    <div class="alert alert-info alert-dismissible" role="alert">
        <strong>Success</strong> {{ Session::get('Updated') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (Session::has('Deleted'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        <strong>Success</strong> {{ Session::get('Deleted') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif