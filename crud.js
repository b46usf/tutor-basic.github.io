$('.btn-save').click(function(event){
    event.preventDefault();
    if ($(this).text()=='Edit') {
        $("form").find("input, select, textarea").prop("disabled", false);
        $(this).text('Save');
    } else {
        var form = $('form');
        if (form[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();
            save(form.attr('id'));
        }
        form.addClass('was-validated');
    }
});

$('.btn-update').click(function(event){
    event.preventDefault();
    var dataParam   =   $(this).data('id');
    var pageAction  =   $(this).data('action');
    if (pageAction=='editCustomer') {
        var pageView    =   'formInputCustomer.php?action='+pageAction+'&id='+dataParam;
    }
    location.href   =   pageView;
});

function save(idform) {
    var dataParam   =   $("#"+idform).serializeArray();
    var action      =   $("#"+idform).attr('action');
    $.ajax({
        url         : action,
        data        : dataParam,
        method      : 'post',
        dataType    : 'json',
        success     : function(response){
            location.href=response.location;
        },error: function(xhr, status, error){
            console.log(error);console.log(status);console.log(xhr);
        }
    });    
}

function load_edit(idPage,pageAction) {
    var url         =   'editData.php?action=';
    var action      =   url+pageAction;
    $.ajax({
        url         : action,
        data        : {'dataID':idPage},
        method      : 'post',
        dataType    : 'json',
        success     : function(response){
            var obj = response.data[0];
            if (pageAction=='editCustomer') {
                $('#inputIDCustomer').val(obj.id_customers);
                $('#inputEmail').val(obj.email_customer);
                $('#inputName').val(obj.nama_customer);
                $('#inputAddress').val(obj.alamat);
                $('#inputPhone').val(obj.phone_customer);
                $('#inputBOD').val(obj.bod_customer);
                $('#inputRekening').val(obj.nomor_rekening);
                $('#inputBank').val(obj.bank_rekening);
            }
            $('form input').prop("disabled", true);
            $('.btn-save').addClass('btn-edit'); 
            $('.btn-save').text('Edit');
        },error: function(xhr, status, error){
            console.log(error);console.log(status);console.log(xhr);
        }
    });
    
}

$('.btn-delete').click(function(event){
    event.preventDefault();
    var dataParam   =   $(this).data('id');
    var pageAction  =   $(this).data('action');
    var url         =   'deleteData.php?action=';
    var action      =   url+pageAction;
    if (confirm("Data Akan Dihapus")) {
        $.ajax({
            url         : action,
            data        : {'dataID':dataParam},
            method      : 'post',
            dataType    : 'json',
            success     : function(response){
                location.href=response.location;
            },error: function(xhr, status, error){
                console.log(error);console.log(status);console.log(xhr);
            }
        });
    }
});

function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};

$( document ).ready(function() {
    var idPage      = getUrlParameter('id');
    var pageAction  = getUrlParameter('action');
    if (idPage===false || idPage=='false') { return false;} 
    else {
        load_edit(idPage,pageAction);
    }
});