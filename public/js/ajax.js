$(function(){
    console.log("ok");
    $('#addMenu').on('click', function(){
        $('.Title-label').html('Tambah data Menu');
        $('.button-groupl[type=submit]').html('Tambah data');
        
        const id = $(this).data('id');
        console.log(id);
        let newId;

        if (id) {
            const prefix = id.substring(0, 3);
            const number = parseInt(id.substring(3)); 
            const nextNumber = number + 1;
            newId = prefix + nextNumber.toString().padStart(2, '0');
        } else {
            newId = 'MKN01';
        }

        $("#id_menu").val(newId);
        console.log(newId);
    });

    $('.editMenu-icon').on('click', function(){
        $('.Title-label').html('Ubah data Menu');
        $('#submitMenu').html('Ubah data');
        $('.modal-panel form').attr('action', 'http://localhost/admin-adek/public/menu/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/admin-adek/public/menu/edit',
            data: {id, id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $("#id_menu").val(data.id_menu);
                $("#nama_menu").val(data.nama_menu);
                $("#kategori_menu").val(data.kategori_menu);
                $("#protein").val(data.protein);
                $("#karbohidrat").val(data.karbohidrat);
                $("#lemak").val(data.lemak);
                $("#kalori").val(data.kalori);
                $("#resep").val(data.resep);
                $("#fileName").html(data.gambar);
                $("#satuan").val(data.satuan);
                console.log(data);
            }      
        });
    });

    $('#addUser').on('click', function(){
        $('.Title-label').html('Tambah data User');
        $('.button-groupl[type=submit]').html('Tambah data Pengguna');

        const id = $(this).data('id');
        console.log(id);
        let newId;

        if (id) {
            const prefix = id.substring(0, 3);
            const number = parseInt(id.substring(3)); 
            const nextNumber = number + 1;
            newId = prefix + nextNumber.toString().padStart(2, '0');
        } else {
            newId = 'USR01';
        }

        $("#id_user").val(newId);
        console.log(newId);
    });

    $('.editUser-icon').on('click', function(){
        $('.Title-label').html('Ubah data Pengguna');
        $('#submitMenu').html('Ubah data');
        $('.modal-panel form').attr('action', 'http://localhost/admin-adek/public/user/ubah');

        const id = $(this).data('id');
        console.log(id);

        $.ajax({
            url: 'http://localhost/admin-adek/public/user/edit',
            data: {id, id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $("#id_user").val(data.id_user);
                $("#nama_user").val(data.nama_lengkap);
                $("#email").val(data.email);
                $("#password").val(data.password);
                $("#no_hp").val(data.no_hp);
                $("#berat_badan").val(data.berat_badan);
                $("#tinggi_badan").val(data.tinggi_badan);
                $("#umur").val(data.umur);
                $("#tipe_diet").val(data.tipe_diet);
                $("#gender").val(data.gender);
                $("#fileName").html(data.gambar);
                console.log(data);
            }      
        });
    });

    $('#addBuku').on('click', function(){
        $('.Title-label').html('Tambah data Buku');
        $('.button-groupl[type=submit]').html('Tambah data');

        const id = $(this).data('id');
        console.log(id);
        let newId;

        if (id) {
            const prefix = id.substring(0, 3);
            const number = parseInt(id.substring(3)); 
            const nextNumber = number + 1;
            newId = prefix + nextNumber.toString().padStart(2, '0');
        } else {
            newId = 'BK001';
        }

        $("#id_buku").val(newId);
        console.log(newId);
    });

    $('.editBuku-icon').on('click', function(){
        $('.Title-label').html('Ubah data buku');
        $('#submitMenu').html('Ubah data');
        $('.modal-panel form').attr('action', 'http://localhost/admin-adek/public/buku/ubah');

        const id = $(this).data('id');
        console.log(id);

        $.ajax({
            url: 'http://localhost/admin-adek/public/buku/edit',
            data: {id, id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $("#id_buku").val(data.id_buku);
                $("#judul").val(data.judul);
                $("#kategori").val(data.kategori);
                $("#isi_buku").val(data.isi_buku);
                $("#fileName").html(data.gambar);
                $("#username").val(data.username);
                console.log(data);
            }      
        });
    });

    $('#addKonsultan').on('click', function(){
        $('.Title-label').html('Tambah data Konsultan');
        $('.button-groupl[type=submit]').html('Tambah data');

        const id = $(this).data('id');
        console.log(id);
        let newId;

        if (id) {
            const prefix = id.substring(0, 3);
            const number = parseInt(id.substring(3)); 
            const nextNumber = number + 1;
            newId = prefix + nextNumber.toString().padStart(2, '0');
        } else {
            newId = 'DR001';
        }

        $("#id_konsultan").val(newId);
        console.log(newId);

    });

    $('.editKonsultan-icon').on('click', function(){
        $('.Title-label').html('Ubah data Konsultan');
        $('#submitMenu').html('Ubah data');
        $('.modal-panel form').attr('action', 'http://localhost/admin-adek/public/konsultan/ubah');

        const id = $(this).data('id');
        console.log(id);

        $.ajax({
            url: 'http://localhost/admin-adek/public/konsultan/edit',
            data: {id, id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $("#id_konsultan").val(data.id_konsultan);
                $("#nama_lengkap").val(data.nama_lengkap);
                $("#no_hp").val(data.no_hp);
                $("#fileName").html(data.gambar);
                console.log(data);
            }      
        });
    });

    $('#addOlahraga').on('click', function(){
        $('.Title-label').html('Tambah data Olahraga');
        $('.button-groupl[type=submit]').html('Tambah data');

        const id = $(this).data('id');
        console.log(id);
        let newId;

        if (id) {
            const prefix = id.substring(0, 3);
            const number = parseInt(id.substring(3)); 
            const nextNumber = number + 1;
            newId = prefix + nextNumber.toString().padStart(2, '0');
        } else {
            newId = 'OLH01';
        }

        $("#id_olahraga").val(newId);
        console.log(newId);

    });

    $('.editOlahraga-icon').on('click', function(){
        $('.Title-label').html('Ubah data Olahraga');
        $('#submitMenu').html('Ubah data');
        $('.modal-panel form').attr('action', 'http://localhost/admin-adek/public/olahraga/ubah');

        const id = $(this).data('id');
        console.log(id);

        $.ajax({
            url: 'http://localhost/admin-adek/public/olahraga/edit',
            data: {id, id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $("#id_olahraga").val(data.id_olahraga);
                $("#nama_olahraga").val(data.nama_olahraga);
                $("#deskripsi").val(data.deskripsi);
                $("#username").val(data.username);
                $("#fileName").html(data.gambar);
                console.log(data);
            }      
        });
    });

    $.ajax({
        url: 'http://localhost/admin-adek/public/Landingpage/getHeroData', // Endpoint backend
        method: 'get',
        dataType: 'json',
        success: function(data){
            console.log(data);
            $('#hero_tittle').val(data[0].hero_tittle);
            $('#hero_cta').val(data[0].hero_cta);
            $("#fileName").html(data[0].hero_image);
            $('#about_title').val(data[0].about_title);
            $("#fileAbout").html(data[0].about_image);
            $('#about_description').val(data[0].about_description);
            $('#android_download').val(data[0].android_download);
            $('#ios_download').val(data[0].ios_download);
        }
    });

    $.ajax({
        url: 'http://localhost/admin-adek/public/Landingpage/getFitur', // Endpoint backend
        method: 'get',
        dataType: 'json',
        success: function(data){
            console.log(data);
            $('#fitur_title').val(data[0].hero_tittle);
            $('#fitur_cta').val(data[0].hero_cta);
            $('#fileHeroimg').html(data[0].hero_image);
            $('#filesubhero1_img').html(data[0].subhero1_img);
            $('#filesubhero2_img').html(data[0].subhero2_img);
            $('#filesubhero3_img').html(data[0].subhero3_img);
            $('#filesubhero4_img').html(data[0].subhero4_img);
            $('#desc_subhero1').val(data[0].desc_subhero1);
            $('#desc_subhero2').val(data[0].desc_subhero2);
            $('#desc_subhero3').val(data[0].desc_subhero3);
            $('#desc_subhero4').val(data[0].desc_subhero4);
        }
    });
});