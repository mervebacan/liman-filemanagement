<script>
    function file(){
        //Swal.fire("Dosya sekmesi açıldı.")
        getFiles(); //tab yüklendğinde get çalışıp oraya veriyi yüklemesini istiyorum
    }
    function createFileEvent() {
        showSwal("{{('Yükleniyor...')}}", 'info');
        let data = new FormData(); 
        data.append("filename", $("#createFileModal").find("#filename").val());


        request("{{API('create_files')}}", data, function(response){
            response = JSON.parse(response);
            getFiles();
            Swal.close();
            Swal.fire(response.message);

            $('#createFileModal').modal('hide'); //modalı kapa
        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
        });

    }


    function getFiles() {
        showSwal("{{('Yükleniyor...')}}", 'info');
        let data = new FormData();
        request("{{API('get_files')}}", data, function(response){

            //$("#filesTable").html(response).find("list");//dataTable(dataTablePresets("normal"));
            $("#filesTable").html(response);
            console.log(response);
            Swal.close();

        }, function(response){
            response = JSON.parse(response);
            showSwal(response.message, 'error');
            
        });
        
    }
</script> 