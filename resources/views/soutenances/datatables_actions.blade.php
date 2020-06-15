<div data-entity-id="{{ $id }}">
    <a
        href="{{ route('soutenances.show', $id) }}"
        class="data-tooltip" data-tooltip="Détails">         
        <i class="fa fa-eye"></i>     
    </a>
    <span style="margin-left:10px"></span>
    <a
        href="{{ route('soutenances.destroy', $id) }}"
        class="data-tooltip delete-btn" data-tooltip="Supprimer">         
        <i class="fa fa-remove"></i>     
    </a>
    <span style="margin-left:10px"></span>
    @if($rapport)
        <a
            href="{{ url($rapport) }}"
            target="_blank"
            class="data-tooltip" data-tooltip="Télécharger le rapport">         
            <i class="fa fa-book"></i>     
        </a>
    @endif
</div>
