<p>Numéro de dossier: <strong>{{ $demande->id }}</strong></p>
<table class="table table-condensed table-bordered">
    <thead>
    </thead>
    <tbody>
        <tr>
            <th>Id</th>
            <th>Type de document</th>
            <th>Actions</th>
        </tr>
        @foreach($demande->documents as $document)
        <tr>
            <td>{!! $document->id !!}</td>
            <td>
                @if(!empty($document->libelle))
                    {!! $document->libelle !!}
                @else
                    {!! $document->typeDocument->libelle !!}
                @endif()
            </td>
            <td>
                <a class = "btn btn-info btn-sm"
                   target="blank"
                   href="{!! url($document->url) !!}">
                    Visulaliser le document
                </a>
            </td>
        </tr>
        @endforeach()
    </tbody>
</table>