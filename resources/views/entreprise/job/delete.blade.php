<form action="{{route('job.destroy',$job->id)}}" method="post" enctype="multipart/form-data">
    {{method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{$job->id}}" tabindex="1" role="dialog" aria-hidden="true">
         <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h4 class="modal-title">{{ _('Supprimer')}}</h4>
                         <button type="button" class="close" data-dismiss="modal" arial-label="close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">voulez-vous supprimer cet annonce?</div>
                    <div class="modal-footer">
                         <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{ _('Annuler')}}</button>
                         <button type="submit" class="btn btn-outline-danger">{{ _('Confirmer')}}</button>
                    </div>
               </div>
         </div>
    </div>
</form>
