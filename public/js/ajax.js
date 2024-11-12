$(function(){
    $('.addMenu').on('click', function(){
        $('.Title-label').html('Tambah data Menu');
        $('.button-groupl[type=submit]').html('Tambah data');
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

    $('.addUser').on('click', function(){
        $('.Title-label').html('Tambah data User');
        $('.button-groupl[type=submit]').html('Tambah data');
    });

    $('.editUser-icon').on('click', function(){
        $('.Title-label').html('Ubah data Menu');
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
                console.log(data);
            }      
        });
    });

});