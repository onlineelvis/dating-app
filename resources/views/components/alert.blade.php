<div>
    @if($errors->has('picture'))
        <div class="text-center alert alert-danger">
            {{$errors->first('picture')}}
        </div>

        @elseif($errors->has('gallery'))
            <div class="text-center alert alert-danger">
                {{$errors->first('gallery')}}
            </div>

    @elseif(session('status'))
        <div class="text-center alert alert-danger" >
            {{session('status')}}
        </div>

    @elseif(session('pictureStatus'))
        <div class="text-center alert alert-success" >
            {{session('pictureStatus')}}
        </div>

        @endif
</div>
