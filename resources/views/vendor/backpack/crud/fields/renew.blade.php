<!-- CKeditor -->
@if($crud->entry)
    <div @include('crud::inc.field_wrapper_attributes') >
        <span class="expiry-status">
            @if($crud->entry->expires_in())
                This entry will expire in {{ $crud->entry->expires_in() }} days.
            @else
                This entry has expired.
            @endif
        </span>
        &nbsp;
        @include('backpack::crud.buttons.renew')
    </div>
@endif
