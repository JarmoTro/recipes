$(function () {
   
    $(".login-form").on("submit", function (e) {
        
        let loginForm = $(this);

        let formData = new FormData();
        formData.append("login_username", $("#login_username").val());
        formData.append("login_password", $("#login_password").val());

        e.preventDefault();

        $(".login-error").remove();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/login',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            statusCode: {
                200: function () {
                    window.location = "/"
                },
                400: function (response) {
                    JSON.parse(response.responseText).errors.forEach(error => {  
                        $(`<p class="login-error text-danger">${error.message}</p>`).insertBefore(".btn-login");
                    });
                },
                401: function (response) {
                    $(`<p class="login-error text-danger">${JSON.parse(response.responseText).error}</p>`).insertBefore(".btn-login");
                },
                500: function () {
                    $(`<p class="login-error text-danger">Looks like something went wrong :(</p>`).insertBefore(".btn-login");
                }
            }
        })

    });
    
});