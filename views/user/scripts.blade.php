<script>
    function user(){
        //Swal.fire("User sekmesi açıldı.")
        getUsers(); //tab yüklendğinde get çalışıp oraya veriyi yüklemesini istiyorum
    }
    function addUserEvent() {
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        data.append("username", $("#addUserModal").find("#username").val());
        data.append("password", $("#addUserModal").find("#password").val());
        request("{{API('add_user')}}", data, function(response){
            response = JSON.parse(response);
            Swal.close();
            Swal.fire(response.message);

            $('#addUserModal').modal('hide');
        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });

    }

    function getUsers() {
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        request("{{API('get_users')}}", data, function(response){
            $("#usersTable").html(response);
            console.log(response);
            Swal.close();

        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });
    }
    //function deleteUser(node){
    //    showSwal("{{__('Yükleniyor...')}}", 'info');
    //    let data = new FormData();
    //    console.log($(node).find("#user").html());
    //    data.append =("username", $(node.find("#user").html());        
    //    request("{{API('delete_user')}}", data, function(response){
    //        
    //          Swal.close();
    //          response = JSON.parse(response);
    //          console.log(response.message)
    //          showSwal(response.message, "success", 2500);
    //    }, function(response){
    //        response = JSON.parse(response);
    //        showSwal(response.message, 'error');
    //    });
    //}
</script>