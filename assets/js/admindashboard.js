 
                    $(function () {

                        $('.grade').prop("readonly", true);
                        $('#Date').datepicker({
                            changeMonth: true,
                            changeYear: true,
                            yearRange: "-25:+5",
                            dateFormat: 'yy-mm-dd'
                         });
                    });
 