

{{-- 
    data-bs-toggle="modal"  data-bs-target="#{{$id}}"
    --}}
<div class="modal fade" id={{$id}} tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">{{$title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
            <div class="modal-footer">
                <form action={{$formAction}} method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-outline-secondary"
                    data-bs-dismiss="modal">
                    Close
                    </button>
                    <button type="submit" class="btn btn-danger">Delete Now</button>
                </form>
                
            </div>
        </div>
    </div>
</div>