
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
                        alert('success error');
                    }
                },
                error: function(){
                    alert('error');
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
        var url= 'location/'+area;
        window.location.replace(url)
    });