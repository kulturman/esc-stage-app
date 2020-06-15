<div data-entity-id="{{ $id }}">
    <a
        href="{{ url('etudiants/create'). "?preinscription=" .$id }}"
        class="data-tooltip" data-tooltip="Inscrire">         
        <i class="fa fa-user"></i>     
    </a>
    <span style="margin-left:10px"></span>
    <a
        href="{{ route('preinscriptions.edit', $id) }}"
        class="data-tooltip" data-tooltip="Modifier">         
        <i class="fa fa-edit"></i>     
    </a>
    <span style="margin-left:10px"></span>
    <a
        href="{{ route('preinscriptions.destroy', $id) }}"
        class="data-tooltip delete-btn" data-tooltip="Supprimer">         
        <i class="fa fa-remove"></i>     
    </a>
    <span style="margin-left:10px"></span>
    <a
        href="{{ route('preinscriptions.notify', $id) }}"
        class="data-tooltip notify" data-tooltip="Relancer">         
        <i class="fa fa-envelope"></i>     
    </a>
</div>
