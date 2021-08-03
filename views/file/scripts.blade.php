<script>
    function file(){
        //Swal.fire("User sekmesi açıldı.")
        getFiles(); //tab yüklendğinde get çalışıp oraya veriyi yüklemesini istiyorum
    }
    function addFileEvent() {
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        data.append("filename", $("#addFileModal").find("#filename").val());
        
   
        request("{{API('add_files')}}", data, function(response){
            response = JSON.parse(response);
            Swal.close();
            Swal.fire(response.message);

            $('#addFileModal').modal('hide');
        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });

    }

    function getFiles() {
        showSwal("{{__('Yükleniyor...')}}", 'info');
        let data = new FormData();
        request("{{API('get_files')}}", data, function(response){
            $("#filesTable").html(response);
            console.log(response);
            Swal.close();

        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });
    }
</script>