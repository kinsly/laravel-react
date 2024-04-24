
<div style="position: relative">
    <img src="{{$image}}" class="img-thumbnail" id="image{{$id}}" alt="...">

    <span id="imgTrash" class="tf-icons bx bx-trash" 
        style="position: absolute; top: 5%; right: 5%; font-size: 37px; color: white; background-color: #fb0660; @if(empty($image)) visibility:hidden; @endif"
        onclick="showImageDelete()">
    </span>
    <span id="shouldDelete" style="position: absolute;top: 30%;left: 25%;background-color: white; padding: 18px; visibility:hidden;">
        <button type="button" class="btn rounded-pill btn-outline-danger" onclick="deleteImage()">Delete</button>
        <button type="button" class="btn rounded-pill btn-outline-dark" onclick="shouldDeleteCanceled()">Cancel</button>
    </span>
</div>


<input type="file" class="form-control" name="image"  id="{{$id}}">
<input type="hidden" id="imageName{{$id}}" value="@php echo basename($image) @endphp"/>
<input type="hidden" id="imagePath{{$id}}" value="{{$image}}" name="imagePath"/>

@push('js')
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#{{$id}}').on('change', function() {
        var file = this.files[0];
        var formData = new FormData();
        formData.append('image', file); // Append the image file to FormData
        $.ajax({
            url: "/image-upload",
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) { 
                var parts = response.split("/");
                var imageName = parts[parts.length - 1];
                $("#imageName{{$id}}").val(imageName);
                $("#image{{$id}}").attr('src',response);
                $("#imagePath{{$id}}").val(response);
                
                $("#imgTrash").css({'visibility':'visible'});
            },
            error: function(error) {
                // Handle errors
                console.log(error)
            }
        });
    });
});

function showImageDelete()
{
    $("#imgTrash").css({'visibility':'hidden'});
    $("#shouldDelete").css({'visibility':'visible'});

}

function shouldDeleteCanceled(){
    $("#shouldDelete").css({'visibility':'hidden'});
    $("#imgTrash").css({'visibility':'visible'});
    
}

function deleteImage(){
    var imageName = $("#imageName{{$id}}").val();
    $.ajax({
        url: "/image-delete/"+imageName,
        type: 'Delete',
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            $("#imgTrash").css({'visibility':'hidden'});
            $("#shouldDelete").css({'visibility':'hidden'});
            $("#image{{$id}}").attr('src','');
            $("#imagePath{{$id}}").val(null);
        },
        error: function(error) {
            // Handle errors
            console.log(error)
        }
    });
}
</script>
@endpush