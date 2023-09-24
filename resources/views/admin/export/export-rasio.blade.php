<table>
    <thead>
        <tr>
                <th color="yellow"> No </th>
                <th color="yellow"> Nama Rasio </th>
                <th color="yellow"> Sumber </th>
                <th color="yellow"> Nama Sumber </th>
                {{-- <th color="yellow"> Formula </th> --}}
                <th color="yellow"> Pembilang </th>
                <th color="yellow"> Penyebut </th>
                <th color="yellow"> Rasio </th>
                <th color="yellow"> Cut Of data </th>
                <th color="yellow">Created at</th>
                {{-- <th color="yellow">Updated at</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($rasio as $r)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $r->nama_rasio }}</td>
                <td>{{ $r->sumber()->sumber}}</td>
                <td>{{ $r->sumber}}</td>
                {{-- <td>{{ $r->id_formula }}</td> --}}
                <td>
                    {{-- {{ $r->exportUpper() }} --}}
                    @foreach ($r->upperName() as $upperValue)
                        @if (is_array($upperValue))
                            @foreach ( $upperValue as $uk => $uv)
                                {{ $uk." : ".$uv }}
                            @endforeach
                        @else
                            <br>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach ($r->lowerName() as $lowerValue)
                        @if (is_array($lowerValue))
                            @foreach ( $lowerValue as $lk => $lv)
                                {{ $lk." : ".$lv }}
                            @endforeach
                        @else
                            <br>
                        @endif
                    @endforeach
                </td>

                <td>{{ $r->rasio }}</td>
                <td>{{ $r->cut_off_data }}</td>
                <td>{{ $r->created_at }}</td>
                {{-- <td>{{ $r->updated_at }}</td> --}}
            </tr>
        @endforeach
    </tbody>
</table>
