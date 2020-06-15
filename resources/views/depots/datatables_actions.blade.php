<div data-entity-id="{{ $id }}">
    <a
        target="_blank"
        href="{{ url($path) }}"
        class="data-tooltip" data-tooltip="Télécharger">         
        <i class="fa fa-download"></i>     
    </a>
    <span style="margin-left:10px"></span>
    <a
        href="{{ route('depots.amend', [$id]) }}"
        class="data-tooltip" data-tooltip="Amender le document">         
        <i class="fa fa-edit"></i>     
    </a>
    <span style="margin-left:10px"></span>
    <a
        href="{{ route('depots.validate', [$id]) }}"
        class="data-tooltip validate-btn" data-tooltip="Valider">         
        <i class="fa fa-check"></i>     
    </a>
</div>
