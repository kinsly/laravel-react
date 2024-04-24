<div>
    <label for="sitelogo" class="col-sm-2 col-form-label">{{$title}}</label>
    <div id="{{$id}}">
      
      @if(isset($text))
        {!! $text !!}
      @else
        <p>Hello World!</p>
        <p>Some initial <strong>bold</strong> text</p>
        <p><br></p>
      @endif
  
    </div>
    <input type="hidden" value="@if(isset($text)) {{$text}} @endif" name="{{$inputName}}" id="quill{{$id}}"/> 
  </div>
    <!-- Initialize Quill editor -->
  
  @push('js')
  {{-- Quill Text Editor scripts --}}
    <script>
    var quill{{$id}} = new Quill('#{{$id}}', {
        modules: {
          imageResize: {
            displaySize: true
          },
          toolbar: [
            [{ header: [1, 2,3,false] }],
            ['bold', 'italic', 'underline', 'strike'],
            ['image','link'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }],
            ['clean'] 
          ]
        },
        theme: 'snow'  // or 'bubble'
      });
  
      quill{{$id}}.on('text-change', function() {
        var content = quill{{$id}}.root.innerHTML; // Get HTML content
        $('#quill{{$id}}').val(content);  // Assign to input field
      });
      </script>
  @endpush