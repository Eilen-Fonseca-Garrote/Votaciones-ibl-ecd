  {{-- <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Launch demo modal
  </button> --}}

  <!-- Modal -->
  <div class="modal fade" id="pictureModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{$member->name}} {{$member->last_name}}</h4>
        </div>
        <div class="modal-body">
            @if ($member->photo_min)
            <img src="{{asset('img/thumbnail/')}}/{{$member->photo_min}}" alt="{{$member->name}}" width="100%"/>
            @else
            <h3>No hay imagen del miembro</h3>
            @endif

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
