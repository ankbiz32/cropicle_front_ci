
    var vno=0;
    $('form.regForm').validate();
    // Form Submit
    $('form.regForm').on('submit', function (e) {
        e.preventDefault();
        if($('form.regForm').valid()){
            var url = $('form.regForm').attr('action');
            var data= $('form.regForm').serialize();
            $.ajax({
                type: 'post',
                url: url,
                data: $('form.regForm').serialize(),
                beforeSend: function(data){
                    $('#regSubmit').text('Loading...')
                },
                success: function(data)
                {
                    if(data){
                        vno=data;
                        console.log(vno);
                        $('#pwd').after(
                            `<div class="form_block mt-4 otpblock">
                                <p class="mb-1 text-left pl-4">An OTP has been sent to your no. <br> Please verify your mobile no.</p>
                                <input type="text" class="form_field requried digits" name="otp" id="otp" placeholder="Enter OTP here" requried>
                            </div>`
                        );
                        $('.otpblock').hide();
                        $('.otpblock').fadeIn();
                        $('#otp').focus();
                        $('#regSubmit').text('Signup').attr('disabled','true').hide();
                        checkOTP();
                    }
                    else{
                        $('#regSubmit').text('Next');
						Alert.fire({icon:'error',title: 'Number already registered !'});
                        // alert('Data error');
                    }
                },
                error: function(){
                    Alert.fire({icon:'error',title: 'Server error !'});
                }
            });
        }
    });

    function checkOTP(){
        $('#otp').keyup(function(){
            if($.trim(this.value).length == 4){
                if ($('#otp').val()==vno){
                    $('#otp').attr('disabled','true').after(
                            `<div class="form_block mt-1">
                                <p class="mb-2 text-success text-left"><i class="fa fa-check"></i> Correct OTP. Number verified.</p>
                            </div>
                            <a href="finish" class="clv_btn finBtn">Finish</a>`
                        );
                    $('.finBtn').focus();
                    // $('#regSubmit').text('Finish').removeAttr('disabled').fadeIn();
                }
                else{
                    $('#otp').after(
                            `<div class="form_block mt-1 otpMsg">
                                <p class="mb-2 text-danger text-left"><i class="fa fa-times"></i> wrong OTP</p>
                            </div>`
                        );
                }
            }
            else{
                $('.otpMsg').fadeOut();
            }
        });
    };

    $('#loc-search').on('click', function (e) {
        var area= $('#loc-select').val();
        if (area){
            var url= loc+'location/'+area;
            window.location.replace(url);
        }
        else{
            $('#loc-select').select2('open');
            // $('#loc-select').focus();
        }
    });

    
    $('#user_profile').change(function() {
        var file_data = $('#user_profile').prop('files')[0];   
        var form_data = new FormData();                
        form_data.append('file', file_data);             
        $.ajax({
            url: 'Edit/img_upload',
             
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(data){
                // console.log(data);
                window.location.reload();
            }
        });
    });


    $('.demandDetails').click(function(){
        var id=$(this).data('id');
        $.ajax({
            url: 'Home/demandDetails',
            type:'post',
            data: {id: id},
            beforeSend : function(){
                $('#demandModal .modal-body').html('Loading...');
                $('#demandModal').modal('show');
            },
            success: function(response){
                $('#demandModal .modal-body').html(response);
            },
            error: function(response){
                $('#demandModal .modal-body').html('Error !');
            }
        });
    });