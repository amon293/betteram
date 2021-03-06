@if($errors->any())

    <div class="ui error message">
        <i class="close icon"></i>
        <div class="header">
            oops..
        </div>
        <ul class="list">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

@if(session()->has('success'))

    <div class="ui success message">
        <i class="close icon"></i>
        <div class="header">
            {{ session()->get('success') }}
        </div>
    </div>

@endif
