<div data-entity-id="{{ $id }}">
     <a
        href="{{ route('depots.view_suggesions', $id) }}"
        class="data-tooltip" data-tooltip="Corrections de votre professeur">         
        <i class="fa fa-files-o"></i>     
    </a>
    <span style="margin-left:10px"></span>
    @if($phase >= \App\Util\StateUtil::$FINAL_EDITION_PART)
    <a
        href="{{ route('rapports.create') }}"
        class="data-tooltip" data-tooltip="Déposer le rapport final">         
        <i class="fa fa-book"></i>     
    </a>
    @else
    <a
        href="{{ route('depots.create', $id) }}"
        class="data-tooltip depot-btn" data-tooltip="Déposer un document">         
        <i class="fa fa-upload"></i>     
    </a>
    @endif
</div>
