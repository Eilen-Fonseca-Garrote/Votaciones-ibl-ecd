<div class="table-responsive">
    @php
    $middle = ((int)$viewData['member_c']*50)/(100);
    @endphp
    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Cantidad de votos</th>
                <th>% / Total({{$middle}} de {{$viewData['member_c']}})</th>
                <th>
            </th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $list  as $vote)
                @php
                    $valor_poc = ((int)$vote->count*100)/((int)$viewData['member_c']);
                @endphp
                <tr>
                    <td>{{$vote->name}}</td>
                    <td>{{$vote->last_name}}</td>
                    <td>{{$vote->count}}</td>
                    <td> {!!$valor_poc>=($middle+1)?"<span class='badge bg-success'>".$valor_poc."</span>":"<span class='badge bg-danger'>".$valor_poc."</span>"!!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
