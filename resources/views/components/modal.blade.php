<!-- Modal -->
@props(['id'])
<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Eventos</h5>
            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> --}}
        </div>
        <div class="modal-body">
            {{$slot}}
        </div>

        <div class="modal-footer">
            {{$buttons}}
        </div>
    </div>
</div>
</div>