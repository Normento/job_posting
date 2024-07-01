<form action="{{ route('confirme.update',$confirme->num)}}" method="post" class="form-check">
   @csrf
   @method('PUT')
    <div class="modal fade" id="ModalDelete{{$confirme->num}}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ _('Décision')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" arial-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">voulez-vous accepter ou refuser la demande de ̌̌̌{{$confirme->name}} ?<br>
                <input type="hidden" name="id" value="{{$confirme->id}}">
                <input type="hidden" name="emploie_id" value="{{$confirme->emploie_id}}">
                <input type="hidden" name="email" value="{{$confirme->email}}">
                <input type="hidden" name="name" value="{{$confirme->name}}">
                <input type="hidden" name="title" value="{{$title}}">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="Refuser">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Refuser
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="Accepter">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Accepter
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{ _('Annuler')}}</button>
                    <button type="submit" class="btn btn-outline-danger">{{ _('Confirmer')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
