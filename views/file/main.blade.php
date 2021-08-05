<div class="row">
    <div class="col-12">
        
    @include("modal-button", [
        "text" => "Dosya Oluştur",
        "class" => "btn-primary",
        "target_id" => "createFileModal"
    ])
    

    @component("modal-component", [
        "id" => "createFileModal",
        "title" => "Dosya Oluşturma Penceresi",
        "footer" => [
            "class" => "btn-danger",
            "onclick" => "createFileEvent()",
            "text" => "Oluştur"
        ]
    ])  
        <input class="form-control" type="filename" placeholder="Dosya Adı Giriniz" name="filename" id="filename">
        
        
    @endcomponent


    <div id="filesTable"> 
        
    </div> 

</div>

</div>
@include("file.scripts")