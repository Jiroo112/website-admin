$(function(){
    $('.addMenu').on('click', function(){
        $('.Title-label').html('Tambah data Menu');
        $('.button-groupl[type=submit]').html('Tambah data');
    });

    $('.edit-icon').on('click', function(){
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


});