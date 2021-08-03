<div class="row">
    <div class="col-12">
        Test içerik
        
        @include("modal-button", [
            "text" => "Kullanıcı Ekle",
            "class" => "btn-primary",
            "target_id" => "addUserModal"
        ])

        @component("modal-component", [
            "id" => "addUserModal",
            "title" => "Kullanıcı Ekleme Penceresi",
            "footer" => [
                "class" => "btn-danger",
                "onclick" => "addUserEvent()",
                "text" => "Ekle"
            ]
        ])
            <input class="form-control mb-4" type="text" placeholder="Kullanıcı Adı" name="username" id="username">
            <input class="form-control mb-4" type="password" placeholder="Şifre" name="password" id="password">
        @endcomponent

        <div id="usersTable">

        </div>
    </div>
</div>
@include("user.scripts")