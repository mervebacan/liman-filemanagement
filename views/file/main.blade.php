<div class="row">
    <div class="col-12">
        Test içerik
        
        @include("modal-button", [
            "text" => "Dosya Oluştur",
            "class" => "btn-primary",
            "target_id" => "addFileModal"
        ])
        

        @component("modal-component", [
            "id" => "addFileModal",
            "title" => "Dosya Oluşturma Penceresi",
            "footer" => [
                "class" => "btn-danger",
                "onclick" => "addFileEvent()",
                "text" => "Oluştur"
            ]
        ])
            <input class="form-control mb-4" type="text" placeholder="İSİM" name="filename" id="filename">
            
        @endcomponent

        <div id="filesTable">

        </div>
    </div>
</div>
@include("file.scripts")